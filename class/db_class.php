<?php
	class DB {
		function __construct(){

			$config['serveur'] 	= 'localhost';
			$config['login'] 	= 'alolu';
 			$config['mdp'] 		= 'famille';
 			$config['bd'] 		= 'bdkdo';

 			try{
				$db = new PDO('mysql:host='.$config['serveur'].';dbname='.$config['bd'],$config['login'],$config['mdp']);

				// FONTIONS INVITES //
				$this->insertInvite = $db->prepare("INSERT INTO invite (email, pass, nom, prenom) 
				VALUES (:email, :pass, :nom, :prenom)");

				$this->selectAllInvite = $db->prepare("SELECT * from invite");
				// FIN FONCTION INVITES //

				// FONCTIONS CADEAUX //
				$this->insertKdo = $db->prepare("INSERT INTO kdo (libellekdo, quantitekdo, prixkdo)
				VALUES (:libelle, :quantite, :prix)");

				$this->selectAllKdo = $db->prepare("SELECT * from kdo");
				// FIN FONCTION CADEAUX //
			}
			catch(Exception $e){
				echo 'Echec: '.$e->getMessage();
				$db = NULL;
			}
		}
	}
	$DB = new DB;
	global $DB;
?>