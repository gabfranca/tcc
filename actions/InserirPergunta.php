  <?php 
        require '../config.php';
        require '../connection.php';
        require '../database.php'; 
        session_start();
     $CD_USER=    $_SESSION['cdusuario'];
        $link =  DBConnect(); 
            $categoria = $_POST['categoria'];
            $opcao_correta = $_POST['op'];
            $pergunta = $_POST['pergunta'];
            $resposta1 = $_POST['resposta1'];
            $resposta2 = $_POST['resposta2'];
            $resposta3 = $_POST['resposta3'];
            $resposta4 = $_POST['resposta4']; 

 $query = "  select count(cdPergunta) as rowcount from pergunta "; 
    $result = DataReader($query);
    $rowcouunt =  $result[0]['rowcount'];

  //  echo $rowcouunt; 
    if($rowcouunt<=100)
{
        $user = $_SESSION["cdusuario"];
            $sql = "insert into pergunta values (null, '$pergunta',$categoria, '$resposta1', '$resposta2', '$resposta3', '$resposta4',$opcao_correta,$CD_USER);";
              

              	if(DBExecute($sql))
		  echo "Pergunta salva com sucesso!";
		else
      echo "Ocorreu um erro ao salvar!";
}
else
echo "Já possui 100 perguntas de lógica! Não possível adicionar mais."

?>