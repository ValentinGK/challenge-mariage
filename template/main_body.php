<?php
  function head($title){
    echo'
      <!DOCTYPE html>
      <html>
        <head>
          <title>'. $title .'</title>
          <meta charset="UTF-8">
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
        </head>
      <body>
    ';
  }

  function body(){
    echo'
      <!-- navbar -->
       <nav class="navbar navbar-toggleable-xl navbar-inverse bg-inverse">
       <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#nav-content" aria-controls="nav-content" aria-expanded="false" aria-label="Toggle navigation">
       </button>
      <!-- Links -->
      <a class="navbar-brand" href="">Challenge-Mariage</a>
      <div class="collapse navbar-collapse justify-content-end" id="nav-content">   
      <ul class="navbar-nav">
      <li class="nav-item">
      <a class="nav-link" href="" data-toggle="modal" data-target="#signin">Se connecter</a>
      </li>
      </ul>
      </nav>
      <h2 class="text-center mt-3 mb-3">Liste des cadeaux</h2>
       <div class="container">
        <div class="jumbotron">
           <div class="row">
            <div class="col-sm-4">
             <div class="card">
              <img class="card-img-top" style="height:300px;" src="http://caffaknitted.typepad.com/.a/6a00e54f8f86dc883401287636e5db970c-800wi">
                <div class="card-block">
                  <h4 class="card-title">Doggo</h4>
                  <h6 class="card-subtitle text-muted">50.00€</h6>
                  <div class="input-group mt-4 mb-3">
                  </div>
                  <p class="card-text">Le basset artésien normand est une race de chien de chasse d\'origine française. C\'est un chien courant de type basset, long et bas sur pattes, de couleur tricolore ou bicolore. Il est utilisé comme un chien de chasse pour le petit gibier et comme chien de compagnie.</p>
                  <div class="text-center">
                    <p class="card-text">Quantité : 1</p>
                  </div>
                  </div>
                  </div>
                <div class="card-footer text-center">
                  <a href="#" class="card-link" data-toggle="modal" data-target="#Edit">Acheter</a>
                </div>
              </div>
            <div class="col-sm-4">
             <div class="card">
              <img class="card-img-top" style="height:300px;" src="http://caffaknitted.typepad.com/.a/6a00e54f8f86dc883401287636e5db970c-800wi">
                <div class="card-block">
                  <h4 class="card-title">Doggo</h4>
                  <h6 class="card-subtitle text-muted">50.00€</h6>
                  <div class="input-group mt-4 mb-3">
                  </div>
                  <p class="card-text">Le basset artésien normand est une race de chien de chasse d\'origine française. C\'est un chien courant de type basset, long et bas sur pattes, de couleur tricolore ou bicolore. Il est utilisé comme un chien de chasse pour le petit gibier et comme chien de compagnie.</p>
                  <div class="text-center">
                    <p class="card-text">Quantité : 1</p>
                  </div>
                  </div>
                  </div>
                <div class="card-footer text-center">
                  <a href="#" class="card-link" data-toggle="modal" data-target="#Edit">Acheter</a>
                </div>
              </div>
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
                 <label for="inputEmail" class="sr-only">Adresse mail</label>
              <input type="email" id="inputEmail" class="form-control" placeholder="Adresse mail" required autofocus>
              <label for="inputPassword" class="sr-only">Mot de passe</label>
              <input type="password" id="inputPassword" class="form-control" placeholder="Mot de passe" required>
              <div class="checkbox">
              </div>
              </div>
              <div class="modal-footer">
                <button class="btn btn-lg btn-primary btn-block" type="submit">Se connecter</button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /modals -->
    ';
  }
  echo'
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script src="https://unpkg.com/tether@1.3.7/dist/js/tether.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
  </body>
  </html>';
?>