<?php

        require 'config.php';
        require 'connection.php';
        require 'database.php';


$login = $_POST['login'];
$senha = $_POST['senha'];

if (session_status() == PHP_SESSION_ACTIVE) {
  session_destroy();
}


  $retorno = ValidaLogin($login, $senha);

if($retorno !=false)
{
     session_start();
  foreach ($retorno as $ret) {
            $_SESSION["cdusuario"] =  $ret['cdUsuario'];
            $_SESSION["login"] = $ret['nmLogin'];
            $_SESSION['tpUser'] = $ret['cd_tipoUsuario'];
            $_SESSION["nomeUser"] = $ret['nmUsuario'];
        }

  //echo  $_SESSION["cdusuario"]. $_SESSION["login"]. $_SESSION['tpUser']. $_SESSION["nomeUser"];

  if ($_SESSION['tpUser']==1) {
     $redirect = "Home";
        header("location:$redirect");
  } else {
    header('Location: http://localhost:8090/tcc/login');
  }
  GravaSessao($_SESSION["cdusuario"]);
}
else
{
  header('Location: http://localhost:8090/tcc/login');

   // echo "Login ou senha inválidos!";
}
//echo $login.'</br>'.$senha;
//$myboxes = $_POST['myCheckbox'];

?>
