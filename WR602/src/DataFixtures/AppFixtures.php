<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
//use App\Entity\User;
use App\Entity\Subscription;
//use App\Entity\Pdf;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        //Subscriptions
        //FREE
        $subscriptionFree = new Subscription();
        $subscriptionFree->setTitle('Free');
        $subscriptionFree->setDescription('Abonnement gratuit par défaut, 4 PDF/jour.');
        $subscriptionFree->setpdfLimit(4);
        $subscriptionFree->setPrice(0.00);
            $manager->persist($subscriptionFree);

        //PRO
        $subscriptionPRO = new Subscription();
        $subscriptionPRO->setTitle('Pro');
        $subscriptionPRO->setDescription('Abonnement pro, 8 PDF/jour.');
        $subscriptionPRO->setPdfLimit(8);
        $subscriptionPRO->setPrice(8.00);
            $manager->persist($subscriptionPRO);

        //BUSINESS
        $subscriptionBusiness = new Subscription();
        $subscriptionBusiness->setTitle('Business');
        $subscriptionBusiness->setDescription('Abonnement Businee, 100 PDF/jours.');
        $subscriptionBusiness->setPdfLimit(100);
        $subscriptionBusiness->setPrice(15.00);
            $manager->persist($subscriptionBusiness);


        $manager->flush();
    }
}
