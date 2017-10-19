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
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>

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
      <form id="formInserir" action="actions/insert/PerguntaMateria.php" method="post" style=" width:90%;"   >
         <p class="h3">Nova Pergunta Materia </p></br>
         <label for="grupo">Grupo:</label>
         <?php
                 $retorno = DBRead("grupo");
                echo '<select id="grupo" name="grupo"  style="width:100%; float:left" class="form-control">';
                  foreach ($retorno as $key ) {
                 echo '<option value="'.$key['cdGrupo'].'">'.$key['nm_grupo'].'</option>';
                     }
                 echo '</select>';
      ?></br>
      <label for="cat">Categoria:</label>
       <?php
                $retorno = DBRead("categorias");
               echo '<select id="cat" name="categoria" class="form-control">';
                 foreach ($retorno as $key ) {
                echo '<option value="'.$key['cdCategoria'].'">'.$key['nmCategoria'].'</option>';
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
          <textarea class="form-control" name="questao1" id="questao1" cols="30" rows="1"></textarea>
       </div>
       </br>

       <div class="input-group">
          <span class="input-group-addon" id="sizing-addon2">
          <div class="checkbox"  >
           <label onMouseOver="this.style.cursor='pointer'"><input type="checkbox"  onMouseOver="this.style.cursor='pointer'"   onClick="calcula(this)" id="ck2" value="2"><a class="h5">(2)</a></label>
         </div>
          </span>
          <textarea class="form-control" name="questao2" id="questao2" cols="30" rows="1"></textarea>
       </div>
       </br>

        <div class="input-group">
          <span class="input-group-addon" id="sizing-addon2">
          <div class="checkbox">
           <label  onMouseOver="this.style.cursor='pointer'"><input type="checkbox"  onMouseOver="this.style.cursor='pointer'" onClick="calcula(this)" id="ck3" value="4"><a class="h5">(4)</a></label>
         </div>
          </span>
          <textarea class="form-control" name="questao3" id="questao3" cols="30" rows="1"></textarea>
       </div>

       </br>
        <div class="input-group">
          <span class="input-group-addon" id="sizing-addon2">Resposta</span>
          <input type="text" value="0" name="resposta" readonly class="form-control" id="resposta" aria-describedby="sizing-addon2">
       </div>
         </br>
        <button id="sub" style="float:right" class="btn btn-primary"><img src="images/save.png" width="25px" height="25px"/> Salvar</button>
      </br>
        <span id="result"></span>
  </br>
       </form>
       <div id="divTable" style=" width:90%;">
      <table  class="table table-hover">
      <thead>
      <tr>
      <th >ID</td>
      <th>Questões</th>
      <th>Resposta</th>
      <th>EDITAR</td>
      </tr>
      </thead>
      <tbody>

      </div>
      </div>
      <?php

      $usuario= $_SESSION["cdusuario"];
      $conn = DBConnect();
      $SELECT = mysqli_query($conn,"select * from perguntaMateria where add_por = '$usuario' order by  cd_Pergunta desc ");
      if($SELECT != false)
      {
      while($rows = mysqli_fetch_array($SELECT))
      {
      echo "<div>
      <tr>
      <td >".$rows[0]."</td>
      <td>
      <div class=\"pergunta\"><a class=\"h6\">(A)</a> ".$rows[1]."</div><hr>
      <div class=\"pergunta\"><a class=\"h6\">(B)</a> ".$rows[2]."</div><hr>
      <div class=\"pergunta\"><a class=\"h6\">(C)</a> ".$rows[3]."</div><hr>

      </td>
      <td >".$rows[4]."</td>
      <td><button onClick=\"edit(".$rows[0].")\" class=\"btn\"><img src=\"images/edit.png\" width=\"25px\" height=\"25px\"/>  Editar</button>
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


      </body>

      </html>

      <script >
      $("#sub").click( function() {
      if (
      document.getElementById('questao1').value == ""
      || document.getElementById('questao2').value == ""
      || document.getElementById('questao3').value == ""
      || document.getElementById('resposta').value == ""
      ) {
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

      document.getElementById('cat').selectedIndex = 0;
      document.getElementById('resposta').value = 0;


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
      var newURL = window.location.protocol + "//" + window.location.host + "/tcc/MateriaEditar.php?id="+ num;

      window.location= newURL;

      //alert( newURL);
      }

      function redirect(param)
      {
      // alert('teste');

      var url = getCurrentPath();
      var newURL = url +"/tcc/" +param;
      // alert(newURL);
    //  window.location = newURL;
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
      </script>
