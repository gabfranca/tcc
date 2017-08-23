<?php
        require 'config.php';
        require 'connection.php';
        require 'database.php'; 
       session_start();  
      ValidaSessao();


?>
<html>

<head>
	<!-- Material Design Lite -->
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700" type="text/css">
	<link href='http://fonts.googleapis.com/css?family=Roboto:400,300,300italic,500,400italic,700,700italic' rel='stylesheet' type='text/css'>

	  <script src="https://code.getmdl.io/1.3.0/material.min.js"></script>
	<link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
	<!-- Material Design icon font -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>


<body>
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
        <header class="mdl-layout__header" style="background-color:#102027">
            <div class="mdl-layout__header-row">
                <!-- Title -->
              	<span class="mdl-layout-title">Business Game - Professor <i class="material-icons">school</i></span>
                <!-- Add spacer, to align navigation to the right -->
                <div class="mdl-layout-spacer"></div>
                <!-- Navigation. We hide it in small screens. -->
                <nav class="mdl-navigation mdl-layout--large-screen-only">
                    <a class="mdl-navigation__link" href="">Link</a>
                    <a class="mdl-navigation__link" href="">Link</a>
                    <a class="mdl-navigation__link" href="">Link</a>
                    <a class="mdl-navigation__link" href="">Link</a>
                </nav>
            </div>
        </header>
        <div class="mdl-layout__drawer">
            <div style="width:100%; height:25%; background-color:#62727b;background-image:url('images/back.png');">
                <div id="prof-pic" style="width:50%; height:70%; margin-left:10%; margin-top:10%;  ">
                    <img src="images/professor.png" style="width:100%; height:100%">

                </div>
            </div>
						<span class="mdl-layout-title">Professor <i class="material-icons">school</i></span>
						<nav class="mdl-navigation">
							<a class="mdl-navigation__link" href="NovaPartida.html"><i class="material-icons">create_new_folder</i> Nova Partida</a>
											<a class="mdl-navigation__link" href="Tabuleiro.html"><i class="material-icons">view_quilt</i> Tabuleiro</a>
							<a class="mdl-navigation__link" href="Perguntas.html"><i class="material-icons">question_answer</i> Perguntas   </a>
			                <a class="mdl-navigation__link" href="Equipes.html"><i class="material-icons">recent_actors</i> Equipes</a>
							<a class="mdl-navigation__link" href=""><i class="material-icons">settings</i> Configurações</a>
											<a class="mdl-navigation__link" href="#"><i class="material-icons">keyboard_backspace</i> Encerrar</a>
						</nav>
        </div>
 
            <div >
                <!-- Your content goes here -->
                <form id="formInserir" action="actions/InserirPergunta.php" method="post"    style="float:left;" > 
                    <p class="mdl-typography--headline">Nova Pergunta  <i class="material-icons">description</i></p> 
                    <label>Categoria:</label>
                    <?php
                  
                             $retorno = DBRead("categorias"); 
                            echo '<select id="cat" name="categoria">';
                              foreach ($retorno as $key ) {
                             echo '<option value="'.$key['cdCategoria'].'">'.$key['nmCategoria'].'</option>';
                                 }
                             echo '</select>'; 
                  ?>

            <label for="op">Opção Correta:</label>
                 <select name="op" id="op" >
                     <option value="1">A</option>
                  <option value="2">B</option>
                  <option value="3">C</option>
                    <option value="4">D</option>
                </select>
</br>
            <div class="mdl-textfield mdl-js-textfield"  width="50px" >
                 <textarea id="pergunta" name="pergunta" class="mdl-textfield__input" type="text" rows= "2" id="sample5" required="required" ></textarea>
                 <label class="mdl-textfield__label" for="sample5">Enunciado da questão...</label>
            </div>
 </br>   
 
             <div class="mdl-textfield mdl-js-textfield" >
                 <textarea id="resp1" name="resposta1" class="mdl-textfield__input" type="text" rows= "1" id="sample5" required="required" ></textarea>
                 <label class="mdl-textfield__label" for="sample5">Questão A...</label>
            </div>
             <div class="mdl-textfield mdl-js-textfield" >
                 <textarea id="resp2" name="resposta2" class="mdl-textfield__input" type="text" rows= "1" id="sample5" required="required" ></textarea>
                 <label class="mdl-textfield__label" for="sample5">Questão B...</label>
            </div>
             <div class="mdl-textfield mdl-js-textfield" >
                 <textarea id="resp3" name="resposta3" class="mdl-textfield__input" type="text" rows= "1" id="sample5" required="required" ></textarea>
                 <label class="mdl-textfield__label" for="sample5">Questão C...</label>
            </div>
             <div class="mdl-textfield mdl-js-textfield" >
                 <textarea id="resp4" name="resposta4" class="mdl-textfield__input" type="text" rows= "1" id="sample5" required="required" ></textarea>
                 <label class="mdl-textfield__label" for="sample5">Questão D...</label>
            </div>
             </br>

                       </br>
                    <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect">
                        CANCELAR
                    </button>

                    <button id="sub"  class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">Save</button>
                 
                    </input>
                    
        
                </form>
   <span id="result"></span>
         
   <div id="divTable">    
         <table  class="mdl-data-table mdl-js-data-table  mdl-shadow--2dp" >
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
            <td><button onClick=\"edit(".$rows[0].")\" class=\"mdl-button mdl-js-button mdl-button--raised mdl-button--colored\">Editar</button></td>

          
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

<style>
    #divTable{

 width:50%;   
 height:580px;
 overflow:auto; 
     margin-top: 15px;
 
     padding-left: 15px;
 
}
    form {
        width: 23%;
        margin: 1em auto;
        padding: 3em 2em 2em 2em;
        background: #fafafa;
        border: 1px solid #ebebeb;
        box-shadow: rgba(0,0,0,0.14902) 0px 1px 1px 0px,rgba(0,0,0,0.09804) 0px 1px 2px 0px;
        margin-left:20%;
    }
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
