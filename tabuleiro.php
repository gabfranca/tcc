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
	<link href="css/seu-stylesheet.css" rel="stylesheet"/>
	<script src="scripts/seu-script.js"></script>

	<link rel="stylesheet" href="css/bootstrap.min.css" >
	<link rel="stylesheet" href="css/glyphicons.css" >

	 <script src="script/myscript.js" ></script>
	 <script src="script/jsonResults.js" ></script>
	<script src="script/jquery-3.2.1.slim.min.js"></script>
	<script src="script/popper.min.js" ></script>
	<script src="script/bootstrap.min.js" ></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<body>
  <table class="table  table-bordered table-striped">
      <thead>
      </thead>
      <tbody>
        <tr class="hover">
          <?php
         $token_partida = $_GET["token_partida"];
					$sql = 'select nm_equipe, pontos, pos_tabuleiro from equipe where token_partida = "'.$token_partida.'"';


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

//echo var_dump($pos);




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
</body>
</html>
