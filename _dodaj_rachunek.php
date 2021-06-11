<?php
    session_start();

    require_once "_connect.php";

    $polaczenie=mysqli_connect($host,$db_user,$db_password,$db_name);

    if($polaczenie->connect_errno!=0){
        echo "Error: ".$polaczenie->connect_errno;
    }else{
        $opis=$_POST['opis'];
        $kwota=$_POST['kwota'];
        $dluznik=$_POST['dluznik'];

        $login=$_SESSION['nazwa_uzytkownika'];
        $saldo=$_SESSION['saldo_uzytkownika'];

        $opis=htmlentities($login,ENT_QUOTES,"UTF-8");

        $sql="INSERT INTO rachunki (opis_rachunku,kwota_rachunku,nazwa_placacego,nazwa_dluznika)
        VALUES ('$opis','$kwota','$login','$dluznik')";

        $sql_placacy_update="UPDATE uzytkownicy SET saldo_uzytkownika='$saldo'+'$kwota' WHERE nazwa_uzytkownika='$login'";
        $sql_dluznik_update="UPDATE uzytkownicy SET saldo_uzytkownika='$saldo'-'$kwota' WHERE nazwa_uzytkownika='$dluznik'";

        if($polaczenie->query($sql)===TRUE){
            echo 'alert("dodano do bazy")';

            if($polaczenie->query($sql_placacy_update)===TRUE){
                echo 'alert("zmieniono saldo placacego")';
                // $_SESSION['saldo_uzytkownika']=$saldo+$kwota;

                if($polaczenie->query($sql_dluznik_update)===TRUE){
                    echo 'alert("zmieniono saldo dluznika")';
                    $_SESSION['saldo_uzytkownika']=$saldo+$kwota;

                }else{
                    echo "Error: " . $sql . "<br>" . mysqli_error($polaczenie);
                }
            }else{
                echo "Error: " . $sql . "<br>" . mysqli_error($polaczenie);
            }            
        }else{
            echo "Error: " . $sql . "<br>" . mysqli_error($polaczenie);
        }
        
        header('Location: budzet.php');

        $polaczenie->close();
    }
    // $_SESSION['saldo_uzytkownika']=$saldo+$kwota;
?>