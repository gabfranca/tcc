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
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"/>
        <script src="script//popper.min.js"></script>
        <script src="script/bootstrap.min.js"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="script/myscript.js" ></script>
    <script src="script/jsonResults.js" ></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Custom styles for this template -->

        <link href="css/body.css" rel="stylesheet">
  </head>

  <body onload="loadGrupos('<?php echo $_GET['id']; ?>')" >

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
      <form id="formInserir" action="actions/edit/PerguntaMateria.php" method="post"    >
         <p class="h3">Editar </p>

         <?php
$id=  $_GET['id'];
// echo $id;
$result_data =  DBRead("perguntaMateria", "where cd_Pergunta = {$id}");

foreach ($result_data as $key) {
$cdPergunta = $key["cd_pergunta"];
$questao1 = $key["questao1"];
$questao2 = $key["questao2"];
$questao3 = $key["questao3"];
$resposta = $key["somaresultado"];
$cdCategoria = $key["cd_categoria"];

}

echo  '<input type="text" style="display:none" id="cdPergunta" name="cdPergunta" value="'.$id.'">';
echo '<label>Categoria:</label>';
$retorno = DBRead("categorias");
               echo '<select id="cat" class="form-control" name="categoria">';
                 foreach ($retorno as $key ) {
                echo '<option value="'.$key['cdCategoria'].'" >'.$key['nmCategoria'].'</option>';
                    }
                echo '</select>';


?>

</br>
         <div class="input-group">
          <span class="input-group-addon" id="sizing-addon2">
          <div class="checkbox">
           <label  onMouseOver="this.style.cursor='pointer'" ><input type="checkbox"   onMouseOver="this.style.cursor='pointer'" onClick="calcula(this)" id="ck1" value="1"><a class="h5">(1)</a><label>
         </div>
          </span>
          <textarea class="form-control" name="questao1" id="questao1" cols="30" rows="1"><?php echo $questao1?></textarea>
       </div>
       </br>

       <div class="input-group">
          <span class="input-group-addon" id="sizing-addon2">
          <div class="checkbox"  >
           <label onMouseOver="this.style.cursor='pointer'"><input type="checkbox"  onMouseOver="this.style.cursor='pointer'"   onClick="calcula(this)" id="ck2" value="2"><a class="h5">(2)</a></label>
         </div>
          </span>
          <textarea class="form-control" name="questao2" id="questao2" cols="30" rows="1"><?php echo $questao2?></textarea>
       </div>
       </br>

        <div class="input-group">
          <span class="input-group-addon" id="sizing-addon2">
          <div class="checkbox">
           <label  onMouseOver="this.style.cursor='pointer'"><input type="checkbox"  onMouseOver="this.style.cursor='pointer'" onClick="calcula(this)" id="ck3" value="4"><a class="h5">(4)</a></label>
         </div>
          </span>
          <textarea class="form-control" name="questao3" id="questao3" cols="30" rows="1"><?php echo $questao3?></textarea>
       </div>

       </br>
        <div class="input-group">
          <span class="input-group-addon" id="sizing-addon2">Resposta</span>
          <input type="text" value="<?php echo $resposta?>" name="resposta" readonly class="form-control" id="resposta" aria-describedby="sizing-addon2">
       </div>
         </br>
         <button  class="btn btn-default" value="Voltar" onMouseOver="this.style.cursor='pointer'" onclick="redirect('Materia')"/><img src="images/back.png" width="25" height="25"/> Voltar</button>


        <button id="sub" style="float:right" class="btn btn-primary"><img src="images/save.png" width="25px" height="25px"/> Salvar</button>
</br></br>
        <span id="result"></span>

       </form>


</br>
</br>
<div id="divtable">
        <?php
                $retorno = DBRead("grupo");
               echo '<select id="grupo" name="grupos"  style="width:65%; float:left" class="form-control">';
                 foreach ($retorno as $key ) {
                echo '<option value="'.$key['cdGrupo'].'">'.$key['nm_grupo'].'</option>';
                    }
                echo '</select>';
     ?>
      <button  class="btn btn-default" onClick="getGrupoId(<?php echo $cdPergunta ?>)" style="margin-left:2%" ><img src="images/add.png" width="25px" height="25x"/> Add</button>
   </br>
   <a class="h4">Pertence aos Grupos:</a>

      <table class="table table-hover" id="minhaTabela"  style="width:80%;;">
   <thead>
<tr>
   <th >ID</td>
   <th>Grupo</th>
   <th>Remover</th>
   </tr>
</thead>
<tbody>
</tbody>
   </table>
   </div




</body>

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
document.getElementById('questao1').value == ""
|| document.getElementById('questao2').value == ""
|| document.getElementById('questao3').value == ""
|| document.getElementById('resposta').value == ""
) {
alert(document.getElementById('questao1').value);
alert("Preencha todos os campos!");

//  document.getElementById('result').text ="Preencha todos os campos!";
return;

}



$.post( $("#formInserir").attr("action"),
$("#formInserir :input").serializeArray(),
function(info){ $("#result").html(info);

});
//clearInput();
//location.reload();

//  document.getElementById('cat').selectedIndex = 0;
//  document.getElementById('resposta').value = 0;


}   );

$("#formInserir").submit( function() {
return false;
});

function clearInput() {
$("#formInserir :input").each( function() {
$(this).val('');

});

var ck1 = document.getElementById('ck1');
var ck2 = document.getElementById('ck2');
var ck3 = document.getElementById('ck3');
ck1.checked =false;
ck2.checked =false;
ck3.checked =false;

}
function edit(num)
{
//alert(num);
var newURL = window.location.protocol + "//" + window.location.host + "/tcc/PerguntasMateriaEditar.php?id="+ num;

window.location(newURL);

//alert( newURL);
}

function redirect(param)
{
// alert('teste');

var url = getCurrentPath();
var newURL = url +"/tcc/" +param;
// alert(newURL);
window.location = newURL;
}

function calcula(checkbox)
{
// alert(soma);
var soma = document.getElementById('resposta').value;
var s = soma;
parseInt(soma);
//alert(soma);
if (checkbox.checked) {
soma= parseInt(s) + parseInt(checkbox.value);
} else {
soma= parseInt(s) - parseInt(checkbox.value);
}

//var resp = document.getElementByID('resposta');
//alert(soma);
$("#resposta").val(soma);


//alert(soma);
}
$(document).ready(function(e) {

var resposta = document.getElementById('resposta').value;

var ck1 = document.getElementById('ck1');
var ck2 = document.getElementById('ck2');
var ck3 = document.getElementById('ck3');
//alert(resposta);

if(resposta ==1 || resposta == 3 || resposta == 5)
{
ck1.checked = true;
}
if(resposta ==2 || resposta == 3 || resposta == 6)
{
ck2.checked = true;
}
if(resposta ==4 || resposta == 5 || resposta == 6)
{
ck3.checked = true;
}
if(resposta ==7 )
{
ck1.checked = true;
ck2.checked = true;
ck3.checked = true;
}


});

function getGrupoId(pergunta)
{
// alert(pergunta);
//alert( $("#grupo").val());
var check = confirm("Tem certeza que deseja adicionar este grupo?");
if (check == true) {
var grupo = $("#grupo").val();
AddPerguntaGrupo(grupo,pergunta);
}
else {
return false;
}


}

function AddPerguntaGrupo(cdgrupo, cdpergunta){
//variáveis
var itens = "";
var url = window.location.protocol + "//" + window.location.host+'/api/perguntasgrupo/add?cdgrupo='+cdgrupo+'&cdpergunta='+cdpergunta;
// alert(url);
//Capturar Dados Usando Método AJAX do jQuery
$.ajax({
url: url,
cache: false,
dataType: "json",
beforeSend: function() {
// $("h2").html("Carregando..."); //Carregando
},
error: function (error) {
//  alert(JSON.stringify(error));
$("h2").html(error);
},
success: function(retorno) {
alert(retorno.message);
if(retorno.success){
   $("h2").html(retorno.message);

}
else{
 // alert( retorno.message);
  location.reload();
//       retorno = retorno.data;
//Laço para criar linhas da tabela
//    for(var i = 0; i<retorno.length; i++){
//	    itens += "<tr>";
//		    itens += "<td>" + retorno[i].cdGrupo + "</td>";
//           itens += "<td>" + retorno[i].nm_grupo + "</td>";
//           itens += "<td> <button type=\"button\" onMouseOver=\"this.style.cursor='pointer'\" onclick=\"redirect('EditarGrupos?id="+retorno[i].cdGrupo+"')\" class=\"btn btn-link\">Visualizar</button></td>";
//		    itens += "</tr>";
//	    }
//Preencher a Tabela
//  $("#minhaTabela tbody").html(itens);
}
}
});
}


function loadGrupos(id){
//variáveis
var itens = "";
var url = window.location.protocol + "//" + window.location.host+'/api/perguntasgrupo/getbypergunta?id='+id;
//alert(url);
//Capturar Dados Usando Método AJAX do jQuery
$.ajax({
url: url,
cache: false,
dataType: "json",
beforeSend: function() {
// $("h2").html("Carregando..."); //Carregando
},
error: function (error) {
//  alert(JSON.stringify(error));
$("h2").html(error);
},
success: function(retorno) {
//alert(retorno.message);
if(retorno.success){
$("h2").html(retorno.message);
}
else{
   retorno = retorno.data;
//Laço para criar linhas da tabela
for(var i = 0; i<retorno.length; i++){
// alert(retorno[i].cdGrupo);
itens += "<tr>";
//itens += "<td>" + retorno[i].cd_perguntagrupo + "</td>";
itens += "<td>" + retorno[i].cdGrupo + "</td>";
       itens += "<td>" + retorno[i].nm_grupo + "</td>";
       itens += "<td> <button type=\"button\" onMouseOver=\"this.style.cursor='pointer'\" onclick=\"RemoveGrupo('"+retorno[i].cd_perguntagrupo +"')\" class=\"btn btn-danger\"><img src=\"images/remove.png\" width=\"20px\" height=\"20x\"/></button></td>";
itens += "</tr>";
}
// alert(itens);
//Preencher a Tabela
$("#minhaTabela tbody").html(itens);
//location.reload();

//Limpar Status de Carregando
// $("h2").html("Carregado");
}
}
});
}
function redirectAPI(param)
{
// alert('teste');

var url = getCurrentPath();
var newURL = url +"/api/" +param;
// alert(newURL);
window.location = newURL;
}

function RemoveGrupo(id){


var check = confirm("Tem certeza que deseja remover esta pergunta deste grupo?");
if (check == true) {
var itens = "";
var url = window.location.protocol + "//" + window.location.host+'/api/perguntasgrupo/remove?id='+id;
//alert(url);
//Capturar Dados Usando Método AJAX do jQuery
$.ajax({
url: url,
cache: false,
dataType: "json",
beforeSend: function() {
// $("h2").html("Carregando..."); //Carregando
},
error: function (error) {
//  alert(JSON.stringify(error));
$("h2").html(error);
},
success: function(retorno) {
//alert(retorno.message);
if(retorno.success){
$("h2").html(retorno.message);
}
else{
 alert(retorno = retorno.message);
 location.reload();
//Preencher a Tabela
// $("#minhaTabela tbody").html(itens);
//location.reload();

//Limpar Status de Carregando
// $("h2").html("Carregado");
}
}
});
}
else {
return false;
}




}

</script>
