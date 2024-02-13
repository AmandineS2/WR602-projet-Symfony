<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class HistoryController extends AbstractController
{
    public function index(): Response
    {
      //-- le fichier sera donc dans templates/home/index.html.twig
        return $this->render('history/history.html.twig');
    }
}