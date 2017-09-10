<?php
  function head($title){
    echo'
      <!DOCTYPE html>
      <html>
        <head>
          <title>'. $title .'</title>
          <meta charset="UTF-8">
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
          <link rel="stylesheet" href="assets/css/main.css">
        </head>
      <body>
    ';
  }

  function body(){
    global $DB;
    echo'
      <!-- navbar -->
       <nav class="navbar navbar-toggleable-xl navbar-inverse bg-inverse">
       <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#nav-content" aria-controls="nav-content" aria-expanded="false" aria-label="Toggle navigation">
       </button>
      <!-- Links -->
      <a class="navbar-brand" href="">Challenge-Mariage</a>
        <div class="collapse navbar-collapse justify-content-end" id="nav-content">   
          <ul class="navbar-nav" id="connectBar">';
          if($_SESSION){
            if($_SESSION['admin'] == 1){
              echo '
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
          }else{
            echo '
            <li class="nav-item">
              <a class="nav-link" href="#" data-toggle="modal" data-target="#signin">Se connecter</a>
            </li>
            ';
          } 
    echo'    
          </ul>
        </div>
      </nav>
      <h2 class="text-center mt-3 mb-3">Liste des cadeaux</h2>
       <div class="container">
        <div class="jumbotron">
            <div id="kdo_display" class="row">';
            reloadKdo();
            echo'
              </div>
           </div>
          </div> 
        </div> 
      <!-- /container -->

      <!-- modals -->
       <div class="modal fade" id="signin" tabindex="-1" role="dialog" aria-labelledby="#signin" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="form-signin-heading">S\'inscrire</h4>
              </div>
              <div class="modal-body">
                <form id="signUser">
                  <div class="form-group">
                    <label for="inputEmail" class="sr-only">Adresse mail</label>
                    <input type="email" id="signEmail" class="form-control" placeholder="Adresse mail" required autofocus>
                  </div>
                  <div class="form-group">
                    <label for="signPass" class="sr-only">Mot de passe</label>
                    <input type="password" id="signPass" class="form-control" placeholder="Mot de passe" required autofocus>
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <button class="btn btn-lg btn-primary btn-block" onclick="signIn()" type="submit">Se connecter</button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal fade" id="addKdo" tabindex="-1" role="dialog" aria-labelledby="#addKdo" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="form-signin-heading">Ajouter un cadeau</h4>
              </div>
              <div class="modal-body">
                <form id="formKdo">
                  <div class="form-group">
                    <label for="libelleKdo" class="sr-only">Nom du cadeau</label>
                    <input id="libelleKdo" class="form-control" placeholder="Nom du cadeau" required autofocus>
                  </div>
                  <div class="form-group">
                    <label for="descKdo" class="sr-only">Description du cadeau</label>
                    <textarea id="descKdo" class="form-control" placeholder="Description du cadeau" required autofocus></textarea>
                  </div>
                  <div class="form-group">
                    <label class="custom-file">
                      <input type="file" id="imageKdo" class="custom-file-input">
                      <span class="custom-file-control"></span>
                    </label>
                  </div>
                  <div class="form-group">
                    <label class="sr-only" for="quantiteKdo">Quantité</label>
                    <select id="quantiteKdo" class="custom-select">
                      <option value="" selected disabled>Quantité</option>';
                    for ($i = 1; $i <= 100; $i++) {
                        echo '
                        <option value="'.$i.'">'.$i.'</option>
                        ';
                    }
                    echo'
                    </select>
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <button class="btn btn-lg btn-primary btn-block" onclick="addKdo()" type="submit">Se connecter</button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal fade" id="signout" tabindex="-1" role="dialog" aria-labelledby="#signout" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="form-signin-heading">Se deconnecter</h4>
              </div>
              <div class="modal-body">
                <p class="text-center mt-3"> Êtes-vous sur de vouloir vous deconnecter ? </p>
              </div>
              <div class="modal-footer">
                <button class="btn btn-lg btn-danger btn-block" onclick="signOut()" type="submit">Se deconnecter</button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="#register" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="form-signin-heading">Ajouter un invité</h4>
              </div>
              <div class="modal-body">
                <form id="addUser" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="email" class="sr-only">Adresse mail</label>
                    <input type="email" id="email" class="form-control" placeholder="Email" required autofocus>
                  </div>
                  <div class="form-group">
                    <label for="inputMdp" class="sr-only">Mot de passe</label>
                    <input type="password" id="inputMdp" class="form-control" placeholder="Mot de passe" required autofocus>
                  </div>
                  <div class="form-group">
                    <label for="inputNom" class="sr-only">Adresse mail</label>
                    <input id="inputNom" class="form-control" placeholder="Nom" required autofocus>
                  </div>
                  <div class="form-group">
                    <label for="inputPrenom" class="sr-only">Adresse mail</label>
                    <input id="inputPrenom" class="form-control" placeholder="Prenom" required autofocus>
                  </div>
                  <select id="inputAdmin" class="custom-select">
                    <option selected value="0">Invité</option>
                    <option value="1">Administrateur</option>
                  </select>
                </form>
              </div>
              <div class="modal-footer">
                <button class="btn btn-lg btn-primary btn-block" onclick="addUser()" type="submit">Ajouter</button>
              </div> 
            </div>
          </div>
        </div>
      </div>
      <!-- /modals -->
    ';
  }

  function footer(){
    echo "
      <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
      <script src='https://unpkg.com/tether@1.3.7/dist/js/tether.min.js'></script>
      <script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js' integrity='sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn' crossorigin='anonymous'></script>
      <script src=assets/js/ajax-calls.js></script>
      </body>
      </html>
    ";
  }
?>