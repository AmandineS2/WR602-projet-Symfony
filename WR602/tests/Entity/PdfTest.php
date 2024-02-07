<?php
// tests/Entity/PdfTest.php
namespace App\Tests\Entity;

use App\Entity\Pdf;
use PHPUnit\Framework\TestCase;

class PdfTest extends TestCase
{
    public function testGetterAndSetter()
    {
        // Création d'une instance de l'entité Pdf
        $pdf = new Pdf();

        // Définition de données de test
        $filename = 'example.pdf';

        // Utilisation des setters
        $pdf->setTitle($filename);

        // Vérification des getters
        $this->assertEquals($filename, $pdf->getTitle());
    }
}