<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Repository\SubscriptionRepository;
use phpDocumentor\Reflection\DocBlock\Tags\Var_;

class SubscriptionController extends AbstractController
{
    public function subscription(Request $request): Response
    {

      $abonnementSelect = $request->request->get('abonnement');

    $subscription = null;
    $user = $this->getUser();
    $currentSubscription = $abonnementSelect; // Utilisez le type d'abonnement sélectionné

    return $this->render('Subscription/subscription.html.twig', [
        'controller_name' => 'SubscriptionController',
        'subscription' => $subscription,
        'currentSubscription' => $currentSubscription

        ]);
    }

    
}