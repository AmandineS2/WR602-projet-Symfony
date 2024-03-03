Bienvenue sur mon projet Symfony générateur de PDF

## Prérequis

- PHP 7.4 ou supérieur
- Composer
- Docker

## Installation

### Symfony

Tout d'abord il faut installer Symfony via Composer, cependant il vous faudra installer composer si vous ne l'avait pas déjà. https://getcomposer.org/.

###installation de composer

composer install

###installation de Symfony Voici le lien vers le site officiel de Symfony : https://symfony.com/doc/current/setup.html

composer create-project symfony/skeleton:"6.3.*" my_project_directory (Vous pouvez changer le "my_project_directory" par le nom de votre projet)

(aller dans votre dossier projet) cd my_project_directory

#Lancer Symfony sur le serveur local symfony server:start

#Arrêter Symfony sur le serveur local symfony server:stop

### Gotenberg

Gotenberg est un service Docker, donc vous aurez besoin de Docker pour l'exécuter. Voici comment vous pouvez installer et exécuter Gotenberg grâce aux consignes de ce site, le lien est ci-dessous :  

1. : Le lien : https://gotenberg.dev/docs/getting-started/installation

2. Ouvrez votre navigateur et accédez à `http://localhost:8000` pour voir votre application Symfony.
   
3. Gotenberg est accessible à `http://localhost:3000`.

