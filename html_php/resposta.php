<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enquetes</title>

    <link rel="stylesheet" href="../style_globala.css">
    <link rel="stylesheet" href="../css/resposta.css">
    <link href="https://fonts.googleapis.com/css2?family=Archivo:ital,wght@0,400;0,500;0,700;1,600&display=swap" rel="stylesheet">
</head>
<body>
    <?php 

        include("configDB.php");
        $id_perg=$_GET["cod"];

        $registro=$base->query("SELECT * FROM inqueetesdb.question where idquestion = '".$id_perg."';")->fetchAll(PDO::FETCH_OBJ);      
         
     ?>
    <main>
        <div class="content" >
            <header>
                <h1>
                    O que seus amigos <br>
                    responderam para: 
                </h1>

                <h2>
                        <?php
                        foreach ($registro as $pergunta) :
                            echo ('"<span>'.$pergunta-> question_body.'</span><br><br>"');
                        endforeach;  
                        
                        ?> 
                        <span> <strong>Link para votar:</strong><br> app_web_enquetes/html_php/resposta.php?cod=<?php echo($id_perg);?> </span>
                </h2>
            </header>

            <div id="cxresult">

            <?php 
                $registro2=$base->query("SELECT * FROM inqueetesdb.option where id_question_fk ='".$id_perg."';")->fetchAll(PDO::FETCH_OBJ);    
                
                foreach ($registro as $pergunta) :
                endforeach; 
            
            ?>
                <div class="result">

                    <div class="result_cont">
                        <div class="agrup_result">
                            <h3>
                                <span>1. Viena, Áustria</span>
                            </h3>

                            <p class="votaram">
                                Luana silva, julia , douglas Luana silva, julia , douglas, Luana silva, julia , douglas  
                                Luana silva, julia , douglas  ,Luana silva, julia , douglas 
                            </p>
                        </div>                    

                        <p class="pocentagem">
                            10%
                        </p>
                    </div>
                </div>
            </div>

            <a href="./logado.php" id="sair">
                voltar 
            </a>           


    </main>
    
</body>
</html>