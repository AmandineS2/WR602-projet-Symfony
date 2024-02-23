<?php

namespace App\Controller;

use App\Service\GotenbergApiService;
use App\Entity\Pdf;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\ORM\EntityManagerInterface; 

class GotenbergController extends AbstractController
{
    private $gotenbergApiService;
    private $entityManager; 

    public function __construct(GotenbergApiService $gotenbergApiService, EntityManagerInterface $entityManager)
    {
        $this->gotenbergApiService = $gotenbergApiService;
        $this->entityManager = $entityManager; 
    }
#[Route('/pdf', name: 'first_route')]
    public function generatePdfFromHtml(Request $request, UserInterface $user): Response
    {
        $form = $this->createFormBuilder()
            ->add('url', TextType::class)
            ->add('submit', SubmitType::class)
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $url = $form->get('url')->getData();
            $pdf = $this->gotenbergApiService->callGotenbergApi($url);
            $time = new \DateTimeImmutable; 

            // Créer une nouvelle instance de l'entité Pdf
            $newPdf = new Pdf();
            $newPdf->setTitle($url); // Utiliser l'URL comme nom de fichier
            $newPdf->setCreatedAt($time);
            $newPdf->setUser($user); // Définir l'utilisateur actuel

            // Persistez l'entité Pdf dans la base de données
            $this->entityManager->persist($newPdf);
            $this->entityManager->flush();

            return new Response($pdf, 200, ['content-type' => 'application/pdf']);
        }

        return $this->render('pdf/pdf.html.twig', ['form' => $form->createView()]);
    }
}