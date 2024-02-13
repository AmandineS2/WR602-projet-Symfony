<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class SubscriptionController extends AbstractController
{
    public function subscription(): Response
    {
      //-- le fichier sera donc dans templates/home/index.html.twig
        return $this->render('Subscription/subscription.html.twig');
    }
}