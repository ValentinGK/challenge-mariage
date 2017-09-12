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
				$this->insertInvite = $db->prepare("INSERT INTO invites (mailinvite, passinvite, nominvite, prenominvite, admin) 
				VALUES (:email, :pass, :nom, :prenom, :admin)");

				$this->selectAllInvite = $db->prepare("SELECT * from invites");

				$this->selectOneInvite = $db->prepare("SELECT * from invites WHERE mailinvite = :email");
				// FIN FONCTION INVITES //

				// FONCTIONS CADEAUX //
				$this->insertKdo = $db->prepare("INSERT INTO kdo (libellekdo, quantitekdo, imageKdo, desckdo)
				VALUES (:libelleKdo, :quantiteKdo, :imageKdo, :descKdo)");

				$this->selectAllKdo = $db->prepare("SELECT * from kdo");

				$this->updateKdo = $db->prepare("UPDATE kdo SET libellekdo = :libellekdo, desckdo = :desckdo, quantitekdo = :quantitekdo WHERE idkdo = :idkdo");

				$this->updateImageKdo = $db->prepare("UPDATE kdo SET imagekdo = :imageKdo WHERE idkdo = :idkdo");

				$this->deleteKdo = $db->prepare("DELETE from kdo WHERE idkdo = :idkdo");

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
			return $this->selectOneInvite->fetch();
		}

		public function insertInvite($nom,$prenom,$email,$pass,$admin){
			$this->insertInvite->execute(array(':email' => $email,':pass' => $pass,':nom' => $nom, ':prenom' => $prenom, ':admin' => $admin));
			return $this->insertInvite->errorInfo();
		}
		// FIN FONCTION INVITE //

		// FONCTION CADEAU //
		public function insertKdo($libelleKdo,$descKdo,$quantiteKdo,$imageKdo){
			$extensions = array('.png', '.jpg', '.jpeg');
			$extension = strrchr($imageKdo['name'], '.');
			if(!in_array($extension, $extensions)){
				return $extension;
			}
			$fichier = basename($imageKdo['name']);
			move_uploaded_file($imageKdo['tmp_name'], __DIR__ . '/../assets/images/image-cadeaux/'.$fichier);
			$this->insertKdo->execute(array(':libelleKdo'=> $libelleKdo, ':quantiteKdo' => $quantiteKdo, ':imageKdo' => $imageKdo['name'], ':descKdo' => $descKdo));
		 	return $this->insertKdo->errorInfo();
		}

		public function selectAllKdo(){
			$this->selectAllKdo->execute();
			return $this->selectAllKdo->fetchAll();
		}

		public function updateKdo($libelleKdo,$descKdo,$quantiteKdo,$idkdo){
			$this->updateKdo->execute(array(':libellekdo'=> $libelleKdo, ':desckdo' => $descKdo, ':quantitekdo' => $quantiteKdo, ':idkdo' => $idkdo));
			return $this->updateKdo->errorInfo();
		}
		public function updateImageKdo($imageKdo,$idkdo){
			$extensions = array('.png', '.jpg', '.jpeg');
			$extension = strrchr($imageKdo['name'], '.');
			if(!in_array($extension, $extensions)){
				return $extension;
			}
			$fichier = basename($imageKdo['name']);
			move_uploaded_file($imageKdo['tmp_name'], __DIR__ . '/../assets/images/image-cadeaux/'.$fichier);
			$this->updateImageKdo->execute(array(':imageKdo' => $imageKdo['name'], ':idkdo' => $idkdo));
			return $this->updateImageKdo->errorInfo();
		}
		public function deleteKdo($idkdo){
			$this->deleteKdo->execute(array(':idkdo' => $idkdo));
			return $this->deleteKdo->errorInfo();
		}
		public function buyKdo($idkdo){
			$this->buyKdo->execute(array('idkdo' => $idkdo));
			return $this->buyKdo->errorInfo();
		}
		// FIN FONCTION CADEAU //

		public function compare($login,$password){
			$proof = $this->selectOneInvite($login);
			if($proof){
				if($proof['passinvite'] == $password) {
					$_SESSION['id'] = $proof['idinvite'];
					$_SESSION['email'] = $proof['mailinvite']; 
					$_SESSION['nom'] = $proof['nominvite']; 
					$_SESSION['prenom'] = $proof['prenominvite'];  
					$_SESSION['admin'] = $proof['admin'];
					return $_SESSION;
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

	function p($p){
		if(isset($_POST[$p])){
			$_POST[$p] = htmlentities($_POST[$p]);
			return $_POST[$p];
		}else{
			return false;
		}
	}
	function g($g){
		if(isset($_GET[$g])){
			$_GET[$g]= htmlentities($_GET[$g]);
			return $_GET[$g];
		}else{
			return false;
		}
	}
	function isValid($p){
		if(isset($p) && !empty($p)){
			return true;
		}else{
			return false;
		}
	}
?>