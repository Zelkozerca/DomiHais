<?php
    session_start();

    if((isset($_SESSION['zalogowany']))&&($_SESSION['zalogowany']==true)){
        header('Location: budzet.php');
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
            if(isset($_SESSION['blad'])) echo $_SESSION['blad'];
        ?>

        <form action="_zaloguj.php" method="post">
            <label class="form-label" for="login">Login</label>
            <input class="form-control" type="text" name="login" id="login"><br/>

            <label class="form-label" fop="haslo">Hasło</label>
            <input class="form-control" type="password" name="haslo" id="haslo"><br/>

            <input class="btn btn-primary" style="width: auto;" type="submit" value="Zaloguj">
        </form><br/>
    </div>

</body>
</html>