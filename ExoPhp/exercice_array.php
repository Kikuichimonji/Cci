<!DOCTYPE html>
<html lang="en">
<head>
  <title>Array !</title>
</head>
<body>

<?php

/* ------------------------
 * Validation Mot de Passe
 * ------------------------ */
echo '<h4>Exercice 3</h4>';

// Password
$password = '#HeLloW0r1d!99';

// Vars
$charSpec = str_split('*^%#-+?!,;:=@');
$char_0 = ord('0');
$char_9 = ord('9');
$char_a = ord('a');
$char_z = ord('z');
$char_A = ord('A');
$char_Z = ord('Z');

// Configs
$minSize = 8;
$minNum = 2;
$minLowerCase = 1;
$minUpperCase = 1;
$minCharSpec = 2;

// Validator
$isValid = false;

// Validation
if (strlen($password) >= $minSize) {
  // Countable
  $countNum = 0;
  $countLowerCase = 0;
  $countUpperCase = 0;
  $countCharSpec = 0;

  // Check any $char
  foreach (str_split($password) as $char) { // CHECK: Minimal size
    $c = ord($char);

    if (in_array($char, $charSpec)) { // CHECK:  Special char
      $countCharSpec++;
    } elseif ($c >= $char_0 and $c <= $char_9) { // CHECK: Number char
      $countNum++;
    } elseif ($c >= $char_a and $c <= $char_z) { // CHECK: Lowercase char
      $countLowerCase++;
    } elseif ($c >= $char_A and $c <= $char_Z) { // CHECK: Uppercase char
      $countUpperCase++;
    }
  }

  // Final validation
  if ($countNum >= $minNum
    and $countLowerCase >= $minLowerCase
    and $countUpperCase >= $minUpperCase
    and $countCharSpec >= $minCharSpec
  ) {
    $isValid = true;
  }
}

// Result
echo 'Version 1: '.($isValid ? 'VALIDE !' : 'UNVALIDE ...').'<br>';

/* -----------------------------
 * Validation email - Version 1
 * --------------------------- */
echo '<h4>Exercice 4 v1</h4>';

/*
 * Variables
 */
$email = 'marc.meyer@sous.gmail.com';
$isValid = false;
$alphaLower = range('a', 'z'); // ['a','b', ...'y', 'z']
$alphaUpper = range('A', 'Z'); // ['A','B', ...'Y', 'Z']
$alphaNum = ['0','1','2','3','4','5','6','7','8','9'];

//
// Rappel : dans toutes adresse email il y a 3 parties séparées comme suit :
//     - Un "@" sépare les parties 1 et 2
//     - Le dernier "." sépare les parties 2 et 3
//
// On utilisera $str1 pour la 1ère partie, $str2 pour la 2ème et $str3 pour la 3ème.
//

/*
 * Début de la validation
 */

// On casse l'email en 2 parties coupées par le "@"
$str1 = explode('@', $email); // $str1 = ['marc.meyer', 'sous.gmail.com']
if (count($str1) === 2) { // Valide s'il y a un et un seul "@"

  // On sépare le tableau $str1 en 2 string : $str2 et le vrai $str1
  $str2 = $str1[1]; // $str2 = 'sous.gmail.com'
  $str1 = $str1[0]; // $str1 = 'marc.meyer'

  // On retire le caractère "." car il est autorisé mais optionnel dans la première partie d'un email.
  $str1 = str_replace('.', '', $str1); // $str1 = 'marcmeyer'

  //
  // Note pour info : On aurait pu aussi retirer aussi tous les chiffres qui sont aussi autorisés mais optionnels.
  // On peut supprimer plusieurs caractères/nombres à la fois avec un seul str_replace(), voir la doc pour plus d'info.
  //

  // On casse aussi en 2 la 2ème partie séparé par un "." pour obtenir $str3 et le vrai $str2.
  $str2 = explode('.', $str2); // $str2 = ['sous', 'gmail', 'com']
  if (count($str2) >= 2) { // Valide si au moins un "."
    // La 2ème partie d'un email peut être un sous-domaine avec plusieurs "." séparateur.
    // $str2 est donc un tableau de 2 ou plus d'élement.
    // Il y a plusieurs solution, en voici une avec les connaissances de cours actuelle :
    //   -> La 3ème partie de l'email est le dernier élément du tableau $str2
    //      donc on va inverser $str2 pour récupérer et retirer la 3ème partie qui sera en 1ère position.
    // Le sens des caractères n'a pas d'impact pour la validation
    $str2 = array_reverse($str2); // ['com', 'gmail', 'sous']
    $str3 = $str2[0]; // $str3 = 'com' -> après inversion la 3ème partie se trouve en 1er et les clés ont été généré par PHP.

    // On retire $str3 (la partie en trop) du tableau $str2
    unset($str2[0]); // ['gmail', 'sous']

    // implode() va nous servir à rassembler la 2ème partie en une seule string
    $str2 = implode('', $str2); // $str2 = 'gmailsous'

    /*
     * Validation de str1 et str2
     */

    // $str1 et $str2 doivent subir la même validation.
    // Notre validation va vérifier les caractères, un à un, de $str1 et $str2.
    // Il faut aussi vérifier que $str1 et $str2 ont chacune au moins une lettre.

    //
    // Note pour info : On aurait pu rassembler les caractères de $str1 et $str2 dans 1 seul tableau, mais
    // on ne va pas le faire car il faut vérifier que chacune a au moins une lettre.
    //

    // La vérification de $str1 et $str2 sont les mêmes donc on utilisera une boucle pour répéter la condition.
    foreach( [$str1, $str2] as $strToCheck ) { // $strToCheck représentera $str1 puis $str2.

      $strIsValid = true; // On dit d'abord que $strToCheck est valide.
      $alphaLetterNumber = 0; // On prépare une variable pour vérifier la présence d'au moins 1 lettre.

      // On se sert de str_split() pour placer chaque caractère de la string dans un tableau.
      // Ce qui donne avec $str1 : str_split($str1) -> ['m', 'a', 'r', 'c', 'm', 'e', 'y', 'e', 'r']
      foreach (str_split($strToCheck) as $c) {
        // 1/ On a aussi besoin de comptant les lettres pour vérifier que $strToCheck contient au moins 1 lettre
        // 2/ On a besoin de vérifier que $c (le caractère testé) est peut-être une lettre (Voir le "if" suivant)
        // Donc pour éviter d'appeler in_array() pour le comptage de lettres et dans la condition :
        // on stock le résultat dans une variable pour servir dans le comptage et dans la condition.
        $inAlphaLower = in_array($c, $alphaLower);
        $inAlphaUpper = in_array($c, $alphaUpper);

        $alphaLower[50];
        // Vérification que $c se trouve dans l'un des 3 tableaux.
        if ( !$inAlphaLower and !$inAlphaUpper and !in_array($c, $alphaNum) ) {
          // Si $c n'est ni une lettre, ni un chiffre : $strToCheck est invalide.
          $strIsValid = false; // On passe $strIsValid à faux.
          break; // Et on stop la boucle.
        }

        // Comptage des lettres
        if ($inAlphaLower or $inAlphaUpper) {
          $alphaLetterNumber++;
        }
      }

      // La condition est vrai si $strToCheck n'a pas réussi le teste de validation
      // Si la condition est fausse, la boucle continue
      if ($strIsValid === false or $alphaLetterNumber === 0) {
        $strIsValid = false;
        break;
      }

    }

    //
    // Pour rappel, $isValid est toujours false à ce stade
    //

    // La condition est vrai si $str1 et $str2 ont réussi leur teste de validation
    // Si la condition est fausse, le code de la condition n'est pas exécuté donc $isValid reste à false
    if ($strIsValid === true) {

      /*
       * Validation de str3
       */
      // La validation de $str3 est la plus simple, on vérifie que chaque caractère est une lettre minuscule.
      foreach (str_split($str3) as $c) {
        // Vérification que $c se trouve dans l'un des 3 tableaux.
        if ( !in_array($c, $alphaLower) ) {
          $strIsValid = false; // On passe $strIsValid à faux.
          break; // Et on stop la boucle.
        }
      }

      // Si $strIsValid est resté à true c'est que la 3ème partie est aussi valide
      if ($strIsValid === true) {
        $isValid = true; // Si le programme arrive ici, c'est que les validations des 3 parties de l'email sont réussies
      }
    }
  }
}

echo $isValid
  ? "L'adresse email est valide."
  : "L'adresse email n'est pas valide.";

/* -------------------------
 * Validation email - Version 2
 * ------------------------- */
echo '<h4>Exercice 4 v2</h4>';

// Cette version de la validation d'email par PHP est plus simple mais moins stricte
// et n'est pas personnalisable.
// Néanmoins elle peut servir à améliorer et simplifier la version 1 manuelle.

if ( !isset($email) ) {
  $email = 'marc.meyer@sous.gmail.com';
}

if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
  echo "L'adresse email est valide.";
} else {
  echo "L'adresse email n'est pas valide.";
}

?>

</body>
</html>
