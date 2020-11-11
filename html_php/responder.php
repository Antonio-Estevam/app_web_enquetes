<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enquetes</title>

    <link rel="stylesheet" href="../style_globala.css">
    <link rel="stylesheet" href="../css/responder.css">
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
                    Rsponda a enquete da <br>
                    <?php 
                        $registro_nm=$base->query("SELECT username FROM inqueetesdb.user where iduser = (SELECT id_user_fk FROM inqueetesdb.question where idquestion = '".$id_perg."');")->fetchAll(PDO::FETCH_OBJ);  

                        foreach ($registro_nm as $nm_usu) : 
                            echo $nm_usu -> username;
                        endforeach;     
                    ?> 
                </h1>
            </header>

            <div id="pergunta">
                <p>
                    <span> "<?php 
                             foreach ($registro as $pergunta) : 
                                echo $pergunta -> question_body;
                             endforeach;    
                        ?>" </span>
                </p>
            </div>

            <div id="cxrOpc">
                <?php 
                  $registro_altern =$base->query("SELECT * FROM inqueetesdb.option where id_question_fk = '".$id_perg."';")->fetchAll(PDO::FETCH_OBJ);  

                  foreach ($registro_altern as $alternativa) : 
                     
                ?>   
                <div class="opc">
                    
                    <div class="opcCont">
                        <button class="bt_opcs" onclick='enviarRes("<?php echo $alternativa -> idoption; ?>")' >
                            <span>3. <?php echo $alternativa -> option_body; ?></span>
                        </button>
                    </div>

                </div>
                <?php 
                    endforeach; 
                ?>
            </div>

            <form action="./depois_voto.php" method="get">
                <input type="hidden" name="id_pergunta" id="id_pergunta" value="">
                <input type="hidden" name="opcIn" id="opcIn" value="">
                <input type="text" name="nomeResp" id="nomeResp" placeholder="Seu nome ou apelido" required>
                <input type="submit" value="Enviar" id="enviar">
            </form>



         </div>


        </div>
    </main>
    <script>
        function enviarRes (id_res){
            
            in_opcs = document.querySelector('#opcIn');
            in_opcs.setAttribute('value',id_res);
        }
    </script>
</body>
</html>