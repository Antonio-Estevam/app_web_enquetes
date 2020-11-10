<?php

include("configDB.php");

$email=$_GET["email_logar"];
$senha=$_GET["senha_logar"];


$registro=$base->query("SELECT iduser, username FROM inqueetesdb.user where user_email ='".$email."' and user_passl = '".$senha."'")->fetchAll(PDO::FETCH_OBJ);




#var_dump($registro);

if($registro){
    foreach ($registro as $user) :
        #criando sessão

        session_start(); 

        $_SESSION["id_usu"] = $user -> iduser;
        $_SESSION["nome_usu"] = $user -> username;       

        #echo ($_SESSION["nome_usu"]);

        header("Location:logado.php");
        


    endforeach;
}else{

    echo("\n <br><br><br><h2><center>Email ou senha Inválido! <center><h2>");
    header('Refresh: 2;URL=../index.html'); 

}  
?>