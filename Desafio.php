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

      <form id="formInserir" action="actions/InserirPergunta.php" method="post"     >
          <p class="h4">Nova Pergunta Desafio </p>
          <label>Categoria:</label>
          <?php
                   $retorno = DBRead("categorias");
                  echo '<select id="cat" name="categoria"  class="form-control">';
                    foreach ($retorno as $key ) {
                   echo '<option  value="'.$key['cdCategoria'].'">'.$key['nmCategoria'].'</option>';
                       }
                   echo '</select>';
        ?>

  <label for="op">Opção Correta:</label>
       <select name="op" id="op" class="form-contorl">
           <option value="1">A</option>
        <option value="2">B</option>
        <option value="3">C</option>
          <option value="4">D</option>
      </select>
</br>
  <div class="form-group"  width="50px" >
       <label class="mdl-textfield__label" for="sample5"><a class="h5">Enunciado da questão:</a></label>
       <textarea id="pergunta" name="pergunta" class="form-control" type="text" rows= "1" id="sample5" required="required" ></textarea>
  </div>
   <div class="input-group" >
     <span class="input-group-addon" id="sizing-addon2">
      <label ><a class="h5">A) </a></label>
     </span>
       <textarea id="resp1" name="resposta1" class="form-control" type="text" rows= "1" id="sample5" required="required" ></textarea>

  </div>
   <div class="input-group" style="padding-top:5px;" >
     <span class="input-group-addon" id="sizing-addon2">
      <label ><a class="h5">B) </a></label>
     </span>
       <textarea id="resp2" name="resposta2" class="form-control" type="text" rows= "1" id="sample5" required="required" ></textarea>
  </div>

   <div class="input-group" style="padding-top:5px;">
     <span class="input-group-addon" id="sizing-addon2">
      <label ><a class="h5">C) </a></label>
     </span>
        <textarea id="resp3" name="resposta3" class="form-control" type="text" rows= "1" id="sample5" required="required" ></textarea>
  </div>
   <div class="input-group" style="padding-top:5px" >
     <span class="input-group-addon" id="sizing-addon2">
      <label ><a class="h5">D) </a></label>
     </span>
       <textarea id="resp4" name="resposta4" class="form-control" type="text" rows= "1" id="sample5" required="required" ></textarea>

  </div>

</br>
          <button id="sub"  style="float:right" class="btn btn-primary"><img src="images/save.png" width="30px" height="30px"/> Salvar</button>


      </form>
<span id="result"></span>
</br>
</br>
<div id="divTable">
<table id="tbperguntas" class="table table-hover">
  <thead>
  <tr>
      <th>ID</td>
      <th>PERGUNTA</th>
      <th>EDITAR</td>
  </tr>
</thead>
<tbody>
<?php


$usuario= $_SESSION["cdusuario"];
$conn = DBConnect();
$SELECT = mysqli_query($conn,"select * from pergunta where add_por = '$usuario' order by  cdPergunta desc ");
if($SELECT != false)
{
while($rows = mysqli_fetch_array($SELECT))
{
echo "<div style=\"text-align:left\">
<tr>
  <td>".$rows[0]."</td>
  <td>".$rows[1]."</td>
  <td><button onClick=\"edit(".$rows[0].")\" class=\"btn\"> <img src=\"images/edit.png\" width=\"25px\" height=\"25px\"/> Editar</button></td>
</tr>
</div>
";
}
}
else
{
echo "
<tr>
<td colspan='3'>Something went wrong with the query</td>
</tr>
";
}
?>

</tbody>
</table>
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
function(info){ alert(info) ;

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
var newURL = window.location.protocol + "//" + window.location.host + "/tcc/DesafioEditar.php?id="+ num;

window.location = newURL;

//alert( newURL);
}

</script>
