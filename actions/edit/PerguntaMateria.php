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
            $cd_pergunta = $_POST['cdPergunta'];
            $cat = $_POST['categoria']; 

            $user = $_SESSION["cdusuario"];

           $sql = "update perguntaMateria set cd_categoria= $cat, questao1 = '$questao1', questao2 = '$questao2' ,  questao3 = '$questao3',  somaresultado = $resposta,cd_categoria = $cat WHERE cd_pergunta = $cd_pergunta;";
            

              
echo $sql;
              	if(DBExecute($sql))
		  echo "Pergunta salva com sucesso!";
		else
		  echo "Ocorreu um erro ao salvar!";
?>