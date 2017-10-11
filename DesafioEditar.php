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
    <script src="https://code.jquery.com/jquery-3.1.1.min.js">
        <script src="script//popper.min.js"></script>
        <script src="script/bootstrap.min.js"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="script/myscript.js" ></script>
    <script src="script/jsonResults.js" ></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/body.css" rel="stylesheet">
  </head>

  <body >

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

      <form id="formSalvar" action="actions/edit/PerguntaDesafio.php" method="post"  >
          <p class="h4">Editar Pergunta Desafio</p>
          <label>Categoria:</label>
          <?php
$id=  $_GET['id'];
// echo $id;
$result_data =  DBRead("pergunta", "where cdPergunta = {$id}");

foreach ($result_data as $key) {
$cdPergunta = $key["cdPergunta"];
$dsPergunta = $key["dsPergunta"];
$cdCategoria = $key["cdCategoria"];
$dsResposta1 = $key["dsResposta1"];
$dsResposta2 = $key["dsResposta2"];
$dsResposta3 = $key["dsResposta3"];
$dsResposta4 = $key["dsResposta4"];
$correta = $key["correta"];

}
 $retorno = DBRead("categorias");
                    echo '<select id="cat" class="form-control" name="categoria">';
                      foreach ($retorno as $key ) {
                     echo '<option value="'.$key['cdCategoria'].'" >'.$key['nmCategoria'].'</option>';
                         }
                     echo '</select>';
        ?>
  <label for="op">Opção Correta:</label>
  <select id="op" name="op">
  <option  value="1" <?php if($correta == '1'){echo("selected");}?>>A</option>
  <option  value="2" <?php if($correta == '2'){echo("selected");}?>>B</option>
  <option  value="3" <?php if($correta == '3'){echo("selected");}?>>C</option>
  <option  value="4" <?php if($correta == '4'){echo("selected");}?>>D</option>
  </select>
<?php echo  '<input type="text" id="cdPergunta" style="display:none;" name="cdPergunta" value="'.$id.'">';?>
  <div class="form-group"  width="50px" >
       <label class="mdl-textfield__label" for="sample5"><a class="h5">Enunciado da questão:</a></label>
       <textarea id="pergunta" name="pergunta" class="form-control" type="text" rows= "2" id="sample5" required="required" ><?php echo $dsPergunta ?></textarea>
  </div>
   <div class="input-group" >
     <span class="input-group-addon" id="sizing-addon2">
      <label ><a class="h5">A) </a></label>
     </span>
       <textarea id="resp1" name="resp1" class="form-control" type="text" rows= "1" id="sample5" required="required" ><?php echo $dsResposta1 ?></textarea>

  </div>
   <div class="input-group" style="padding-top:5px">
     <span class="input-group-addon" id="sizing-addon2">
      <label ><a class="h5">B) </a></label>
     </span>
       <textarea id="resp2" name="resp2" class="form-control" type="text" rows= "1" id="sample5" required="required" ><?php echo $dsResposta2 ?></textarea>

  </div>
   <div class="input-group" style="padding-top:5px" >
     <span class="input-group-addon" id="sizing-addon2">
      <label ><a class="h5">C) </a></label>
     </span>
       <textarea id="resp3" name="resp3" class="form-control" type="text" rows= "1" id="sample5" required="required" ><?php echo $dsResposta3 ?></textarea>
  </div>
   <div class="input-group" style="padding-top:5px" >
     <span class="input-group-addon" id="sizing-addon2">
      <label ><a class="h5">D) </a></label>
     </span>
       <textarea id="resp4" name="resp4" class="form-control" type="text" rows= "1" id="sample5" required="required" ><?php echo $dsResposta4 ?></textarea>

  </div>
</br>
  <button style="float:left" onMouseOver="this.style.cursor='pointer'" onclick="redirect('Desafio')" class="btn btn-default"><img src="images/back.png" width="25" height="25"/> Voltar</button>


  <button id="sub" style="float:right" class="btn btn-primary" ><img src="images/save.png" width="25px height="25px"/> Salvar</button>
      </br> </br>   <span id="result"></span>
</form>


 </div>

</div>
</div>
</div>
</div>
</body
</html>

<?php
echo '<script>
$(document).ready(function() {

var obj = document.getElementById(\'cat\');
// obj.seletedIndex =  $cdCategoria;

// alert(obj);
var teste ='.$cdCategoria.';
obj.selectedIndex = teste-1;
// alert(teste);
});
</script>'
?>

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

//    document.getElementById('result').text ="Preencha todos os campos!";
return;

}

$.post( $("#formSalvar").attr("action"),
$("#formSalvar :input").serializeArray(),
function(info){ $("#result").html(info);

});
//clearInput();
//location.reload();



}   );

$("#formSalvar").submit( function() {
return false;
});

function clearInput() {
$("#formSalvar :input").each( function() {
$(this).val('');
});
}



</script>
