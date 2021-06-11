<?php
    session_start();

    if(!isset($_SESSION['zalogowany'])){
        header('Location: index.php');
        exit();
    }
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DomiHais</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <!-- CSS -->
    <link href="style.css" rel="stylesheet">
</head>
<body>
    <div class="container text-center">
        <h1>DomiHais</h1>

        <?php
            echo "<h2>Witaj ".$_SESSION['nazwa_uzytkownika']."!</h2>";
            echo "<h3 id='reload'>Saldo:<b> ".$_SESSION['saldo_uzytkownika']."</b></h3><br/>";
            echo "<h4>Historia rachunku</h4>";

            require("_historia.php");

            echo "<a class='btn btn-primary' href='dodaj_rachunek.php'>Dodaj rachunek</a> ";
            echo "<a class='btn btn-danger' href='usun_rachunek.php'>Usuń rachunek</a><br/><br/>";

            echo "<a class='btn btn-secondary' href='_logout.php'>Wyloguj</a>";
        ?>
    </div>
</body>
</html>