<?php
        require 'config.php';
        require 'connection.php';
        require 'database.php';
       session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8"/>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport">
	<title>[TCC] TABULEIRO</title>

	<link rel="stylesheet" href="css/bootstrap.min.css" >
	<link rel="stylesheet" href="css/glyphicons.css" >
  <link href="css/bootstrap.min.css" rel="stylesheet">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.1.1.min.js"/>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>

 <script src="script/myscript.js" ></script>
 <script src="script/jsonResults.js" ></script>
</head>

<body onload="carregaRanking('<?php echo $_GET['token_partida'];?>')">
  <table class="table  table-bordered table-striped">
      <thead>
      </thead>
      <tbody>
        <tr class="hover">
          <?php
         $token_partida = $_GET["token_partida"];
					$sql = 'select nm_equipe, pontos, pos_tabuleiro from equipe where token_partida = "'.$token_partida.'" order by cd_equipe desc';


			       $result = DBExecute($sql);
			        if(!mysqli_num_rows($result))
			        return false;
			        else
			         while ($res = mysqli_fetch_assoc($result))
			        {
			            $data[] = $res;
			        }

//echo var_dump($data[0]);
$pos = array(0,0,0,0,0);

$i=0;
foreach ($data as $value) {
    $pos[$i] = $value['pos_tabuleiro'];
		$i++;
}
					$num =1;
					for ($y=0; $y < 10; $y++) {
						for ($i=0; $i < 5 ; $i++) {
							 $foi = 0;
							 echo '<td>'.$num;
							 $pinos = "";
							if ($num == $pos[0]) {
							echo ' <img src="images/1.png" height="20" width="20"> ';
								$foi = 1;
							}
							if ($num == $pos[1]) {
									echo  ' <img src="images/2.png" height="20" width="20"> ';
							  	$foi = 1;
							}
							if ($num == $pos[2]) {
									echo ' <img src="images/3.png" height="20" width="20"> ';
								 $foi = 1;
							}
							if ($num == $pos[3]) {
									echo ' <img src="images/4.png" height="20" width="20"> ';
							  	$foi = 1;
							}
							if ($foi == 0) {
							echo	'</td>';
							}
							$num = $num+1;
						}
							echo "<tr></tr>";
					}
       ?>
        </tr>
        <table id="minhaTabela" class="table table-hover" style="width: 100%;">
          <thead>
            <th>Posição</th>
                      <th>Equipe</th>
                      <th>Lider</th>
                      <th>Pontos</th>
          </thead>
          <tbody>
          </tbody>
        </table>
        </section>
             </div>

        </div>

</body>
</html>


<script>

function carregaRanking(token_partida){
	//variáveis
	var itens = "";
    var url = window.location.protocol + "//" + window.location.host+'/api/partida/getRanking?token='+token_partida;
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
       //     alert(retorno);
		    if(retorno.success){
			    $("h2").html(retorno.message);
		    }
		    else{
                retorno = retorno.data;
			    //Laço para criar linhas da tabela
          var img ="";
			    for(var i = 0; i<retorno.length; i++){
				    itens += "<tr style=\"text-align:left\">";
            if (i==0) {
               img = " <img src=\"images/1.png\" height=\"20\" width=\"20\"> ";
            }
            else if (i==1) {
              img = " <img src=\"images/2.png\" height=\"20\" width=\"20\"> ";
            }
            else if (i==2) {
              img = " <img src=\"images/3.png\" height=\"20\" width=\"20\"> ";
            }
            else if (i==3) {
              img = " <img src=\"images/4.png\" height=\"20\" width=\"20\"> ";

            }

						  itens += "<td> "  + retorno[i].pos_tabuleiro +img+" </td>";
                    itens += "<td>"+ retorno[i].nm_equipe + "</td>";
										itens += "<td>"+retorno[i].Lider+"</td>";
                    itens += "<td>"+retorno[i].pontos+"</td>";
					  itens += "</tr>";
			    }
			    //Preencher a Tabela
			    $("#minhaTabela tbody").html(itens);

			    //Limpar Status de Carregando
			   // $("h2").html("Carregado");
		    }
	    }
    });
}
 </script>
