  <?php 
        require '../../config.php';
        require '../../connection.php';
        require '../../database.php'; 
        session_start();

        $link =  DBConnect(); 
            $cdPergunta = $_POST['cdPergunta'];
            $categoria = $_POST['categoria'];
            $opcao_correta = $_POST['op'];
            $pergunta = $_POST['pergunta'];
            $resposta1 = $_POST['resp1'];
            $resposta2 = $_POST['resp2'];
            $resposta3 = $_POST['resp3'];
            $resposta4 = $_POST['resp4']; 

      //  $user = $_SESSION["cdusuario"];
            $query = "  update pergunta 
                        SET dsPergunta ='$pergunta', 
                        cdCategoria =$categoria,
                        dsResposta1 = '$resposta1', 
                        dsResposta2 = '$resposta2',
                        dsResposta3 = '$resposta3',
                        dsResposta4 = '$resposta4',
                        correta = $opcao_correta
                        WHERE cdPergunta =  $cdPergunta ";
echo $query;
              	if(DBExecute($query))
		  echo "Pergunta salva com sucesso!";
		else
		  echo "Ocorreu um erro ao salvar!";
?>