******************************ReadMe********************************

# Login Administrateur : 
email : Charly@gmail.com
password : Charly!

# Page adminconnect :
http://127.0.0.1/retrogaming/public/adminconnect.php

# GitHub
https://github.com/Charly59212/retrogaming

# Structure du projet :
- app/ : 
	- Controllers/ : contrôleurs de gestion des interactions utilisateur et des actions (voir diagramme des classes php)
	- Models/ : modèles pour interagir avec la base de données (voir diagramme des classes php)
	- Views/  : vues d'affichage des pages web du site
		==> Admin/ : vues du panneau administrateur
		==> Home/ : vue de la page d'accueil
		==> User/ : vue de la page profil utilisateur
- config/ : fichier pour la connexion à la base de données 
- Documentation/ : 
    --> Base de données SQL 
    --> Diagrammes
    --> Wireframes
    --> Maquettes
- public/ :
	--> assets/ : fichiers CSS, JS, et IMG
	--> pages accessibles publiquement : index.php, adminconnect.php et tableau-de-bord-admin.php
- templates/ : header et footer
- index.php : point de redirection vers la vue de l'accueil