<?php

try {
    $base= new PDO("mysql:host=localhost;dbname=inqueetesdb","root","");

    $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $base->exec("SET CHARACTER SET utf8");

} catch (Exception $erro) {
   die("ERRO: ".$erro->getMessage());
}


