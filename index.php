<!DOCTYPE HTML> 
<html lang="pt_BR"> 
<head>
    <meta charset="UTF-8"> 
    <title>CONEXAO MYSQL</title>
</head>
<body>
    <?php 
        require 'config.php';
        require 'connection.php';
        require 'database.php'; 

        $link =  DBConnect(); 
       // DBClose($link);

       // $query = "INSERT INTO CATEGORIAS VALUES(NULL, 'TESTE INSERT');";
       // var_dump(DBExecute($query));

        $categorias = array(
            'cdCategoria' => 'null', 
            'nmCategoria' =>'OUTRO TESTE'
        ); 

       // $grava = DBCreate('categorias', $categorias);
      // if ($grava) 
     //       echo 'OK'; 
    //   else 
     //      'DEU ERRO PARÇA';
 
        $retorno = DBRead('categorias' );
        foreach ($retorno as $ret) {
            echo $ret['nmCategoria'].'</br>';
        }

        var_dump($retorno);
    ?>
    <form action="">
    </form>

</body>
</html>