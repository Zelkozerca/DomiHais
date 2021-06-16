<?php
    session_start();

    require_once "_connect.php";

    $polaczenie=mysqli_connect($host,$db_user,$db_password,$db_name);

    if($polaczenie->connect_errno!=0){
        echo "Error: ".$polaczenie->connect_errno;
    }else{
        $id=$_POST['id'];

        $login=$_SESSION['nazwa_uzytkownika'];
        $saldo=$_SESSION['saldo_uzytkownika'];

        echo $saldo;
        
        $sql_dane_rachunek="SELECT nazwa_dluznika, kwota_rachunku FROM rachunki WHERE id_rachunku='$id'";

        $rezultat=$polaczenie->query($sql_dane_rachunek);

        //a co jeśli nie ma takiego rachunku?
        $sql="DELETE FROM rachunki WHERE id_rachunku='$id' AND nazwa_placacego='$login'";

        if($rezultat->num_rows>0){
            while($wiersz=$rezultat->fetch_assoc()){
                $dluznik=$wiersz['nazwa_dluznika'];
                $kwota=$wiersz['kwota_rachunku'];                
            }
            
            $sql_placacy_update="UPDATE uzytkownicy SET saldo_uzytkownika='$saldo'-'$kwota' WHERE nazwa_uzytkownika='$login'";
            $sql_dluznik_update="UPDATE uzytkownicy SET saldo_uzytkownika=(SELECT saldo_uzytkownika FROM uzytkownicy WHERE nazwa_uzytkownika='$dluznik')+'$kwota' WHERE nazwa_uzytkownika='$dluznik'";

            if($polaczenie->query($sql_placacy_update)===TRUE){
                echo 'alert("zmieniono saldo placacego")';
                $_SESSION['saldo_uzytkownika']=$saldo-$kwota;
                
                if($polaczenie->query($sql_dluznik_update)===TRUE){
                    echo 'alert("zmieniono saldo dluznika")';

                    if($polaczenie->query($sql)===TRUE){
                        echo 'alert("usunięto")';

                    }else{
                        echo "Error: " . $sql . "<br>" . mysqli_error($polaczenie);
                    }
                }else{
                    echo "Error: " . $sql . "<br>" . mysqli_error($polaczenie);
                }
            }else{
                echo "Error: " . $sql . "<br>" . mysqli_error($polaczenie);
            }
        }echo "0 wyników";

        header('Location: budzet.php');

        $polaczenie->close();
    }
    
?>