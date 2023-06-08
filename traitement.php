<?php

if(isset($_POST['texteTraitement']) && isset($_POST['texteTraitement2'])  ){

    echo "coucou<br/>";

// $mavraiable ="";


$mavraiable = $_POST['texteTraitement'];
$mavraiable2 = $_POST['texteTraitement2'];
    $variableaffiche = "<br/>Votre nom : ".$mavraiable2." ".$mavraiable;


echo $mavraiable;
echo $variableaffiche;
}



?>