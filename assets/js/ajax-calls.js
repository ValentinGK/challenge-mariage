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
      console.log(html);
      document.getElementById("kdo_display").innerHTML=html;
    }
  })
}