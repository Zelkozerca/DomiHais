<?php
    session_start();

    if((!isset($_POST['login']))||(!isset($_POST['haslo']))){
        header('Location: index.php');
        exit();
    }

    require_once "_connect.php";

    $polaczenie=@new mysqli($host,$db_user,$db_password,$db_name);

    if($polaczenie->connect_errno!=0){
        echo "Error: ".$polaczenie->connect_errno;
    }else{
        $login=$_POST['login'];
        $haslo=$_POST['haslo'];

        $login=htmlentities($login,ENT_QUOTES,"UTF-8");
        $haslo=htmlentities($haslo,ENT_QUOTES,"UTF-8");

        if($rezultat=@$polaczenie->query(
            sprintf("SELECT * FROM uzytkownicy WHERE nazwa_uzytkownika='%s' AND haslo_uzytkownika='%s'",
            mysqli_real_escape_string($polaczenie,$login),
            mysqli_real_escape_string($polaczenie,$haslo)))){
            $ilu_userow=$rezultat->num_rows;
            if($ilu_userow>0){
                $_SESSION['zalogowany']=true;
                
                $wiersz=$rezultat->fetch_assoc();
                $_SESSION['id_uzytkownika']=$wiersz['id_uzytkownika'];
                $_SESSION['nazwa_uzytkownika']=$wiersz['nazwa_uzytkownika'];
                $_SESSION['saldo_uzytkownika']=$wiersz['saldo_uzytkownika'];

                unset($_SESSION['blad']);
                $rezultat->close();
                header('Location: budzet.php');
            }else{
                $_SESSION['blad']='<span style="color: red">Nieprawidłowy login lub hasło</span>';
                header('Location: index.php');
            }
        }

        $polaczenie->close();
    }
    
?>