<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Exo php</title>
</head>

<body>

    <main>

        <section class=' verif '>
            <div>
                <h2>
                    Exercice 4
                </h2>
                <div>
                    <?php
                    
                   
                    ?>
                    <form action="index.php" method="post">
                        <input type="number" name="chiffre1" value="0">
                        <input type="number" name="chiffre2"  value="0">
                        <input type="submit" value="GO">

                        <?php

                        function addititondesfamilles()
                        {   
                            if (isset($_POST['chiffre1'])) {
                                $a = $_POST['chiffre1'];
                            }else{
                                $a = 0;
                            }
                            if (isset($_POST['chiffre2'])) {
                                $b = $_POST['chiffre2'];
                            }else{
                                $b = 0;
                            }
                            $y = 0;                      
                            
                            $y = $a + $b;
                            echo $y;
                        };

                        print(addititondesfamilles());
                        ?>
                </div>
        </section>















    </main>

</body>

</html>