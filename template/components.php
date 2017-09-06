<?php 
	function kdo_card($kdo){
		echo '
			<div class="col-sm-4">
             	<div class="card">
              		<img class="card-img-top" style="height:300px;" src="http://caffaknitted.typepad.com/.a/6a00e54f8f86dc883401287636e5db970c-800wi">
                	<div class="card-block">
                  		<h4 class="card-title">'.$kdo['libellekdo'].'</h4>
                  		<h6 class="card-subtitle text-muted">'.$kdo['prixkdo'].'</h6>
                  		<p class="card-text">
                  			'.$kdo['desckdo'].'
                  		</p>
	                  	<div class="text-center">
	                    	<p class="card-text">Quantité : '.$kdo['quantitekdo'].'</p>
	                  	</div>
                	</div>
            	</div>
                <div class="card-footer text-center">
                  <a href="#" class="card-link" data-toggle="modal" data-target="#Edit">Acheter</a>
                </div>
            </div>
		';
	}
?>