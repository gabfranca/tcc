  <?php 
        require '../config.php';
        require '../connection.php';
        require '../database.php'; 
        session_start();

        $link =  DBConnect(); 
            $categoria = $_POST['categoria'];
            $opcao_correta = $_POST['op'];
            $pergunta = $_POST['pergunta'];
            $resposta1 = $_POST['resposta1'];
            $resposta2 = $_POST['resposta2'];
            $resposta3 = $_POST['resposta3'];
            $resposta4 = $_POST['resposta4']; 

        $user = $_SESSION["cdusuario"];
            $sql = "insert into pergunta values (null, '$pergunta',$categoria, '$resposta1', '$resposta2', '$resposta3', '$resposta4',$opcao_correta,1);";
              

              	if(DBExecute($sql))
		  echo "Pergunta salva com sucesso!";
		else
		  echo "Ocorreu um erro ao salvar!";

?>