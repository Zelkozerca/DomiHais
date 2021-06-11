<?php
    require_once "_connect.php";

    $połaczenie=mysqli_connect($host,$db_user,$db_password,$db_name);

    if(!$połaczenie){
        echo "Error: ".$polaczenie->connect_errno;
    }

    $login=$_SESSION['nazwa_uzytkownika'];
    $sql="SELECT * FROM rachunki WHERE nazwa_placacego='$login' OR nazwa_dluznika='$login'";
    $rezultat=$połaczenie->query($sql);

    if($rezultat->num_rows>0){
        echo "<table class='table table-striped'><tr>
        <th>Id</th>
        <th>Opis</th>
        <th>Kwota</th>
        <th>Opłacający</th>
        <th>Dłużnik</th>
        </tr>";

        while($wiersz=$rezultat->fetch_assoc()){
            echo "<tr>
            <td>{$wiersz['id_rachunku']}</td>
            <td>{$wiersz['opis_rachunku']}</td>
            <td>{$wiersz['kwota_rachunku']}</td>
            <td>{$wiersz['nazwa_placacego']}</td>
            <td>{$wiersz['nazwa_dluznika']}</td>
            </tr>";
        };

        echo "</table>";
    }else{
        echo "Brak wyników";
    }

    $połaczenie->close();
?>