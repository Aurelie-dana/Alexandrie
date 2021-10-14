#Alexandrie

Description du projet :

.

Application Web sur le thème d’une médiathèque, avec possibilité d’inscription et de connexion.

Ainsi qu’un espace membre Administrateur et User.

.

Possibilité du tableau de bord Administrateur :

Ajout d’un utilisateur User ou Administrateur.

Ajout de livre dans le catalogue.

Voir le catalogue.

.

Possibilité du tableau de bord User :

Demande d’emprunt de livre ( \ ! / ) Attention fonctionnalité non fonctionnelle ( \ ! / ).

Voir le catalogue.

.

Déploiement du projet :

1 : Télécharger les fichiers du projet.

2 : Upload les fichiers sur votre serveur.

3 : Modifier le fichier « config.php » avec VOS informations lié à VOTRE BDD. Soit les informations suivantes :

DB_SERVER // Indiquer l’hôte

DB_USERNAME // indiquer le nom de l'utilisateur de votre BDD

DB_PASSWORD // indiquer le mot de passe de votre BDD

DB_NAME // indiquer le nom de la base de données

.

4 : Si vous souhaitez changer et/ou modifier les champs dans les formulaires des pages suivantes : 

register.php / login.php / ajout-de-livre.php / add_user.php

( \ !/ ) Vérifier que les champs liés à vos formulaires correspondent aux informations de votre base de données ( \ !/ ).

.

5 : Veuillez indiquer les informations liées à VOTRE base de données dans les fichiers suivants : 

tableau-inscrit.php et tableau-employe.php

.

6 : Si vous souhaitez personnaliser le site avec VOS images, veuillez modifier les fichiers img dans le dossier « principal » ainsi que dans le dossier « admin ».

( \ !/ ) Si vous souhaitez changer les photos dans les dossier img, veuillez vérifier les chemins dans les dossier suivants  ( \ !/ ) : 

register.php / login.php / index.php / tableau-inscrit.php / tableau-employe.php / demande-emprunt.php / ajout-de-livre.php / add_user.php

.

Technologie utllisé pour cette application Web :

Front-End : HTML 5 / CSS 3 / Boostrap 5 / Javascript

Back-End : PHP 7.4 sous PDO / MySQL

Serveur : MariaDB / Apache 2 / MySQL

.

FAQ :

Question : Comment faire pour déployer ce site ?

Réponse : Veuillez-vous référer aux instructions de déploiement du site dans le fichier Readme.md.

.

Questions : J’ai déployé le site, mais les informations liées au formulaire ne s’incrémentent pas dans ma base de données, que doit-je faire ?

Réponse : Veuillez vérifier que vous n’avez pas fait d’erreur dans les fonctions PHP.

Avez-vous vérifié que les informations remplis dans les champs du formulaire correspondent exactement à votre base de données ? ainsi qu’a celle des fonctions PHP ?

.

Exemple avec le champ « nom » du formulaire de la page « register.php » :

Informations du formulaire :

input type="text" class="form-control form-control-user" name="username" placeholder="Nom"

.

Informations PHP :

require('config.php');

if (isset($_REQUEST['nom'])){

$nom = stripslashes($_REQUEST['nom']);

$nom = mysqli_real_escape_string($conn, $nom);

.

Le champ du formulaire « name="username" » ne correspond pas aux informations remplis dans les fonctions PHP !

