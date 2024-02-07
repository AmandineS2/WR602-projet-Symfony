<?php

namespace App\Controller;

use App\Service\GotenbergApiService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GotenbergController extends AbstractController
{
    private $gotenbergApiService;

    public function __construct(GotenbergApiService $gotenbergApiService)
    {
        $this->gotenbergApiService = $gotenbergApiService;
    }

    #[Route('/myRoute', name: 'first_route')]
    public function generatePdfFromHtml()
    {
        // Exemple : Appel du service pour générer un PDF à partir d'un contenu HTML
        $htmlContent = '<p>Votre contenu HTML</p>';
        $pdf = $this->gotenbergApiService->callGotenbergApi($htmlContent);

        // Traitez la réponse selon vos besoins
        // ...

        return new Response('PDF généré avec succès !');
    }
}