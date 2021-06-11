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

        <form action="_dodaj_rachunek.php" method="post">
            <label class="form-label" for="opis">Opis</label>
            <input class="form-control" type="text" name="opis" id="opis"><br/>

            <label class="form-label" for="kwota">Kwota</label>
            <input class="form-control" type="number" name="kwota" id="kwota" min="0" step="any"><br/>

            <label class="form-label" for="dluznik">Dłużnik</label>
            <?php
                require_once "_connect.php";

                $połaczenie=mysqli_connect($host,$db_user,$db_password,$db_name);

                if(!$połaczenie){
                    die("Brak połączenia z bazą: ".mysqli_connect_error());
                }

                $login=$_SESSION['nazwa_uzytkownika'];
                $sql="SELECT nazwa_uzytkownika FROM uzytkownicy WHERE nazwa_uzytkownika!='$login'";
                $rezultat=$połaczenie->query($sql);

                if($rezultat->num_rows>0){
                    echo "<select class='form-select' style='max-width:350px' name='dluznik' id='dluznik'>";

                    while($wiersz=$rezultat->fetch_assoc()){
                        echo "<option>{$wiersz['nazwa_uzytkownika']}</option>";
                    };

                    echo "</select>";
                }else{
                    echo "Brak wyników";
                }

                $połaczenie->close();
            ?><br/>  

            <input class="btn btn-primary" type="submit" value="Dodaj rachunek">
        </form><br/><br/>

        <?php        
        echo "<a class='btn btn-secondary' href='index.php'>Powrót</a>";
        ?>
    </div>
</body>
</html>