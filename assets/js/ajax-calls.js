function addUser(){
  $.ajax({
    type: 'POST',
    url: 'interceptions.php',
    data: {nom: $('#inputNom').val(), prenom: $('#inputPrenom').val(), email: $('#email').val(), pass: $('#inputMdp').val(), admin: $('#inputAdmin').val()},
    success:function(html){
      console.log(html);
      $('#register').modal('hide');
      $('#addUser')[0].reset();
    }
  });
}
function signIn(){
  $.ajax({
    type: 'POST',
    url: 'interceptions.php',
    data: {signEmail: $('#signEmail').val(), signPass: $('#signPass').val()},
    success:function(html){
      console.log(html);
      $('#signin').modal('hide');
      $('#signUser')[0].reset();
      document.getElementById("connectBar").innerHTML=html;
      reloadKdo();
    }
  });
}
function signOut(){
  $.ajax({
    type: 'POST',
    url: 'interceptions.php',
    data: {deco: 1},
    success:function(html){
      console.log(html);
      $('#signout').modal('hide');
      document.getElementById("connectBar").innerHTML=html;
      reloadKdo();
    }
  });
}
function addKdo(){
  var file_data = $('#imageKdo').prop('files')[0];
  var form_data = new FormData();
  form_data.append('imageKdo', file_data);
  form_data.append('libelleKdo',$('#libelleKdo').val())
  form_data.append('descKdo',$('#descKdo').val())
  form_data.append('quantiteKdo',$('#quantiteKdo').val())
  $.ajax({
    type: 'POST',
    url: 'interceptions.php',
    cache: false,
    contentType: false,
    processData: false,
    data: form_data,
    success:function(html){
      console.log(html);
      document.getElementById("kdo_display").innerHTML=html;
    }
  })
}
function reloadKdo(){
  $.ajax({
    type: 'POST',
    url: 'interceptions.php',
    data: {reload: 1},
    success:function(html){
      document.getElementById("kdo_display").innerHTML=html;
    }
  })
}
function editKdo(e){
  var card = e.parentElement.parentElement;
  var id = $(card).find("input#idkdo").val()
  $(card).find("div.card-block").
  replaceWith(`<div class="card-block">
                    <h4 class="card-title">
                      <div class="form-group">
                        <label for="editLibelleKdo`+ id +`" class="sr-only">Nom cadeau</label>
                        <input id="editLibelleKdo`+ id +`" class="form-control" placeholder="Nom cadeau" value="` + $(card).find("h4.card-title").html() + `">
                      </div>
                    </h4>
                    <p class="card-text">
                      <div class="form-group">
                        <label for="editDescKdo`+ id +`" class="sr-only">Nom cadeau</label>
                        <textarea class="form-control" id="editDescKdo`+ id +`" placeholder="Description du cadeau">` + $(card).find("p.card-text").html() + `</textarea>
                      </div>
                    </p>
                    <div>
                      <label class="custom-file">
                        <input type="file" id="editImageKdo`+ id +`" class="custom-file-input">
                        <span class="custom-file-control"></span>
                      </label>
                      <div class="form-group">
                        <p class="card-text mt-3">Quantité : 
                          <select id="editQuantiteKdo`+ id +`" class="custom-select">
                            ` + makeSelect($(card).find("span#quantite").html()) + `
                          </select>
                        </p>
                      </div>
                    </div>
                </div>`);
  $(card).find("a.card-link").
  replaceWith(`<a href="#" onclick="updateKdo(`+ id +`)" class="card-link">Confirmer</a>
              <a href="#" onclick="deleteKdo(`+ id +`)" class="card-link">Supprimer</a>`);
}
function updateKdo(id){
  console.log
  var file_data = $('#editImageKdo' + id).prop('files')[0];
  var form_data = new FormData();
  form_data.append('editImageKdo', file_data);
  form_data.append('editLibelleKdo',$('#editLibelleKdo' + id).val());
  form_data.append('editDescKdo',$('#editDescKdo' + id).val());
  form_data.append('editQuantiteKdo',$('#editQuantiteKdo' + id).val());
  form_data.append('idkdo',id);

  $.ajax({
    type: 'POST',
    url: 'interceptions.php',
    cache: false,
    contentType: false,
    processData: false,
    data: form_data,
    success:function(html){
      console.log(html); 
      reloadKdo();
    }
  })
}
function makeSelect(val){
  var option = '';
  for (i = 1; i <= 100; i++){
    if(i != val){
      option = option + '<option value=' + i + '>' + i + '</option>';
    }else{
      option = option + '<option value=' + i + ' selected>' + i + '</option>';
    }
  }
  return option;
}
function deleteKdo(idkdo){
  console.log(idkdo);
  $.ajax({
    type: 'POST',
    url: 'interceptions.php',
    data: {deleteKdo:idkdo},
    success:function(html){
      console.log(html);
      reloadKdo();
    }
  })
}
function buyKdo(idkdo){
  $.ajax({
    type: 'POST',
    url: 'interceptions.php',
    data: {buyKdo:idkdo},
    success:function(html){
      console.log(html);
      reloadKdo();
    }
  })
}













