<?php
        require '../config.php';
        require '../connection.php';
        require '../database.php';
       session_start();
          if (session_status() == PHP_SESSION_ACTIVE) {
           session_destroy();
           finalizaSessao($_SESSION['cdusuario']);
        }
        $server = $_SERVER['SERVER_NAME'];
        $link = "http://".$server.":8090/tcc/login";
       header('Location: '.$link);

?>
