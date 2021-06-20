<?php
    require_once "_connect.php";

    $połaczenie=mysqli_connect($host,$db_user,$db_password,$db_name);

    if(!$połaczenie){
        echo "Error: ".$polaczenie->connect_errno;
    }

    $login=$_SESSION['nazwa_uzytkownika'];
    $sql="SELECT nazwa_uzytkownika FROM uzytkownicy WHERE nazwa_uzytkownika!='$login'";
    $rezultat=$połaczenie->query($sql);

    if($rezultat->num_rows>0){
        echo "<form><select class='form-select' style='max-width:350px' name='dluznik' id='dluznik'>";

        while($wiersz=$rezultat->fetch_assoc()){
            echo "<option>{$wiersz['nazwa_uzytkownika']}</option>";
        };

        echo "</select></form>";
    }else{
        echo "Brak wyników";
    }

    $połaczenie->close();
?>