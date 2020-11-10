<?php
include("configDB.php");

 $nome = $_POST["nome_criar"];
 $email = $_POST["email_criar"];
 $senha = $_POST["senha_criar"];

 #echo ($nome." ".$email." ".$senha);


         #vericifar se os dados já existe 
         $registro=$base->query("SELECT user_email FROM inqueetesdb.user where user_email ='".$email."'")->fetchAll(PDO::FETCH_OBJ);

         if (empty($registro)) {
             
             try {
 
                 $registro=$base->query("INSERT INTO inqueetesdb.user (username, user_passl, user_email) VALUES ('".$nome."', '".$senha."', '".$email."')");
                 ?>  
                 
                 
                <!DOCTYPE html>
                <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title></title>
                    <script>alert('usuário cadastrado com sucesso!');</script>
                    <?php  header('Refresh: 1;URL=../index.html');  ?>
                </head>
                <body>
                    
                </body>
                </html>
                 <?php
                 
             
             }  catch (Exception $erro) {
         
                 die("ERRO ao cadastrar novos dados: ".$erro->getMessage());
             }
         }else{
             
             echo("<center><h2>O e-mail utilizado já possui cadastro!!<h2></center>");
         }


?>


