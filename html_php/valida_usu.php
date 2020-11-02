<?php

$email=$_GET["email_logar"];
$senha=$_GET["senha_logar"];

$valid_email = "jhonnyimmbe@gmail.com";
$valid_senha = "1234";

$nome_usu1 = 'Jhonny Estevam';


echo"Bem vindo ".$email.". Sua senha ".$senha." é uma droga";

if($email == $valid_email){

    if($senha == $valid_senha){

        session_start();

        $_SESSION['email_usu'] = $email;
        $_SESSION['nome_usu'] = $nome_usu1;

        #echo $_SESSION[cod_usu];

        header("Location:logado.php");
    }else{
        echo("\n Burro emm!!!");
    }

}else{
    echo("\n Burro emm!!!");
}




?>