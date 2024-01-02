# garageParrot
ecf du garage de vincent parrot

## Instruction d'installation en local

1. Installer PHP :
	en téléchargeant le programme sur ce lien; https://www.php.net/downloads 
	et si il est déja installer vérifier que la version est superireur à 7.2.5, avec la commande :
		***	
			php -v	
				***

2. Installer symfony en suivant les étape sur ce lien :
	https://symfony.com/download

3.Installer les dépendances avec Composer :
	***
		composer Install
			****

4.  Cloner le projet depuis GitHub
	***
		git clone https://github.com/akramsl/garageParrot.git
				****
			
5. Configurer la base de donnée dans le fichier .env si nécessaire 

6. Lancé le serveur de l'IDE avec : 
	***
		symfony serve:start
			****

7.Acceder à l'application dans votre navigateur, normalement avec l'adresse :
	http://127.0.0.1:8000/

---------------------------------------------------------------------------------------------------------------
					Création d'un administrateur
---------------------------------------------------------------------------------------------------------------


1. Ouvrir la commande et se localiser dans le projet :
	***	
		cd nom_du_projet
		****

2. Création de l'admin, remplacer <email> par l'email du nouveau admin et <password> par le mot de passe du nouveau admin:
	***	
		symfony console app:create-admin <email> <password>
		****

3. Vous pouvez maintenant vous connecter dans l'onglet connexion du site web