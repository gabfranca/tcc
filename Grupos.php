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
 <script src="script/jsonResults.js" ></script>
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

<body onload="carregaMeusGrupos(<?php  echo $_SESSION["cdusuario"] ?>)">
    
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
            <a href="#" onclick="redirect('Perguntas');" class="list-group-item active ">Perguntas</a>
          <div class="sub-items" style="padding-left:10px;">
                        <a href="#" onclick="redirect('PerguntasDesafio');" class="list-group-item ">Desafio</a>
                        <a href="#" onclick="redirect('PerguntasMateria');" class="list-group-item ">Materia</a>
            </div>
            <a href="#" class="list-group-item">Configurações</a>
            <a href="#" onclick="redirect('actions/EncerrarSessao');" class="list-group-item">Encerar</a>
          </div>
        </div><!--/span-->
      </div><!--/row-->
   
      <div class="col-sm-9 col-lg-10" style="padding-left: 5%;" >
            <div class="container"  >
   
                <!-- Your content goes here -->
                <section>
			<h3>Meus Grupos de Perguntas</h3>
			<!--Área que mostrará carregando-->
			<h2></h2>
			<!--Tabela-->
			<table id="minhaTabela" class="table table-hover" style="width: 40%;">
				<thead>
					<th>ID</th>
					<th>Grupo</th>
                    <th>Ver</th>
				</thead>
				<tbody>
				</tbody>
			</table>
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
