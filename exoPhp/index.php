<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Formulaire</title>
  <style>
    #result {
      display: none;
      margin-top: 20px;
    }
  </style>
</head>
<body>
  <form action="result.php" method="POST">
    <label for="firstName">Prénom:</label>
    <input type="text" name="firstName" required><br>

    <label for="lastName">Nom:</label>
    <input type="text" name="lastName" required><br>

    <label>Sexe:</label><br>
    <input type="radio" name="gender" value="Monsieur" required>
    <label for="male">Monsieur</label><br>
    <input type="radio" name="gender" value="Madame" required>
    <label for="female">Madame</label><br>

    <label for="status">Statut:</label>
    <select name="status" required>
      <option value="étudiant">Étudiant(e)</option>
      <option value="salarié">Salarié(e)</option>
      <option value="à mon compte">À mon compte</option>
      <option value="au chômage">Au chômage</option>
    </select><br>

    <label for="birthdate">Date de naissance:</label>
    <input type="date" name="birthdate" required><br>

    <input type="submit" value="Valider">
  </form>
</body>
</html>
