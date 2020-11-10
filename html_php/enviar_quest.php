<?php 

include("configDB.php");


$usu=$_POST["id_usu"];
$id_alt=$_POST["id_alter"];
$pergunta=$_POST["pergunta"];
$status_quest = 1;

$alt1=$_POST["alternativa1"];

echo($alt1);
echo($id_alt);


try {
    
    $base->query("INSERT INTO `inqueetesdb`.`question` (`idquestion`, `question_body`, `question_status`, `id_user_fk`) VALUES ('".$id_alt."', '".$pergunta."','".$status_quest."', ".$usu.");"); 
    
    try {
        $base->query("INSERT INTO `inqueetesdb`.`option` (`option_body`, `id_question_fk`) VALUES ('".$alt1."', '".$id_alt."');");




        if($_POST["alternativa2"]){

            $alt2=$_POST["alternativa2"];
            $base->query("INSERT INTO `inqueetesdb`.`option` (`option_body`, `id_question_fk`) VALUES ('".$alt2."', '".$id_alt."');");

            if($_POST["alternativa3"]){

                $alt3=$_POST["alternativa3"];
                $base->query("INSERT INTO `inqueetesdb`.`option` (`option_body`, `id_question_fk`) VALUES ('".$alt3."', '".$id_alt."');");


                if($_POST["alternativa4"]){

                    $alt4=$_POST["alternativa4"];
                    $base->query("INSERT INTO `inqueetesdb`.`option` (`option_body`, `id_question_fk`) VALUES ('".$alt4."', '".$id_alt."');");

                    if($_POST["alternativa5"]){

                        $alt5=$_POST["alternativa5"];
                        $base->query("INSERT INTO `inqueetesdb`.`option` (`option_body`, `id_question_fk`) VALUES ('".$alt5."', '".$id_alt."');");

                        if($_POST["alternativa6"]){

                            $alt6=$_POST["alternativa6"];
                            $base->query("INSERT INTO `inqueetesdb`.`option` (`option_body`, `id_question_fk`) VALUES ('".$alt6."', '".$id_alt."');");
                        }
                    }
                }
            }
        
        }else{}
        header('Refresh: 1;URL=logado.php'); 


    } catch (\Throwable $th) {
        die("ERRO ao cadastrar novos dados: ".$th->getMessage());
        header('Refresh: 1;URL=logado.php'); 
    }
    
} catch (Exception $erro) {
    die("ERRO ao cadastrar novos dados: ".$erro->getMessage());
    header('Refresh: 1;URL=logado.php'); 
}

?>