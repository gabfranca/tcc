

    <?php 
        require '../config.php';
        require '../connection.php';
        require '../database.php'; 

        $link =  DBConnect(); 
        //PARAMETROS
         $nome = $_POST['nome'];
         $login = $_POST['login'];
         $senha = $_POST['senha'];
         $opUsuario = $_POST['opUsuario'];

       echo $nome;
        echo $login;
       echo $senha;
     echo $opUsuario;
         
        DBConnect();


       // DBClose($link);

       // $query = "INSERT INTO CATEGORIAS VALUES(NULL, 'TESTE INSERT');";
       // var_dump(DBExecute($query));

          $usuario = array(
            'cdUsuario' => 'null', 
            'nmUsuario' => "' $nome'" ,
            'password' => "$senha ",
            'nmLogin' =>  "'$login'" ,
            'cd_tipoUsuario' => $opUsuario
        ); 



        $grava = DBCreate('Usuario', $usuario);
       if ($grava) 
           echo 'Conta registrada com Sucesso! </br>
           <a href="http://'.SERVER_HOSTNAME.'/tcc/login">Ir para a pagina de Login.</a>';

    
       else 
           'ERROR:'.$grava;

     $lastID = getLastID('usuario', 'cdUsuario');   
     //echo $lastID;

     session_start();
     GravaSessao($lastID);
     $_SESSION["cdusuario"] = $lastID;
     $_SESSION["login"] = $login;
     $_SESSION["tpUser"] = $opUsuario;
     $_SESSION["nomeUser"] = $nome;
     
 
  

        

 
      //  $retorno = DBRead('categorias', 'where cdCategoria = 1' );
        //var_dump($retorno);
    ?>