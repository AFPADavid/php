<!-- Première chose à savoir un fichier PHP porte l'extesion .php et ne fonctionne que sur serveur (ou votre wamp) vous ne pouvez pas l'ouvrir directement
Par défaut PHP à la priorité sur HTML, si vous avez donc un fichier php et html en index, le php sera pris en compte -->

<?php // Balise d'ouverture


// Commentaire PHP
/* Commentaire PHP
sur plusieurs ligne */


// echo : Affiche une ou plusieurs chaînes de caractères.

echo "Hello, world!";
print "Hello, world!";


/*

En PHP, les fonctions print et echo sont toutes deux utilisées pour afficher des données à l'écran, mais elles ont quelques différences subtiles.

Syntaxe : La principale différence réside dans la syntaxe utilisée pour appeler ces fonctions :

echo : echo expression1, expression2, ... ;
print : print(expression); ou print expression; (sans parenthèses).
Valeur de retour : echo n'a pas de valeur de retour, tandis que print renvoie toujours la valeur 1.

Expression multiple : echo peut afficher plusieurs expressions séparées par des virgules, tandis que print ne prend qu'une seule expression. Par exemple :
echo "Hello ", "World";  // Affiche : Hello World
print "Hello ", "World"; // Erreur de syntaxe
Utilisation dans une expression : echo peut être utilisé dans une expression plus complexe, tandis que print ne peut pas. Par exemple :

$result = $var + print("Hello"); // Erreur de syntaxe
$result = $var + echo "Hello";   // Syntaxiquement valide
Vitesse d'exécution : En général, echo est légèrement plus rapide que print car il n'a pas de valeur de retour à gérer.

En pratique, la plupart des développeurs utilisent echo pour afficher des données à l'écran car il est plus couramment utilisé et plus rapide. Cependant, print peut être utile lorsque vous avez besoin de connaître la valeur de retour pour des opérations spécifiques.

*/

// if...else : Exécute un bloc de code si une condition est vraie, sinon exécute un autre bloc de code.

$age = 18;
if ($age >= 18) {
    echo "Vous êtes majeur.";
} else {
    echo "Vous êtes mineur.";
}



// for : Exécute un bloc de code un nombre défini de fois.

for ($i = 0; $i < 5; $i++) {
    echo $i;
}


// while : Exécute un bloc de code tant qu'une condition est vraie.
$i = 0;
while ($i < 5) {
    echo $i;
    $i++;
}

// switch : Exécute différents blocs de code en fonction de la valeur d'une expression.
$couleur = "rouge";
switch ($couleur) {
    case "rouge":
        echo "La couleur est rouge.";
        break;
    case "vert":
        echo "La couleur est verte.";
        break;
    default:
        echo "La couleur n'est ni rouge ni verte.";
}



// function : Déclare une fonction réutilisable.
function addition($a, $b) {
    return $a + $b;
}

$resultat = addition(5, 3);
echo $resultat; // Affiche 8


// include et require : Inclut et exécute le contenu d'un fichier externe.
// inclusion avec include
// include "fichier.php";

// inclusion avec require
// require "fichier.php";



function generatePassword($length = 10) {
    // Liste des caractères utilisables dans le mot de passe
    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_+=-';

    // Mélange les caractères
    $charactersLength = strlen($characters);
    $password = '';
    for ($i = 0; $i < $length; $i++) {
        $password .= $characters[rand(0, $charactersLength - 1)];
    }

    return $password;
}

// Génère un mot de passe de 12 caractères
$password = generatePassword(12);
echo $password;
/*
Dans cet exemple, la fonction generatePassword génère un mot de passe en utilisant une liste de caractères possibles. Le paramètre length définit la longueur du mot de passe (par défaut 10 caractères). La fonction utilise une boucle pour choisir de manière aléatoire des caractères de la liste et les concatène pour former le mot de passe final.

Ensuite, vous pouvez appeler la fonction generatePassword avec la longueur souhaitée pour obtenir un mot de passe aléatoire et l'afficher avec echo.

Notez que ce générateur de mot de passe basique utilise une liste de caractères pré-définie. Vous pouvez la personnaliser en ajoutant ou en supprimant des caractères selon vos besoins. Assurez-vous également d'utiliser des mots de passe suffisamment longs et complexes pour garantir la sécurité.

*/

?> <!-- balise de fermeture -->



<table>
    <?php for ($i = 1; $i <= 10; $i++) : ?>
        <tr>
            <?php for ($j = 1; $j <= 10; $j++) : ?>
                <td><?php echo $i * $j; ?></td>
            <?php endfor; ?>
        </tr>
    <?php endfor; ?>
</table>


<?php
// Supposons que l'URL soit : example.com?page=about&lang=fr

// Récupérer la valeur du paramètre 'page'
if (isset($_GET['page'])) {
    $page = $_GET['page'];
    echo "Page : " . $page . "<br>";
}

// Récupérer la valeur du paramètre 'lang'
if (isset($_GET['lang'])) {
    $lang = $_GET['lang'];
    echo "Langue : " . $lang . "<br>";
}

// Autres traitements ou affichages en fonction des paramètres
// ...
?>

<?php
// Vérifier si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer la valeur du champ 'nom'
    if (isset($_POST['nom'])) {
        $nom = $_POST['nom'];
        echo "Nom : " . $nom . "<br>";
    }

    // Récupérer la valeur du champ 'email'
    if (isset($_POST['email'])) {
        $email = $_POST['email'];
        echo "Email : " . $email . "<br>";
    }

    // Autres traitements ou affichages en fonction des données POST
    // ...
}
?>
<form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
    <label for="nom">Nom :</label>
    <input type="text" name="nom" id="nom">
    <br>
    <label for="email">Email :</label>
    <input type="email" name="email" id="email">
    <br>
    <input type="submit" value="Envoyer">
</form>
