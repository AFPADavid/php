<?php 

include('navigation.php');


echo "Bonjour, Monde !<br/>";
print "Bonjour, Monde !";

// phpinfo();
?>

<form method="POST" action="traitement.php">
    <input type="text" name="texteTraitement" id="texteTraitement" require>
    <input type="text" name="texteTraitement2" id="texteTraitement2" require>
    <input type="submit" value="Envoyer">
</form>



<?php

$personnes = array("Aziza","Sabri","Anastasiia","Maxime","Thomas");

foreach($personnes as $nom){
    echo $nom."<br/>";
}






require_once('footer.php');


?>