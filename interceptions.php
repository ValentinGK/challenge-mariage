<?php
	require_once 'class/db_class.php';
	require_once 'template/components.php';

	// AJOUT UTIISATEUR //
	if(isValid(p('email'))){
		$ajoutUser = $DB->insertInvite(p('nom'),p('prenom'),p('email'),md5(p('pass')),p('admin'));
	}

	// CONNECTION UTILISATEUR //
	if(isValid(p('signEmail'))){
		$compareUser = $DB->compare(p('signEmail'),md5(p('signPass')));
		if($_SESSION){
			if($_SESSION['id'] == 1){
				echo'
					<li class="nav-item">
	                	<a class="nav-link" href="#" data-toggle="modal" data-target="#addKdo">Ajouter un cadeau</a>
	              	</li>
					<li class="nav-item">
	                	<a class="nav-link" href="#" data-toggle="modal" data-target="#register">Ajouter un invité</a>
	              	</li>
            	';
			}
			echo '
				<li class="nav-item">
		            <a class="nav-link" href="#" data-toggle="modal" data-target="#signout">Se deconnecter</a>
		        </li>
			';

		}
	}

	// DECONNECTION UTILISATEUR
	if(isValid(p('deco'))){
		$_SESSION = array();
		if (ini_get("session.use_cookies")) {
		    $params = session_get_cookie_params();
		    setcookie(session_name(), '', time() - 42000,
		        $params["path"], $params["domain"],
		        $params["secure"], $params["httponly"]
		    );
		}
		session_destroy();
		echo '
			<li class="nav-item">
              <a class="nav-link" href="#" data-toggle="modal" data-target="#signin">Se connecter</a>
            </li>
        ';
	}

	// AJOUT CADEAU //
	if(isset($_FILES["imageKdo"]["type"])){
		$addKdo = $DB->insertKdo(p('libelleKdo'),p('descKdo'),p('quantiteKdo'),$_FILES['imageKdo']);
		reloadKdo();
	}
	if(isValid(p('reload'))){
		if(p('reload') == 1){
			reloadKdo();
		}
	}
?>