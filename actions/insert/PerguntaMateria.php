<?php 
        require '../../config.php';
        require '../../connection.php';
        require '../../database.php'; 
        session_start();
        $CD_USER=    $_SESSION['cdusuario'];
        $link =  DBConnect(); 
            $questao1 = $_POST['questao1'];
            $questao2 = $_POST['questao2'];
            $questao3 = $_POST['questao3']; 
            $resposta = $_POST['resposta']; 
            $cat = $_POST['categoria']; 

            $user = $_SESSION["cdusuario"];
            $sql = "insert into perguntaMateria values (null, '$questao1','$questao2', '$questao3', '$resposta',$cat, $user);";
              
//echo $sql;
              	if(DBExecute($sql))
		  echo "Pergunta salva com sucesso!";
		else
		  echo "Ocorreu um erro ao salvar!";


?>