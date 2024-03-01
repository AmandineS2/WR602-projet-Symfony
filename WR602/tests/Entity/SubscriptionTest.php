<?php
// tests/Entity/SubscriptionTest.php
namespace App\Tests\Entity;

use App\Entity\Subscription;
use PHPUnit\Framework\TestCase;

class SubscriptionTest extends TestCase
{
    public function testGetterAndSetter()
    {
        // Création d'une instance de l'entité Subscription
        $subscription = new Subscription();

        // Définition de données de test
        $price = '10';
        $description = 'Description de la souscription';
        $title = 'Titre de la souscription';
        $pdfLimit = '5';

        // Utilisation des setters
        $subscription->setPrice($price);
        $subscription->setDescription($description);
        $subscription->setTitle($title);
        $subscription->setPdfLimit($pdfLimit);

        // Vérification des getters
        $this->assertEquals($price, $subscription->getPrice());
        $this->assertEquals($description, $subscription->getDescription());
        $this->assertEquals($title, $subscription->getTitle());
        $this->assertEquals($pdfLimit, $subscription->getPdfLimit());
    }
}