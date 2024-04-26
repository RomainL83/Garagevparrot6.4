## Titre et Description

PROJET GARAGE V PARROT
Site vitrine du garage V Parrot, proposant des services de réparation et maintenance des véhicules et vente de voiture d'occasion.

## liste des principales fonctionnalités de l'application.

Concernant les USER (visiteurs)
- Creer son compte utilisateur
- Envoyer un message pour demander des informations au garage
- Parcourir les différents services
- Une fois l'intervention faite possibilité de laisser un témoignage noté

Concernant les EMPLOYEES
- Se connecter à son espace personnel
- Gérer les annonces des véhicules
- Gérer le systeme de review

Concernant l'ADMIN
- Accéder à son espace personnel
- Création et gestion de compte employé
- Modification des horaires et jours d'ouvertures
- Accès à l'ensemble des fonctionnalités et possibilité du site, et sa gestion



## Technologies Utilisées
● Version PHP 8.2 ● Extension PHP : PDO ● MySQLWorkbench (Heroku)

FRONT : 
●HTML 5 ● CSS 3 ● JavaScript ● Bootstrap ● jQuery 

BACK : 
● PHP 8.2 sous PDO ● MySQL 


## Instructions sur la manière d'installer et de configurer l'application.
- Pour obtenir une copie locale de ce projet, exécutez la commande suivante dans votre terminal : 
bash git clone https://github.com/RomainL83/Garage_vparrot.git

Après avoir cloné le dépôt, naviguer dans le répertoire du projet : cd nom_du_projet
- Ensuite, installez les dépendances nécessaires: composer install / npm install
pour les bundles nécessaires.

Afin de pouvoir lancer votre application et acceder à votre page localhost.
Assurez-vous que tous les fichiers du site web (HTML, CSS, JavaScript, etc.) sont 
présent et créér un nouveau dossier dans le répertoire "htdoc" de 
WampServer, Xampp, Mamp... pour y mettre le repertoire de votre site web. 
Enfin aller dans le dossier xampp/appache/conf/extra et y modifier le fichier httpd-vhosts.conf en y ajoutant les informations qui sont dans ce fichier que vous avez télécharger.


Concernant la connexion avec la base de donnée, dans le fichier ".env" décommenter la ligne :
(# DATABASE_URL="mysql://app:!ChangeMe!@127.0.0.1:3306/app?serverVersion=10.4.28-MariaDB&charset=utf8mb4")
- Modifiez 'DB_NAME' par le nom de votre base de donnée
- Modifiez 'DB_USER' par votre nom d'utilisateur à la place de 'nomutilisateur'
- Modifiez 'DB_PASSWORD' par votre mot de passe si vous en avez un à la place de 
'motdepasse

pour obtenir ce résultat : DATABASE_URL="mysql://root@127.0.0.1:3306/ecf?serverVersion=mariadb-10.4.28&charset=utf8mb4"

A ce stade important ! : Faire :
- php bin/console doctrine:database:drop --force
- php bin/console doctrine:database:create
- php bin/console doctrine:migrations:migrate   
- php bin/console doctrine:fixtures:load      

## Accéder à votre site web 
Ouvrez un navigateur web (Google Chrome, Mozilla Firefox, etc.). Tapez l'adresse (http://localhost/) 
dans la barre de recherche.

Felicitations ! vous avez maintenant accés à la page de votre application en local.

## Utilisation
Pour vous connecter utilisé le lien prévu a cet effet en haut a droite de la navbar "Se Connecter" vous allez etre rediriger vers la page de connexionn.
Saisir les identifiants:
- Pour tester les modes Admin et employé, des comptes test ont été crées et insérés dans la base de donnée:

En rentrant l'adresse mail de l'Admin a savoir: vincentparrot@vparrot.com
Mot de passe: password
Role : Admin

Avec l'adresse mail : lauramartel@vparrot.com
Mot de passe: password
Role: Employée

L'application à été déployé à cette adresse: (https://garagevparrotecf2024-ed9a0ebceedd.herokuapp.com/)


## TRELLO
https://trello.com/invite/b/uD1MjnXV/ATTI205770be7212ce7e01bb5de910bf4cf3486749A6/ecf-vparrot


## USER STORY

Epic: Gestion du Garage
US1: Connexion des utilisateurs

En tant qu'administrateur ou employé, pouvoir se connecter à l'application avec email et mot de passe.
US2: Présentation des services

En tant qu'administrateur, pouvoir modifier les services offerts par le garage.
En tant que visiteur, consulter les services offerts sur la page d'accueil.
US3: Gestion des horaires

En tant qu'administrateur, définir les horaires d'ouverture du garage.
En tant que visiteur, consulter les horaires d'ouverture sur toutes les pages du site.
US4: Catalogue de véhicules d'occasion

En tant qu'employé, ajouter des véhicules d'occasion à vendre.
En tant que visiteur, consulter les véhicules d'occasion disponibles avec détails.
US5: Filtre des véhicules d'occasion

En tant que visiteur, filtrer les véhicules d'occasion selon différents critères sans rechargement de page.
US6: Contact avec l'atelier

En tant que visiteur, contacter le garage via un formulaire en ligne ou par téléphone.
US7: Témoignages des clients

En tant qu'employé, modérer et ajouter des témoignages clients.
En tant que visiteur, consulter et soumettre des témoignages.
Epic: Développement Technique
US8: Maquettage de l'application

Définir et élaborer les wireframes et maquettes pour mobile et desktop.
US9: Développement Front-End

Implémenter les interfaces utilisateur statiques et dynamiques selon les maquettes.
US10: Développement Back-End

Créer la base de données et développer les composants d'accès aux données.
Développer la logique métier de l'application.
US11: Sécurité et déploiement

Intégrer les recommandations de sécurité.
Décrire le processus d'installation et de déploiement de l'application.
Epic: Documentation et Livrables
US12: Documentation technique

Rédiger la documentation technique incluant choix des technologies, configuration, et diagrammes.
US13: Charte graphique

Élaborer la charte graphique incluant palette de couleurs, polices, et export des maquettes.
US14: Préparation des livrables

Préparer les fichiers nécessaires pour la mise en ligne et la présentation du projet (code source, base de données, readme, documentation technique).

## 
Toutes les fonctionnalités sont désormais pleinement fonctionnelles, et nous avons éliminé tous les problèmes suite à la dernière mise à jour. Si vous rencontrez des erreurs ou des bugs lors de l'utilisation de l'application, merci de contacter notre service d'assistance à l'adresse (locquet.romain83@gmail.com) pour que nous puissions procéder aux ajustements nécessaires