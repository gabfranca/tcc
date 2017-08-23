<?php
        require '../config.php';
        require '../connection.php';
        require '../database.php'; 
       session_start();  
          if (session_status() == PHP_SESSION_ACTIVE) {
           session_destroy();
            header('Location: http://localhost:8090/tcc/login');
        }
        else{
            header('Location: http://localhost:8090/tcc/login');
         }

?>