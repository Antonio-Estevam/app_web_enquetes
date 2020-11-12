<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enquetes</title>

    <link rel="stylesheet" href="../style_globala.css">
    <link rel="stylesheet" href="../css/logado.css">
    <link href="https://fonts.googleapis.com/css2?family=Archivo:ital,wght@0,400;0,500;0,700;1,600&display=swap" rel="stylesheet">
</head>
<body>
    <main>
        <div class="content" >
            <header>
                <div class="agrup_title">
                    <h1>
                        Bem vindo(a) <br>
                        <span>
                            <?php 
                                session_start(); 
                                echo ($_SESSION["nome_usu"]);
                             ?>
                        </span>
                    </h1>
    
                    <h2>
                        Aqui você pode criar e visualizar suas enquetes
                    </h2>

                </div>

                <img src="../imgs/question-circle-regular.svg" alt="Logo">
            </header>
                
            <a href="nova_inqu.php" id="Nova" > + Nova enquete  </a>

            <legend>Minhas enquetes</legend>
               
            <?php
                include("configDB.php");
                $registro=$base->query("SELECT idquestion,question_body FROM inqueetesdb.question where id_user_fk ='".$_SESSION["id_usu"]."'")->fetchAll(PDO::FETCH_OBJ);
               

                foreach ($registro as $perguntas) :
                    
                    echo ('<div class="minha_inq" >');
                    echo ('<a href="resposta.php?cod='.$perguntas -> idquestion.'">');
                    echo $perguntas -> question_body;
                    echo ('</a>');
                    echo ('</div>');
                endforeach;             

            ?>
                        <br>
            <a href="../index.html" id="sair">
                sair 
            </a>

        </div>


        
    </main>
    
</body>
</html>