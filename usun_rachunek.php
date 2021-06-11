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

        <form action="_usun_rachunek.php" method="post">

            <label class="form-label" for="id">Id rachunku</label>
            <input class="form-control" type="number" name="id" id="id" step="1"><br/>

            <input class="btn btn-danger" type="submit" value="Usuń rachunek">
        </form><br/>

        <?php        
        echo "<a class='btn btn-secondary' href='index.php'>Powrót</a>";
        ?>
    </div>
</body>
</html>