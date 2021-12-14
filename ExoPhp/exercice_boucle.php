<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Css Style pour l'exo 4 (Tableau HTML) -->
    <style>
        table, td {
            border: 1px solid #333;
        }

        th {
            border: 2px solid #333;
            background-color: #333;
            color: #fff;
        }

        td, th {
            padding: 2px 5px;
        }
    </style>
    
    <title>Boucles !</title>
</head>
<body>

<?php

/* -------------------------
 * Etoile 1 - Escalier inversé
 * ------------------------- */
echo '<h4>Exercice 1</h4>'; 

$char = '*';
$star = 5;

for ($s = $star; $s > 0 ; $s--) {
    echo str_repeat($char, $s).'<br>';
}

/* -------------------------
 * Etoile 2 - Pyramide
 * ------------------------- */
echo '<h4>Exercice 2</h4>'; 

$start = 5;
$char = '*';

for ($s = 1; $s <= $star; $s++) {
    echo str_repeat('&nbsp', $star - $s)
        .str_repeat($char, $s)
        .'<br>';
}

/* -------------------------
 * Liens
 * ------------------------- */
echo '<h4>Exercice 3</h4>'; 

$links = ['google.com', 'php.net', 'wordpress.com'];

foreach ($links as $link) {
    echo '<a href="//'.$link.'">'.$link.'</a><br>';
}

/* -------------------------
 * Générateur de tableau HTML
 * ------------------------- */
echo '<h4>Exercice 4</h4>';

$col = 5;
$row = 10;

echo '<table>'; // Balise de tableau HTML Ouvrante.
for ($r=1; $r <= $row; $r++) { // Boucle des lignes.
    // On détermine si c'est la première ligne pour choisir
    // entre la balise th et td. (th = table header => first line).
    $baliseThTd = $r == 1 ? 'th' : 'td';

    echo '<tr>'; // Balise de ligne de tableau HTML Ouvrante.
    for ($c=1; $c <= $col; $c++) { // Boucle des colonnes.
        echo '<'.$baliseThTd.'>' // Balise de colonne de tableau HTML Ouvrante.
            .'R'.$r.'-C'.$c // Contenu des cellules du tableau HTML
            .'</'.$baliseThTd.'>'; // Balise de colonne de tableau HTML Fermante.
    }
    echo '</tr>'; // Balise de ligne de tableau HTML Fermante.
}
echo '</table>'; // Balise de tableau HTMl Fermante.

$tab = [10 => "var1", 'str' => "var2", "var3"];
var_dump($tab);
?>
    
</body>
</html>