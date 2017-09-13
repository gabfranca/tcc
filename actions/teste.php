<?php


    $post = [
        'RA' => '123412',
        'Senha' => '280396'
    ];
    
    $ch = curl_init('http://portalaluno.unisanta.br/Acesso/Login');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
    
    // execute!
    $response = curl_exec($ch);
    
    // close the connection, release resources used
    curl_close($ch);
    
    // do anything you want with your response
    var_dump($response);
    echo $response;


?>