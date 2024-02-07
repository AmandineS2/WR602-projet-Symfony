<?php
// tests/Entity/UserTest.php
namespace App\Tests\Entity;

use App\Entity\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function testGetterAndSetter()
    {
        // Création d'une instance de l'entité User
        $user = new User();

        // Définition de données de test
        $email = 'test@test.com';
        $firstname = 'John';
        $lastname = 'Doe';
        $password = 'password123';

        // Utilisation des setters
        $user->setEmail($email);
        $user->setFirstname($firstname);
        $user->setLastname($lastname);
        $user->setPassword($password);

        // Vérification des getters
        $this->assertEquals($email, $user->getEmail());
        $this->assertEquals($firstname, $user->getFirstname());
        $this->assertEquals($lastname, $user->getLastname());
        $this->assertEquals($password, $user->getPassword());
    }
}