 <!DOCTYPE html>
 <html>
 <head>
     <meta charset="UTF-8"/>
     <title>Document</title>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

 </head>
 <body>
    <form action="actions/edit/PerguntaDesafio.php" method="post" id="formSalvar">
    <?php
        require 'config.php';
        require 'connection.php';
        require 'database.php';
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
                            echo '<select id="cat" name="categoria">';
                              foreach ($retorno as $key ) {
                             echo '<option value="'.$key['cdCategoria'].'" >'.$key['nmCategoria'].'</option>';
                                 }
                             echo '</select>';


    ?>
    <select id="op" name="op">
         <option  value="1" <?php if($correta == '1'){echo("selected");}?>>A</option>
         <option  value="2" <?php if($correta == '2'){echo("selected");}?>>B</option>
         <option  value="3" <?php if($correta == '3'){echo("selected");}?>>C</option>
         <option  value="4" <?php if($correta == '4'){echo("selected");}?>>D</option>

    </select>

<?php
  $id=  $_GET['id'];
echo  '<input type="text" id="cdPergunta" name="cdPergunta" value="'.$id.'">';
echo   '<input type="text" id="pergunta" name="pergunta" value="'.$dsPergunta.'" >';
echo   '<input type="text" id="resp1" name="resp1" value="'.$dsResposta1.'" >';
echo   '<input type="text" id="resp2" name="resp2" value="'.$dsResposta2.'" >';
echo   '<input type="text" id="resp3" name="resp3" value="'.$dsResposta3.'" >';
echo   '<input type="text" id="resp4" name="resp4" value="'.$dsResposta4.'" >';
?>
<button id="sub" >Save</button>
</form>
<span id="result"></span>

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

 <script>
         $("#sub").click( function() {
             alert("entrou");
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

 $.post( $("#formSalvar").attr("action"),
         $("#formSalvar :input").serializeArray(),
         function(info){ $("#result").html(info);

   });
 //clearInput();
// location.reload();
}   );


$("#formSalvar").submit( function() {
  return false;
});

function teste()
{
    var a = "http://"+window.location.hostname;

    alert(a);
}
 </script>
