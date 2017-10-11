<?php
        require 'config.php';
        require 'connection.php';
        require 'database.php';
       session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Starter Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="script/myscript.js" ></script>
    <script src="script/jsonResults.js" ></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
  </head>

  <body onload="carregaPerguntasPorGrupo(<?php  echo ($_GET["id"])?>)">

    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
      <a class="navbar-brand" href="#">
     <img src="images/logoTCC.png" width="40"  class="d-inline-block align-top" alt="">
     Business Game  <?php $_SESSION["nomeUser"] ?>
   </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" onclick="redirect('Home')" href="#"><img src="images/home.png" width="25" height="25"/> Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" onclick="redirect('Desafio')" href="#"><img src="images/desafio.png" width="25" height="25"/> Perguntas Desafio  <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link"  onclick="redirect('Materia')" href="#"><img src="images/materia.png" width="25" height="25"/> Perguntas Matéria</a>
          </li>
          <li  class="nav-item" style="float:right">
            <a class="nav-link" ><img src="images/prof.png" width="25" height="25"/> <?php    echo $_SESSION["nomeUser"]; ?></a>
          </li>
          <li  class="nav-item">
            <a  class="nav-link"  onclick="redirect('actions/encerrarsessao')" href="#"><img src="images/sair.png" width="25" height="25"/> Sair</a>
          </li>
        </ul>
      </div>
    </nav>

    <div class="container">

      <div class="starter-template">
        <!-- Your content goes here -->
        <section>
          <div>
<h3>Questões do Grupo  <?php  $result = DataReader('select nm_grupo from grupo where cdgrupo = "'.$_GET["id"].'" '); echo $result[0]['nm_grupo']; ?>   </h3>

<button type="button" style="float:left" onclick="redirect('Home')" class="btn btn-default"><img src="images/back.png" width="25" height="25"/> Voltar</button>
</div>
<!--Área que mostrará carregando-->
<!--Tabela-->
</br>
</br>





<table  id="minhaTabela"  class="table table-hover" style="width:100%;text-align: left;">
    <thead>
    <tr>
        <th >ID</td>
    </tr>
  </thead>
 <tbody>
</section>
   </div>
</div>
</div>
</div>
</div>


</body>

</html>

<script >
$("#sub").click( function() {
if (
document.getElementById('pergunta').value == ""
|| document.getElementById('resp1').value == ""
|| document.getElementById('resp2').value == ""
|| document.getElementById('resp3').value == ""
|| document.getElementById('resp4').value == ""
) {
alert("Preencha todos os campos!");

document.getElementById('result').text ="Preencha todos os campos!";
return;

}



$.post( $("#formInserir").attr("action"),
 $("#formInserir :input").serializeArray(),
 function(info){ $("#result").html(info);

});
//clearInput();
location.reload();


document.getElementById('pergunta').value = "";
document.getElementById('resp1').value = "";
document.getElementById('resp2').value = "";
document.getElementById('resp3').value = "";
document.getElementById('resp4').value = "";
document.getElementById('cat').selectedIndex = 0;
 document.getElementById('op').selectedIndex = 0;

}   );

$("#formInserir").submit( function() {
return false;
});

function clearInput() {
$("#formInserir :input").each( function() {
$(this).val('');
});
}
function edit(num)
{
//alert(num);
var newURL = window.location.protocol + "//" + window.location.host + "/tcc/editarPergunta.php?id="+ num;

window.open(newURL, '_blank');

//alert( newURL);
}

</script>
