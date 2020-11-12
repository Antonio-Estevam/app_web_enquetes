<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enquetes</title>

    <link rel="stylesheet" href="../style_globala.css">
    <link rel="stylesheet" href="../css/depois_voto.css">
    <link href="https://fonts.googleapis.com/css2?family=Archivo:ital,wght@0,400;0,500;0,700;1,600&display=swap" rel="stylesheet">
</head>
<body>
    <?php 
    include("configDB.php");

    $id_perg=$_GET["id_pergunta"];
    $id_res=$_GET["opcIn"];
    $nomeResp=$_GET["nomeResp"];

    #$registro_ins=$base->query("INSERT INTO `inqueetesdb`.`answer` (`answer_name`, `answer_id_user_fk`, `answer_id_question_fk`, `answer_id_option_fk`) VALUES ('".$nomeResp."', '".$usu."', '".$id_perg."', '".$id_res."');");

    $registro=$base->query("SELECT * FROM inqueetesdb.question where idquestion = '".$id_perg."';")->fetchAll(PDO::FETCH_OBJ);     
    $num_alt = 0; 
    ?>
    <main>
        <div class="content" >
            <header>
                <h1>
                    Obrigado por participar <br>
                    da minha enquete
                </h1>

                <h2>
                     "<span>
                        <?php
                            foreach ($registro as $pergunta) : 
                             echo $pergunta -> question_body;
                             $usu = $pergunta -> id_user_fk;
                            endforeach; 
                            
                            $registro_ins=$base->query("INSERT INTO `inqueetesdb`.`answer` (`answer_name`, `answer_id_user_fk`, `answer_id_question_fk`, `answer_id_option_fk`) VALUES ('".$nomeResp."', ".$usu.", '".$id_perg."', '".$id_res."');");
                        ?>
                     </span>"
                </h2>
            </header>

            <div id="cxresult">
                <?php 
                    $registro_altern =$base->query("SELECT * FROM inqueetesdb.option where id_question_fk = '".$id_perg."';")->fetchAll(PDO::FETCH_OBJ);  

                    foreach ($registro_altern as $alternativa) : 
                        $num_alt ++; 
                    ?>
                        <div class="result">

                            <div class="result_cont">
                                <div class="agrup_result">
                                    <h3 <?php if($id_res == $alternativa -> idoption){ echo('id="result_select"');}else{}  ?> >
                                        <span><?php echo($num_alt.". ".$alternativa -> option_body.""); ?></span>
                                    </h3>
                                </div>                    

                                <p class="pocentagem" <?php if($id_res == $alternativa -> idoption){ echo('id="result_select"');}else{}  ?>>
                                    Votos 
                                    <?php 

                                        $registro_votos=$base->query("SELECT count(*) as votos  FROM inqueetesdb.answer where answer_id_option_fk = '".$alternativa -> idoption."' and answer_id_question_fk = '".$id_perg."';")->fetchAll(PDO::FETCH_OBJ);  
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

            <a href="../index.html" id="">
                Sair 
            </a>           


    </main>
    
</body>
</html>