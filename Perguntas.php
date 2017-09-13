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
            <a href="#" onclick="redirect('Grupos');" class="list-group-item active ">Perguntas</a>
          <div class="sub-items" style="padding-left:10px;">
                        <a href="#" onclick="redirect('PerguntasDesafio');" class="list-group-item ">Desafio</a>
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
                <form id="formInserir" action="actions/InserirPergunta.php" method="post"    style="float:left;width: 40%;" > 
                    <p class="mdl-typography--headline">Nova Pergunta  <i class="material-icons">description</i></p> 
                    <label>Categoria:</label>
                    <?php
                  
                             $retorno = DBRead("categorias"); 
                            echo '<select id="cat" name="categoria" class="form-control">';
                              foreach ($retorno as $key ) {
                             echo '<option value="'.$key['cdCategoria'].'">'.$key['nmCategoria'].'</option>';
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
                 <label class="mdl-textfield__label" for="sample5">Enunciado da questão...</label>
                 <textarea id="pergunta" name="pergunta" class="form-control" type="text" rows= "2" id="sample5" required="required" ></textarea>
            </div>
 </br>   
 



             <div class="form-group" >
                 <label  for="sample5">Questão A...</label>
                 <textarea id="resp1" name="resposta1" class="form-control" type="text" rows= "1" id="sample5" required="required" ></textarea>
             
            </div>
             <div class="form-group" >
                 <label  for="sample5">Questão B...</label>
                 <textarea id="resp2" name="resposta2" class="form-control" type="text" rows= "1" id="sample5" required="required" ></textarea>
                 
            </div>
             <div class="form-group" >
                 <label  for="sample5">Questão C...</label>
                 <textarea id="resp3" name="resposta3" class="form-control" type="text" rows= "1" id="sample5" required="required" ></textarea>
            </div>
             <div class="form-group" >
                 <label  for="sample5">Questão D...</label>
                 <textarea id="resp4" name="resposta4" class="form-control" type="text" rows= "1" id="sample5" required="required" ></textarea>
                 
            </div>
  
                    <button class="btn btn-default">
                        CANCELAR
                    </button>

                    <button id="sub"  class="btn btn-primary">Save</button>

            
                </form>
   <span id="result"></span>
         
   <div id="divTable" style=" width: 60%;
    height: 90%;
    overflow: scroll; padding-left:3%;">    
         <table  class="table table-hover">
            <thead>
            <tr>
                <th  style="display:none">cdPergunta</td>
                <th>PERGUNTA</th>
                <th>A</th>
                <th>B</th>
                <th>C</th>
                <th>D</th>
                <th>CORRETA</td>
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
            <td style=\"display:none\">".$rows[0]."</td>
            <td>".$rows[1]."</td>
             <td>".$rows[3]."</td>
            <td>".$rows[4]."</td>
            <td>".$rows[5]."</td>
            <td>".$rows[6]."</td>
            <td>".$rows[7]."</td>
            <td><button onClick=\"edit(".$rows[0].")\" class=\"btn\">Editar</button></td>

          
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
