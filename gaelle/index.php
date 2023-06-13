<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercices de PHP</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>

    <?php
        echo "<h1 class='text-center bg-info p-4'> Exercices PHP </h1>";

// Question 1 :
        echo "<div class='container mt-5 mb-4 bg-light'><h3 class='lead'>Question 1 :</h3>Créez un fichier PHP nommé 'index.php'. À l'intérieur de ce fichier, écrivez un programme qui affiche la phrase 'Bonjour, monde !' à l'aide de la fonction 'echo'. Une autre avec la fonction print. Expliquez la différence. Ajouter du HTML dans cet affichage.</div>";

        // echo permet d'afficher une chaîne de caractères, et accepte plusieurs arguments et ne retourne aucune valeur
        echo "<h2 class='text-center'>Hello World</h2>";

        // print permet d'afficher une chaîne de caractères, n'accepte qu'un seul argument et retourne toujours 1
        print "<h2 class='mb-4 text-center'>Bonjour, Monde</h2>";

// Question 2 :
        echo "<hr><div class='container mb-4 bg-light'><h3 class='lead'>Question 2 :</h3>Créez un formulaire HTML contenant un champ de texte. Lorsque le formulaire est soumis, récupérez la valeur saisie dans le champ de texte et affichez-la à l'aide de PHP.</div>";

        echo "  <form method='POST' action='index.php'>
                    <div class='text-center mb-3'>
                        <label for='firstname'>Prénom</label>
                        <input type='text' name='prenom' id='firstname'>
                    </div>
                    <div class='text-center mb-4'>
                        <input type='submit' value='envoyer'>
                    </div>
                </form>";

        if(isset($_POST ['prenom'])){
            $firstname = $_POST['prenom'] ;
            echo "<div class='text-center mb-3'><h4>Bonjour $firstname</h4></div>";
        }


// Question 3 :
        echo "<hr><div class='container mb-4 bg-light'><h3 class='lead'>Question 3 :</h3>Créez un tableau PHP contenant les noms de cinq personnes. Parcourez le tableau à l'aide d'une boucle et affichez chaque nom sur une nouvelle ligne.</div>";

        $personnes = ["Geri", "Victoria", "Mel", "Melanie", "Emma"];

    // 1ère méthode :   
        // for ($i=0 ; $i<5 ; $i++) {
        //     echo "- " . $personnes[$i] . "\n";
        // };
        
    // 2ème méthode plus simple :
        foreach ($personnes as $personne) {
            echo "<div class='text-center'>$personne \n </div>";
        }


// Question 4 :
        echo "<hr><div class='container mb-4 bg-light'><h3 class='lead'>Question 4 :</h3>Créez une fonction PHP qui prend deux nombres en paramètres et retourne leur somme. Appelez ensuite cette fonction avec différentes valeurs et affichez le résultat (vous pouvez faire les autres opérations).</div>";

        echo "  <form method='POST' action='index.php'>
            <div class='text-center mb-3'>
                <label for='number1'>Nombre 1</label>
                <input type='text' name='number1' id='number1'>
            </div>
            <div class='text-center mb-3'>
                <span> + </span>
            </div>
            <div class='text-center mb-3'>
                <label for='number2'>Nombre 2</label>
                <input type='text' name='number2' id='number2'>
            </div>
            <div class='text-center mb-4'>
                <input type='submit' value='envoyer'>
            </div>
        </form>";

        if(isset($_POST ['number1']) && isset($_POST ['number2'])){
            $number1 = $_POST['number1'] ;
            $number2 = $_POST['number2'] ;
            $addition = $number1 + $number2;
            echo "<div class='text-center mb-3'><h4>Résultat : $number1 + $number2 = $addition</h4></div>";
        }
    ?>

<!-- Question 5 : -->
        <hr><div class='container mb-4 bg-light'><h3 class='lead'>Question 5 :</h3>Créez un script PHP qui génère un nombre aléatoire entre 1 et 10. Demandez ensuite à l'utilisateur de deviner le nombre généré. Affichez un message indiquant si la devinette est correcte ou non.</div>

        <form method='POST' action='index.php'>
            <div class='text-center mb-3'>
                <label for='chiffre'>Devinez un chiffre entre 1 et 10 :</label>
                <input type='text' name='chiffre' id='chiffre'>
            </div>
            <div class='text-center mb-4'>
                <input type='submit' value="j'ai deviné ?">
            </div>
        </form>

    <?php
        $devinette = rand(0, 10); 
        // tests si ça s'affiche et connaître le type
        // echo $devinette ;
        // var_dump($devinette);

        if(isset($_POST ['chiffre'])){
            //je change le type de chiffre en INT pour pouvoir le comparer à devinette
            $chiffre = (int)$_POST['chiffre'];
        }
        // tests
        // echo $chiffre;
        // var_dump($chiffre);

        if(isset($_POST ['chiffre'])){

            if ($chiffre === $devinette) {
                echo "<div class='text-center mb-3'><h4>BRAVO ! Vous avez deviné le chiffre $devinette</h4></div>";
            } else {
                echo "<div class='text-center mb-3'><h4>PERDU. Il fallait deviner le chiffre $devinette</h4></div>";
            }
        }
    ?>


<!-- Question 8 : -->
    <?PHP
        echo "<hr><div class='container mb-4 bg-light'><h3 class='lead'>Question 8 :</h3>Créez un script PHP qui récupère la date et l'heure actuelles et les affiche dans un format lisible pour les humains, par exemple 'Mardi 31 mai 2023, 14:30'..</div>";      
        
        setlocale(LC_TIME, ['fr', 'fra','fr_FR']);
        date_default_timezone_set('Europe/Paris');
        
        // $fmt = datefmt_create(
        //     'fr_FR',
        //     IntlDateFormatter::FULL,
        //     IntlDateFormatter::FULL,
        //     IntlDateFormatter::GREGORIAN
        // );

        $today = date ("l d M Y, H:i");
        echo "<div class='text-center'>Date, Heure : <span class='fw-bold'>$today</span> </div>";

        // Date en français
        $jour = getdate();
        // print_r(getdate());

        $semaine = [" Dimanche "," Lundi "," Mardi "," Mercredi "," Jeudi ",
        " vendredi "," samedi "];

        $mois =[1=>" janvier "," février "," mars "," avril "," mai "," juin ",
        " juillet "," août "," septembre "," octobre "," novembre "," décembre "];

        // Avec getdate()
        // echo "Français : Avec getdate() : Aujourd'hui ", $semaine[$jour['wday']]
        // ,$jour['mday'], $mois[$jour['mon']], $jour['year'],"<br>";

        // Avec date()
        echo "<div class='text-center mb-5'>Français - Date, Heure : ", "<span class='fw-bold'>",
        $semaine[date('w')] ," ",date('j'),"", $mois[date('n')], date('Y'),", ",date('H:i'),"</span></div>";

    ?>

<!-- Bootsrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>


