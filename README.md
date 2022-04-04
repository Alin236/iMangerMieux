# iMangerMieux

iMangerMieux est une application Web permettant de suivre son alimentation en stockant dans un journal ses repas.
Ainsi iMangerMieux aide à réguler ses différents apports énergétiques.

Cette application a été créé dans le cadre d'un projet d'UV.

## Journal

Le journal est le coeur de l'application. En effet il va stocker tous les repas de l'utilisateur à la date de consommation.
Pour choisir ses repas, l'utilisateur pourra sélectionner l'un des nombreux aliments présent dans la base de données ou bien créer son propre aliment et l'ajouter dans la base de donnée.

## Utilisateur

L'utilisateur possède un compte personnel et donc un journal personnel. De ce fait l'application n'est accessible que pour un utilisateur connecté. Enfin l'utilisateur pourra modifier ses informations personnels dans une page dédiée.

## Sécurité

Bien que cette application possède un système de compte utilisateur et des informations personnel, nous sommes comcient qu'elle est très peu sécurisée. Cependant la sécurité de l'application ne fait pas parti du cadre de l'UV.

## Dashbord

Deux graphiques sont actuellement présent dans le dashbord.
Le premier permet de suivre sa consommation moyenne de fruits et légumes.
Le deuxième permet de faire une analyse journalière de sa consommation.

## Structure

L'application est séparé en deux parties, la partie backend et la partie frontend.
La structure de l'application partie frontend est factorisée dans le fichier index.php.

## Documentation

Une documentation de l'API REST est disponible dans le fichier /backend/doc/RESTAPI.html.

## Installation

Pour installer cette application en local il faut :

1 - Cloner le git

2 - Utiliser un serveur local (dans notre cas, nous avons utilisé WAMP)

3 - Importer la base de donnée /backend/doc/imangermieux.sql

4 - Configurer l'accés à la base de donnée dans les fichiers backend/connection.php ligne 3 à 6 et backend/aliment.php ligne 52 à 57.

## Piste d'amélioration

- Augmenter le nombre de graphique dans le dashbord.

- Comparer les calcules avec des valeurs recommandés.

- Permettre à l'utilisateur de renseigner les sports qu'il pratique.

- Prendre en compte l'âge, le genre, le sport pratiqué lors des calcules.

- Avoir une personnalisation de l'esthétique de l'application en sauvegardant la préférence de l'utilisateur dans un cookie.

- Permettre à l'utilisateur de chercher des aliments dans la base OpenFoodFact.

- Permettre de définir des aliments comme composés d'autres aliments présent dans la base.

- Factoriser la configuration : mettre les identifiants de connexion au SGBD dans un fichier /backend/config.php et mettre l'URL du backend dans un fichier /frontend/config.php.