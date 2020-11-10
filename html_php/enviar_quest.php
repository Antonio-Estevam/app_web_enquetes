<?php 


$usu=$_POST["id_usu"];
$id_alt=$_POST["id_alter"];
$pergunta=$_POST["pergunta"];
$alt1=$_POST["alternativa1"];

$base->query("INSERT INTO `inqueetesdb`.`question` (`idquestion`, `question_body`, `question_status`, `id_user_fk`) VALUES ('".$id_alt."', '".$pergunta."','1','".$usu."')"); 
$base->query("INSERT INTO option (`option_body`, `id_question_fk`) VALUES ('".$alt1."', '".$id_alt."')"); 

#INSERT INTO `inqueetesdb`.`question` (`idquestion`, `question_body`, `question_status`, `id_user_fk`) VALUES ('AVS004', 'bbb', '1', '1');
/*
if($_POST["alternativa2"]){
    $alt2=$_POST["alternativa2"];
    enviar($id_alt,$alt2);

}else{}

if($_POST["alternativa3"]){
    $alt3=$_POST["alternativa3"]; 
    enviar($id_alt,$alt3);
    
}else{}

if($_POST["alternativa4"]){
    $alt4=$_POST["alternativa4"];
    enviar($id_alt,$alt4); 
}else{}

if($_POST["alternativa5"]){
    $alt5=$_POST["alternativa5"]; 
    enviar($id_alt,$alt4);
}else{}

if($_POST["alternativa6"]){
    $alt6=$_POST["alternativa6"]; 
    enviar($id_alt,$alt6);
}else{}
*/

/*
function enviar($id_alt,$alt1){
    $base->query("INSERT INTO option (`option_body`, `id_question_fk`) VALUES ('".$alt1."', '".$id_alt."')");      

}*/





echo($usu);
echo($id_alt);

?>