<?php
	class DB {
		function __construct(){
			session_start();

			$config['serveur'] 	= 'localhost';
			$config['login'] 	= 'alolu';
 			$config['mdp'] 		= 'famille';
 			$config['bd'] 		= 'bdkdo';

 			try{
				$db = new PDO('mysql:host='.$config['serveur'].';dbname='.$config['bd'],$config['login'],$config['mdp']);

				// FONCTIONS INVITES //
				$this->insertInvite = $db->prepare("INSERT INTO invite (mailinvite, passinvite, nominvite, prenominvite, admin) 
				VALUES (:email, :pass, :nom, :prenom, :admin)");

				$this->selectAllInvite = $db->prepare("SELECT * from invite");

				$this->selectOneInvite = $db->prepare("SELECT * from invite WHERE mailinvite = :email");
				// FIN FONCTION INVITES //

				// FONCTIONS CADEAUX //
				$this->insertKdo = $db->prepare("INSERT INTO kdo (libellekdo, quantitekdo, prixkdo)
				VALUES (:libelle, :quantite, :prix)");

				$this->selectAllKdo = $db->prepare("SELECT * from kdo");
				// FIN FONCTION CADEAUX //
			}
			catch(Exception $e){
				echo 'Erreur de connection a la base de donnée : '.$e->getMessage();
				$db = NULL;
			}
		}
		// FONCTION INVITES //
		public function selectAllInvite(){
			$this->selectAllInvite->execute();
			return $this->selectAllInvite->fetchAll();
		}

		public function selectOneInvite($email){
			$this->selectOneInvite->execute(array(':email' => $email));
			return $this->selectOneInvite->fetchAll();
		}

		public function insertInvite($nom,$prenom,$email,$pass,$admin){
			$this->insertInvite->execute(array(':email' => $email,':pass' => $pass,':nom' => $nom, ':prenom' => $prenom, 'admin' => $admin));
			return $this->insertInvite->rowCount();
		}
		// FIN FONCTION INVITE //

		public function compare($login,$password){
			$proof = $this->selectOneLogin($login);
			if($proof){
				if($proof['passinvite'] == sha1($password)){
					$_SESSION['id'] = $proof['idinvite'];
					$_SESSION['email'] = $proof['emailinvite']; 
					$_SESSION['nom'] = $proof['nominvite']; 
					$_SESSION['prenom'] = $proof['prenominvite'];  
					$_SESSION['admin'] = $proof['admin'];
				}else{
					return false;
				}
			}else{
				return false;
			}
		}
	}
	$DB = new DB;
	global $DB;
?>