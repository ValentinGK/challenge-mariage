<?php 
	function kdo_card($kdo){
		echo '
			<div class="col-sm-4">
             	<div class="card">
              		<img class="card-img-top" style="height:300px;" src="/assets/images/image-cadeaux/'.$kdo['imageKdo'].'">
                	<div class="card-block">
                  		<h4 class="card-title">'.$kdo['libellekdo'].'</h4>
                  		<p class="card-text">
                  			'.$kdo['desckdo'].'
                  		</p>
	                  	<div class="text-center">
	                    	<p class="card-text">Quantité : '.$kdo['quantitekdo'].'</p>
	                  	</div>
                	</div>
            	</div>';
              if($_SESSION){
                echo'
                  <div class="card-footer text-center">
                    <a href="#" class="card-link" data-toggle="modal" data-target="#Edit">Acheter</a>
                  </div>
                ';
              }
              echo'
                </div>
		';
	}
  function reloadKdo(){
    global $DB;
    $kdos = $DB->selectAllKdo();
    foreach ($kdos as $kdo) {
      echo kdo_card($kdo);
    }
  }
?>