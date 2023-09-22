# EVENTIZ


## Steps for Project Execution :

```
Clonez le dépôt Git :
1.git clone https://github.com/Rabiezouita11/ProjectEvent)https://github.com/Rabiezouita11/ProjectEvent

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

8.Accédez à l'application :
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
		<td>Back-End</td>
		<td>Express, Node.js</td>
	</tr>
  <tr>
		<td>Authentication</td>
		<td>JWT(JSON Web Tokens)</td>
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
		<td>Stripe Payment,api map , API de géolocalisation , API email </td>
	</tr>
</tbody>
</table>
