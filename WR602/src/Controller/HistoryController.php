<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Pdf;
use App\Entity\User;
use App\Repository\PdfRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\Service\GotenbergApiService; // Importez le service GotenbergApiService

class HistoryController extends AbstractController
{
    private $gotenbergApiService;

    public function __construct(GotenbergApiService $gotenbergApiService)
    {
        $this->gotenbergApiService = $gotenbergApiService;
    }

    #[Route('/history', name: 'app_history')]
    public function index(PdfRepository $pdfRepository, Security $security, EntityManagerInterface $entityManager, Request $request): Response
    {
        $user = $security->getUser();
        $userId = $user->getId();

        $pdfs = $entityManager->getRepository(Pdf::class)
            ->findBy(['user' => $userId]);

        // Traitement pour générer le PDF à partir du contenu HTML
        if ($request->query->has('pdf')) {
            $htmlContent = $request->query->get('pdf'); 
            $pdf = $this->gotenbergApiService->callGotenbergApi($htmlContent); 

            // Enregistrez le PDF généré dans la base de données s'il est nécessaire
            // ...

            // Retournez le PDF généré comme réponse
            return new Response($pdf, 200, ['content-type' => 'application/pdf']);
        }

        return $this->render('history/history.html.twig', [
            'controller_name' => 'HistoryController',
            'pdfs' => $pdfs,
        ]);
    }
}