<!DOCTYPE html>
<html lang="fr">
<meta charset="UTF-8">
<title>Exo PHP</title>
<meta name="viewport" content="width=device-width,initial-scale=1">
<body>

<h1> Exercice</h1>
<section>
        Exercice :
Créez un fichier PHP nommé "index.php". À l'intérieur de ce fichier, écrivez un programme qui affiche la phrase "Bonjour, monde !" à l'aide de la fonction "echo".

Correction :
Voici le contenu du fichier "index.php" :

<?php
echo "Bonjour, monde !";
?>

</section>


Exercice 2:
Créez un formulaire HTML contenant un champ de texte. Lorsque le formulaire est soumis, récupérez la valeur saisie dans le champ de texte et affichez-la à l'aide de PHP.

<form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
        <label for="texte">Entrez un texte :</label>
        <input type="text" name="texte" id="texte" required>
        <input type="submit" value="Envoyer">
    </form>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $texte = $_POST["texte"];
    echo "Le texte saisi est : " . $texte;
}
?>


Exercice 3:
Créez un tableau PHP contenant les noms de cinq personnes. Parcourez le tableau à l'aide d'une boucle et affichez chaque nom sur une nouvelle ligne.

<?php
$personnes = array("Alice", "Bob", "Charlie", "David", "Eve");

foreach ($personnes as $nom) {
    echo $nom . "<br>";
}
?>


Exercice 4:
Créez une fonction PHP qui prend deux nombres en paramètres et retourne leur somme. Appelez ensuite cette fonction avec différentes valeurs et affichez le résultat (vous pouverz faire les autres opérations).

<?php
function additionner($nombre1, $nombre2) {
    $somme = $nombre1 + $nombre2;
    return $somme;
}

// Appels à la fonction et affichage des résultats
$resultat1 = additionner(5, 3);
echo "Le résultat de l'addition de 5 et 3 est : " . $resultat1 . "<br>";

$resultat2 = additionner(10, -2);
echo "Le résultat de l'addition de 10 et -2 est : " . $resultat2 . "<br>";

$resultat3 = additionner(7.5, 2.5);
echo "Le résultat de l'addition de 7.5 et 2.5 est : " . $resultat3 . "<br>";
?>




Exercice 6:
Créez un script PHP qui génère un nombre aléatoire entre 1 et 10. Demandez ensuite à l'utilisateur de deviner le nombre généré. Affichez un message indiquant si la devinette est correcte ou non.


<form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
<input type="number" name="nombre" min="1" max="10" required>
<input type="submit" value="Devinez">
    </form>

<?php
// Générer un nombre aléatoire entre 1 et 10
$nombreAleatoire = rand(1, 10);

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Récupérer la valeur devinée par l'utilisateur
    $nombreDevine = $_POST["nombre"];

    // Vérifier si la devinette est correcte
    if ($nombreDevine == $nombreAleatoire) {
        echo "Bravo ! Vous avez deviné le bon nombre.";
    } else {
        echo "Désolé, le nombre correct était " . $nombreAleatoire . ". Essayez encore !";
    }
}
?>

Exercice 8:
Créez un formulaire d'inscription avec des champs tels que le nom, l'adresse e-mail et le mot de passe. Validez les entrées côté serveur en vérifiant que tous les champs sont remplis et que l'adresse e-mail est valide. (un peu de recherche à faire)
<?php
// Variables pour stocker les messages d'erreur
$erreurNom = $erreurEmail = $erreurMotDePasse = "";

// Variables pour stocker les valeurs des champs
$nom = $email = $motDePasse = "";

// Vérification du formulaire lorsqu'il est soumis
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Validation du champ Nom
    if (empty($_POST["nom"])) {
        $erreurNom = "Veuillez saisir votre nom";
    } else {
        $nom = $_POST["nom"];
    }

    // Validation du champ Adresse e-mail
    if (empty($_POST["email"])) {
        $erreurEmail = "Veuillez saisir votre adresse e-mail";
    } else {
        $email = $_POST["email"];
        // Vérification de la validité de l'adresse e-mail
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $erreurEmail = "Adresse e-mail invalide";
        }
    }

    // Validation du champ Mot de passe
    if (empty($_POST["motDePasse"])) {
        $erreurMotDePasse = "Veuillez saisir votre mot de passe";
    } else {
        $motDePasse = $_POST["motDePasse"];
    }

    // Si toutes les validations sont réussies, afficher un message de succès
    if (empty($erreurNom) && empty($erreurEmail) && empty($erreurMotDePasse)) {
        echo "Inscription réussie !";
        // Vous pouvez également ajouter ici le code pour enregistrer les données dans une base de données, par exemple
    }
}
?>

    <h1>Formulaire d'inscription</h1>
<form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
        <label for="nom">Nom :</label>
        <input type="text" name="nom" id="nom" value="<?php echo $nom; ?>">
        <span style="color: red;"><?php echo $erreurNom; ?></span><br>

        <label for="email">Adresse e-mail :</label>
        <input type="email" name="email" id="email" value="<?php echo $email; ?>">
        <span style="color: red;"><?php echo $erreurEmail; ?></span><br>

        <label for="motDePasse">Mot de passe :</label>
        <input type="password" name="motDePasse" id="motDePasse">
        <span style="color: red;"><?php echo $erreurMotDePasse; ?></span><br>

        <input type="submit" value="S'inscrire">
    </form>




Exercice 9:
Créez une fonction PHP qui prend une chaîne de caractères en paramètre et retourne le nombre de mots qu'elle contient. Testez ensuite la fonction avec différentes chaînes et affichez le résultat.


<?php
function compterMots($chaine) {
    $mots = explode(" ", $chaine);
    $nombreMots = count($mots);
    return $nombreMots;
}

// Exemples d'utilisation de la fonction compterMots()
$chaine1 = "Bonjour, comment ça va ?";
$chaine2 = "Le PHP est un langage de programmation puissant et polyvalent.";
$chaine3 = "Ceci est une phrase.";

$nombreMots1 = compterMots($chaine1);
$nombreMots2 = compterMots($chaine2);
$nombreMots3 = compterMots($chaine3);

echo "La phrase '".$chaine1."' contient ".$nombreMots1." mots.<br>";
echo "La phrase '".$chaine2."' contient ".$nombreMots2." mots.<br>";
echo "La phrase '".$chaine3."' contient ".$nombreMots3." mots.<br>";
?>




Exercice 10:
Créez un script PHP qui récupère la date et l'heure actuelles et les affiche dans un format lisible pour les humains, par exemple "Mardi 31 mai 2023, 14:30".

<?php
// Définir le fuseau horaire
date_default_timezone_set('Europe/Paris'); 

// Récupérer la date et l'heure actuelles
$dateActuelle = date("d/m/Y");
$heureActuelle = date("H:i");

// Formater la date et l'heure dans un format lisible
$dateObj = DateTime::createFromFormat("d/m/Y", $dateActuelle);
$dateLisible = $dateObj->format("l d F Y");

$heureLisible = date("H:i", strtotime($heureActuelle));

// Afficher la date et l'heure lisible
echo "Aujourd'hui, nous sommes ".$dateLisible." et il est ".$heureLisible.".";
?>




<?php
// Version écrite en français
// Définir le fuseau horaire
date_default_timezone_set('Europe/Paris');

// Récupérer la date et l'heure actuelles
$dateActuelle = date("d/m/Y");
$heureActuelle = date("H:i");

// Formater la date et l'heure dans un format lisible
//$dateLisible = date("l d F Y", strtotime($dateActuelle));
//$dateObj = DateTime::createFromFormat("d/m/Y", $dateActuelle);
$dateLisible = $dateObj->format("l d F Y");

$jourEnAnglais = array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday');
$jourEnFrancais = array('Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche');
$dateLisible = str_replace($jourEnAnglais, $jourEnFrancais, $dateLisible);


$moisEnAnglais = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
$moisEnFrancais = array('janvier', 'février', 'mars', 'avril', 'mai', 'juin', 'juillet', 'août', 'septembre', 'octobre', 'novembre', 'décembre');
$dateLisible = str_replace($moisEnAnglais, $moisEnFrancais, $dateLisible);

$heureLisible = date("H:i", strtotime($heureActuelle));

// Afficher la date et l'heure lisible
echo "Aujourd'hui, nous sommes ".$dateLisible." et il est ".$heureLisible.".";
?>


Créez un formulaire de connexion avec un champ pour l'identifiant (nom d'utilisateur) et un champ pour le mot de passe. Vérifiez les informations de connexion côté serveur et, si les informations sont correctes, enregistrez l'identifiant dans une variable de session. Affichez ensuite un message de bienvenue avec l'identifiant de l'utilisateur connecté.



<?php
session_start();

// Vérification des informations de connexion
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $identifiantAttendu = "admin";
    $motDePasseAttendu = "password";

    $identifiant = $_POST["identifiant"];
    $motDePasse = $_POST["motDePasse"];

    if ($identifiant === $identifiantAttendu && $motDePasse === $motDePasseAttendu) {
        $_SESSION["identifiant"] = $identifiant;
    } else {
        echo "Identifiant ou mot de passe incorrect.";
    }
}

// Vérification de la session pour afficher le message de bienvenue
if (isset($_SESSION["identifiant"])) {
    $identifiantConnecte = $_SESSION["identifiant"];
    echo "Bienvenue, ".$identifiantConnecte." ! Vous êtes connecté.";
}
?>

    <h1>Formulaire de connexion</h1>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
        <label for="identifiant">Identifiant :</label>
        <input type="text" name="identifiant" id="identifiant" required><br>

        <label for="motDePasse">Mot de passe :</label>
        <input type="password" name="motDePasse" id="motDePasse" required><br>

        <input type="submit" value="Se connecter">
    </form>



Ces exercices couvrent différents aspects de la programmation en PHP et vous aideront à renforcer vos compétences. N'hésitez pas à les modifier ou à en créer de nouveaux pour mieux vous adapter à vos besoins d'apprentissage.







Exercice 5 (poussé):
Créez un fichier CSV contenant une liste de noms et d'adresses e-mail. À l'aide de PHP, lisez le contenu du fichier CSV et affichez-le sous forme de tableau HTML.

<?php
// Chemin vers le fichier CSV
$cheminFichierCSV = "chemin/vers/votre/fichier.csv";

// Lire le contenu du fichier CSV
$contenuCSV = file_get_contents($cheminFichierCSV);

// Convertir le contenu CSV en tableau
$tableauCSV = explode("\n", $contenuCSV);

// Afficher le tableau sous forme de tableau HTML
echo "<table>";
foreach ($tableauCSV as $ligne) {
    echo "<tr>";
    $colonnes = explode(",", $ligne);
    foreach ($colonnes as $colonne) {
        echo "<td>" . $colonne . "</td>";
    }
    echo "</tr>";
}
echo "</table>";
?>





Exercice 7 (après en POO):
Créez une classe PHP représentant un produit. La classe doit avoir des propriétés telles que le nom, le prix et la quantité en stock. Créez ensuite quelques instances de cette classe et affichez leurs informations.
<?php
class Produit {
    public $nom;
    public $prix;
    public $quantiteStock;

    public function __construct($nom, $prix, $quantiteStock) {
        $this->nom = $nom;
        $this->prix = $prix;
        $this->quantiteStock = $quantiteStock;
    }

    public function afficherInformations() {
        echo "Nom du produit : " . $this->nom . "<br>";
        echo "Prix du produit : " . $this->prix . "<br>";
        echo "Quantité en stock : " . $this->quantiteStock . "<br>";
    }
}

// Création d'instances de la classe Produit
$produit1 = new Produit("Ordinateur portable", 999.99, 5);
$produit2 = new Produit("Smartphone", 699.99, 10);

// Affichage des informations des produits
echo "Informations du produit 1 :<br>";
$produit1->afficherInformations();

echo "<br>";

echo "Informations du produit 2 :<br>";
$produit2->afficherInformations();
?>



</body>
</html>