<?php
        require 'config.php';
        require 'connection.php';
        require 'database.php';
       session_start();



?>
<html>

<head>
<link rel="stylesheet" href="css/bootstrap.min.css" >
<link rel="stylesheet" href="css/glyphicons.css" >

 <script src="script/myscript.js" ></script>
<script src="script/jquery-3.2.1.slim.min.js"></script>
<script src="script/popper.min.js" ></script>
<script src="script/bootstrap.min.js" ></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<style>
.container{


}
#sidebar{
 margin-top:5%;
}
 </style>

<body>

  <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top " style="">
     <a class="navbar-brand" href="#">
    <img src="images/logoTCC.png" width="30" height="30" class="d-inline-block align-top" alt="">
    Business Game  <?php $_SESSION["nomeUser"] ?>
  </a>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" href="#">Disabled</a>
          </li>
        </ul>
      </div>
    </nav>

<div id="sidebar" class="container-fluid">
  <div class="row">
      <div class="col-sm-3 col-lg-2">
          <div class="col-6 col-md-3 sidebar-offcanvas" id="sidebar">
          <div class="list-group" style="width: 260px; position: fixed;">
            <a href="#" onclick="redirect('HomeProfessor');" class="list-group-item ">Início</a>
            <a href="#" onclick="redirect('Perguntas');" class="list-group-item ">Perguntas</a>
          <div class="sub-items" style="padding-left:10px;">
                        <a href="#" onclick="redirect('PerguntasDesafio');" class="list-group-item active">Desafio</a>
                        <a href="#" onclick="redirect('PerguntasMateria');" class="list-group-item ">Materia</a>
            </div>
            <a href="#" class="list-group-item">Configurações</a>
            <a href="#" onclick="redirect('actions/EncerrarSessao');" class="list-group-item">Encerar</a>
          </div>
        </div><!--/span-->
      </div><!--/row-->


    <div class="col-sm-9 col-lg-10">



            <div class="container"  >
                <!-- Your content goes here -->
                <form id="formSalvar" action="actions/edit/PerguntaDesafio.php" method="post"  style="float:left;width: 40%;" >
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
                 <label class="mdl-textfield__label" for="sample5">Enunciado da questão...</label>
                 <textarea id="pergunta" name="pergunta" class="form-control" type="text" rows= "2" id="sample5" required="required" ><?php echo $dsPergunta ?></textarea>
            </div>
             <div class="form-group" >
                 <label  for="sample5">Questão A...</label>
                 <textarea id="resp1" name="resp1" class="form-control" type="text" rows= "1" id="sample5" required="required" ><?php echo $dsResposta1 ?></textarea>

            </div>
             <div class="form-group" >
                 <label  for="sample5">Questão B...</label>
                 <textarea id="resp2" name="resp2" class="form-control" type="text" rows= "1" id="sample5" required="required" ><?php echo $dsResposta2 ?></textarea>

            </div>
             <div class="form-group" >
                 <label  for="sample5">Questão C...</label>
                 <textarea id="resp3" name="resp3" class="form-control" type="text" rows= "1" id="sample5" required="required" ><?php echo $dsResposta3 ?></textarea>
            </div>
             <div class="form-group" >
                 <label  for="sample5">Questão D...</label>
                 <textarea id="resp4" name="resp4" class="form-control" type="text" rows= "1" id="sample5" required="required" ><?php echo $dsResposta4 ?></textarea>

            </div>
            <input type="button" class="btn btn-link" value="Voltar" onMouseOver="this.style.cursor='pointer'" onclick="redirect('PerguntasDesafio.php')"/>
            <button id="sub" style="float:right" class="btn btn-primary" >Salvar</button>
                    <span id="result"></span>
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
      alert('entrou');
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
