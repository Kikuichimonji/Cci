<?php
include 'functions.php' ;
function validatePassword($pass)
{
    $result = false;
    $countPassNumb = 0;
    $minusCount = 0;
    $majusCount = 0;
    $charTable = str_split($pass);
    if(strlen($pass) < 8 ){
        return "Au moins 8 charactères";
    }
    else{
        foreach($charTable as $char){
            $countPassNumb = is_numeric($char) ? ++$countPassNumb : $countPassNumb;
            $majusCount = !is_numeric($char) ? (strtoupper($char)==$char ? ++$majusCount : $majusCount) : $majusCount;
            $minusCount = !is_numeric($char) ? (strtolower($char)==$char ? ++$minusCount : $minusCount) : $minusCount;
        }
        if($minusCount > 0 and $majusCount > 0 and $countPassNumb > 1){
            $result = true;
        }
        else{
            return "Veuillez entrer au moins 2 chiffres, une majuscule et une minuscule";
        }

        if(!preg_match('/[?*^%#-+!,;:=@]{2,}/',$pass)){
            return "Veuillez rentrer au moins 2 charactères speciaux parmis : *^%#-+?!,;:=@";
        }
    }
    return $result;
}


function validateEmail($mail)
{
    $resultExplode = explode("@",$mail);
    if(count($resultExplode) != 2){
        return "Ce format de mail n'est pas valide '@'";
    }
    else{
        $resultExplode2 = explode(".",$resultExplode[1]);
        if(count($resultExplode2) != 2){
            return "Ce format de mail n'est pas valide '.'";
        }
        else{
            if(!ctype_alnum($resultExplode2[0]) or !ctype_alnum($resultExplode[0])){
                return "Pas de symboles autorisés dans le mail";
            }
            if(!ctype_alpha($resultExplode2[1])){
                return "Pas de symbole ni de chiffre dans l'extention du mail";
            }
        }
    }
    return "ok";
}


$password = "Aa1234+@";
$email = "mail@pouet.test";

var_dump(validatePassword($password));
var_dump(validateEmail($email));

var_dump(sortThree(5,8,1));
dd(showEven(1,35));

?>