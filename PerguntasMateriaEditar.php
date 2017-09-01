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

 
<script src="script/jquery-3.2.1.slim.min.js"></script>
<script src="script/popper.min.js" ></script>
<script src="script/myscript.js" ></script>
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
                        <a href="#" onclick="redirect('PerguntasDesafio');" class="list-group-item ">Desafio</a>
                        <a href="#" onclick="redirect('PerguntasMateria');" class="list-group-item active">Materia</a>
            </div>
            <a href="#" class="list-group-item">Configurações</a>
            <a href="#" onclick="redirect('actions/EncerrarSessao');" class="list-group-item">Encerar</a>
          </div>
        </div><!--/span-->
      </div><!--/row-->
   
   
    <div class="col-sm-9 col-lg-10">
            <div class="container"  >
                   <form id="formInserir" action="actions/edit/PerguntaMateria.php" method="post"    style="float:left;width: 40%;" > 
                      <p class="h4">Editar </p> 
            
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
                      <input type="button" class="btn btn-link" value="Voltar" onMouseOver="this.style.cursor='pointer'" onclick="redirect('PerguntasMateria.php')"/>

                     <button id="sub" style="float:right" class="btn btn-primary">Salvar</button>
</br>
                     <span id="result"></span>

                    </form>
  </div>
</div>

    
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


</script>
