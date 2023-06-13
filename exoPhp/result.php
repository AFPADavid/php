<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Résultat</title>
  <style>
    img {
      max-width: 100%;
      height: auto;
    }
  </style>
</head>
<body>
  <?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérification de la méthode de requête HTTP (POST)
    
    // Récupération des valeurs du formulaire
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $gender = $_POST["gender"];
    $status = $_POST["status"];
    $birthdate = new DateTime($_POST["birthdate"]);

    $today = new DateTime();
    // Calcul de l'âge en utilisant la différence entre la date actuelle et la date de naissance
    
    $age = $today->diff($birthdate)->y;
    // Extraction du mois de naissance et du mois actuel
    $birthMonth = $birthdate->format("n");
    $todayMonth = $today->format("n");
    // Vérification si c'est l'anniversaire de l'utilisateur
    $isBirthday = ($birthMonth == $todayMonth && $birthdate->format("j") == $today->format("j"));

    // Construction du message de salutation
    $greeting = "Bonjour " . $gender . " " . $lastName . " " . $firstName . " (" . $status . ")";
    
    // Construction du message d'âge
    $ageText = "Vous êtes né(e) le " . $birthdate->format("d F Y") . ", vous avez donc " . $age . " ans.";
    
    $birthdayText = "";

    if ($isBirthday) {
      $birthdayText = "Votre anniversaire est aujourd'hui !";
    } else {
      // Calcul du prochain anniversaire
      $nextBirthday = new DateTime($today->format("Y") . "-" . $birthMonth . "-" . $birthdate->format("d"));
      if ($nextBirthday < $today) {
        $nextBirthday->modify("+1 year");
      }
      // Calcul du nombre de jours restants jusqu'à l'anniversaire
      $daysUntilBirthday = $today->diff($nextBirthday)->days;
      $daysText = ($daysUntilBirthday === 1) ? "jour" : "jours";
      $birthdayText = "Votre anniversaire est dans " . $daysUntilBirthday . " " . $daysText . ".";
    }

    // Récupération de l'heure actuelle
    $currentTime = (int)$today->format("G");
    $imageSource = "";

    if ($currentTime >= 8 && $currentTime < 12) {
      $imageSource = "matin.jpg"; // Chemin vers l'image du matin
    } else if ($currentTime >= 12 && $currentTime < 19) {
      $imageSource = "apres-midi.jpg"; // Chemin vers l'image de l'après-midi
    } else {
      $imageSource = "soir-nuit.jpg"; // Chemin vers l'image du soir/nuit
    }
    ?>

    <h2>Résultat:</h2>
    <p><?php echo $greeting; ?></p>
    <p><?php echo $ageText; ?></p>
    <p><?php echo $birthdayText; ?></p>
    <img
 src="<?php echo $imageSource; ?>" alt="Image de fond">
  <?php } ?>
</body>
</html>