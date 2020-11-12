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
                        <span> 
                            <strong>Link para votar:</strong><br> app_web_enquetes/html_php/responder.php?cod=<?php echo($id_perg);?> <br><br>
                            <strong>Código da enquete:</strong><?php echo($id_perg);?> 
                        </span>
                </h2>
            </header>

            <div id="cxresult">

            <?php 
                $registro2=$base->query("SELECT * FROM inqueetesdb.option where id_question_fk ='".$id_perg."';")->fetchAll(PDO::FETCH_OBJ);    
                $num_alt = 0; 
                foreach ($registro2 as $alternativas) :
                ?>
                <div class="result">

                    <div class="result_cont">
                        <div class="agrup_result">
                            <h3>
                                <span><?php 
                                    $num_alt ++;
                                    echo($num_alt.". ". $alternativas -> option_body);
                                ?></span>
                            </h3>

                            <p class="votaram">
                                <?php 
 
                                        $registro_votaram=$base->query("SELECT answer_name FROM inqueetesdb.answer where answer_id_option_fk = '".$alternativas -> idoption."' and answer_id_question_fk = '".$id_perg."';")->fetchAll(PDO::FETCH_OBJ);  
                                        foreach ($registro_votaram as $nm_voto) :

                                            echo(" ".$nm_voto -> answer_name.",");

                                        endforeach;     
                                    
                                    ?>
                            </p>
                        </div>                    

                        <p class="pocentagem">
                        Votos 
                                    <?php 

                                        $registro_votos=$base->query("SELECT count(*) as votos  FROM inqueetesdb.answer where answer_id_option_fk = '".$alternativas -> idoption."' and answer_id_question_fk = '".$id_perg."';")->fetchAll(PDO::FETCH_OBJ);  
                                        foreach ($registro_votos as $votos) :

                                            echo($votos -> votos);                                        
                                        endforeach;     
                                    
                                    ?>
                        </p>
                    </div>
                </div>
            <?php 
            endforeach; 
            
            ?>
            </div>

            <a href="./logado.php" id="sair">
                voltar 
            </a>           


    </main>
    
</body>
</html>