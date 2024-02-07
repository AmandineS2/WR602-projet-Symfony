<?php
namespace App\Tests\Entity;

use App\Entity\User;
use App\Entity\Subscription;
use App\Entity\Pdf;
use PHPUnit\Framework\TestCase;

class UserEntityTest extends TestCase
{
    public function testSubscriptionRelationship()
    {
        // Création d'une instance de l'entité User
        $user = new User();

        // Création d'une instance de l'entité Subscription
        $subscription = new Subscription();

        // Création d'une instance de l'entité Pdf
        $pdf = new Pdf();

        // Liaison de la Subscription et du Pdf avec le User
        $user->addSubscriptionId($subscription); // Utilisez addUser() à la place de addSubscriptionId()
        $subscription->getUserId($user); // Utilisez addUser() à la place de addUserId()
        $pdf->addUserId($user);

        // Vérification de la relation
        $this->assertSame($subscription, $user->getSubscriptionId()->first());
        $this->assertSame($pdf, $user->getPdfId());
    }
}