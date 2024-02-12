<?php

namespace App\Controller;

use App\Service\GotenbergApiService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;

class GotenbergController extends AbstractController
{
    private $gotenbergApiService;

    public function __construct(GotenbergApiService $gotenbergApiService)
    {
        $this->gotenbergApiService = $gotenbergApiService;
    }

    #[Route('/myRoute', name: 'first_route')]
    public function generatePdfFromHtml(Request $request)
{
    $form = $this->createFormBuilder()
        ->add('htmlContent', TextType::class)
        ->add('submit', SubmitType::class)
        ->getForm();

    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        $htmlContent = $form->get('htmlContent')->getData();
        $pdf = $this->gotenbergApiService->callGotenbergApi($htmlContent);

        return new Response($pdf, 200, ['content-type' => 'application/pdf']);
    }

    return $this->render('pdf/pdf.html.twig', ['form' => $form->createView()]);
}
}