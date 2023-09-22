# EVENTIZ

## Description du projet:
L'application est une plateforme complète pour la gestion d'événements, conçue pour faciliter la planification, la gestion et la participation à des événements de toutes sortes. Elle offre une gamme complète de fonctionnalités pour les administrateurs, les demandeurs d'événements, les participants et les utilisateurs en général.

Fonctionnalités clés :

Administration :

Les administrateurs peuvent se connecter à l'interface d'administration sécurisée.
Gestion des catégories d'événements pour une organisation efficace.
Contrôle complet des comptes administrateurs.
Gestion des listes de participants aux événements.
Suivi des statistiques pour évaluer la performance.
Gestion complète des événements, y compris leur création, mise à jour et suppression.
Réception de feedbacks des utilisateurs pour améliorer les événements.
Notifications en temps réel grâce à l'intégration de websockets.
Possibilité de modifier le profil administrateur.
Téléchargement de factures avec codes QR pour un suivi transparent.
Communication bidirectionnelle avec les utilisateurs pour répondre aux demandes et aux questions.
Demandeurs d'événements :

Soumission de demandes pour la création d'événements.
Réception de notifications en temps réel concernant l'acceptation ou le refus des demandes d'événements.
Possibilité de modifier le profil personnel.
Téléchargement de factures avec codes QR pour un suivi des événements.
Participants :

Achat de billets pour des événements.
Réception de notifications en cas de modifications d'événements.
Évaluation des événements auxquels ils ont participé.
Possibilité de modifier le profil personnel.
Cette application offre une expérience utilisateur complète pour tous les acteurs impliqués dans la planification et la participation à des événements. Elle est conçue pour être conviviale et hautement fonctionnelle, permettant ainsi aux utilisateurs de tirer le meilleur parti de leurs événements, qu'ils soient organisateurs, demandeurs ou participants.

## Steps for Project Execution :

```
Clonez le dépôt Git :
1.git clone https://github.com/Rabiezouita11/ProjectEvent

2.Accédez au dossier du projet :
cd ProjectEvent

3.Installez les dépendances :
composer install

4.Créez un fichier .env :
cp .env.example .env

5.Générez une clé d'application :
php artisan key:generate

6.Migrez la base de données :
php artisan migrate

7.Lancez le serveur de développement :
php artisan serve

8.Lancez le serveur de Websocket :
php artisan websocket:serve


9.Accédez à l'application :
http://localhost:8000/home

```

## Ajouter un administrateur à la base de données :

```
1.Ouvrez phpMyAdmin :
Accédez à votre interface phpMyAdmin en ouvrant un navigateur web et en entrant l'URL de phpMyAdmin (par exemple, http://localhost:8000/phpmyadmin) ou en utilisant l'URL spécifique fournie par votre hébergeur web si votre application est hébergée en ligne.

2.Connectez-vous à votre base de données :
Connectez-vous à la base de données de votre application à l'aide des informations de connexion appropriées.

3.Sélectionnez la table des utilisateurs :
Dans phpMyAdmin, sélectionnez la table des utilisateurs de votre base de données. Par défaut, cela pourrait être nommé quelque chose comme users.

4.Ajoutez un nouvel enregistrement (utilisateur) :
Cliquez sur le bouton "Insérer" (ou "Ajouter" selon la version) pour ajouter un nouvel enregistrement (utilisateur) à la table des utilisateurs.

5.Saisissez les informations de l'administrateur :
Remplissez les champs appropriés pour l'administrateur que vous souhaitez ajouter. Les informations de base peuvent inclure :

Nom d'utilisateur
Adresse e-mail
Mot de passe (assurez-vous de le hacher en utilisant bcrypt)
Attribuez le rôle d'administrateur ( nécessaire) :
role : admin

Cliquez sur "Exécuter" :
Une fois que vous avez rempli les informations, cliquez sur le bouton "Exécuter" (ou "Enregistrer" selon la version) pour ajouter l'administrateur à la base de données.

Accédez à l'application :
Vous pouvez maintenant accéder à l'application en utilisant les informations d'identification de l'administrateur que vous avez ajouté à la base de données.

```

<table>
<thead>
<tr>
<th>Area</th>
<th>Technology</th>
</tr>
</thead>
<tbody>
	<tr>
		<td>full stack</td>
		<td>Laravel</td>
	</tr>
	
  <tr>
		<td>Authentication</td>
		<td> Laravel/UI Package </td>
	</tr>
	<tr>
		<td>API Testing</td>
		<td>Postman</td>
	</tr>
	<tr>
		<td>Database</td>
		<td>Sql</td>
	</tr>
  <tr>
		<td>Images Storage</td>
		<td>locale</td>
	</tr>
    <tr>
		<td>Other APIs Used</td>
		<td>Stripe Payment,api map , API email(mailtrap) </td>
	</tr>
</tbody>
</table>



## Demo 


https://github.com/Rabiezouita11/ProjectEvent/assets/91283165/9c6ac43c-db4e-49cd-b2a0-0f79082b9717


