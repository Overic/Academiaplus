# Academiaplus
Ce projet est une application d'enregistrement des étudiants par un admin .Ceci est un CRUD en Symfony.

#Creer le fichier .env.dev.local pour creer la base de donnees a la racine du projet
Exemple du code avec mysql:
DATABASE_URL="mysql://root@127.0.0.1:3306/AcademiaPlustest"

#Creer la base de données
Taper la commande:
php bin/console doctrine:database:create

#Faire la migration
Taper la commande:
php bin/console doctrine:migration:migrate

#Charger les fixtures
Taper la commande:
php bin/console doctrine:fixtures:load

#Demarrer le serveur du projet
Taper la commande:
php bin/console server:start

#Acceder a la page d'acceuil 
Il est souvent accessible a la l'adresse: 
http://localhost:8000/

#Se connecter 
Avec les identifiants suivant: 
Email: admin@gmail.com
Password: password
