<?php
require_once "baza.php";

if (!isset($_POST['email']) || empty($_POST['email'])) {
    die("Niste uneli email adresu");
}
if (!isset($_POST['password']) || empty($_POST['password'])) {
    die("Niste uneli sifru");
}



$email = $_POST['email'];
$password = $_POST['password'];
// 1 korak
$rezultat = $baza->query("SELECT * FROM korisnici WHERE email = 'email'");
if ($rezultat->num_rows == 1) {
    $korisnik = $rezultat->fetch_assoc();

    // poredimo sifru koju smo upisali sa sifrom iz forme sa podatkom iz  baze korisnika i tabele
    $verifikovanaSifra = password_verify($password, $korisnik['password']);
    if ($verifikovanaSifra == true) {

        if(session_status() == PHP_SESSION_NONE){
            session_start();
        }
        $_SESSION['ulogovan']=true; // da znamo da li je ulogovan korisnik
        $_SESSION['user_id']=$korisnik['id']; // da izvadimo ID iz baze
        header("Location: ../index.php");
    } else {
        echo "Sifra nije tacna";
    }
} else {
    echo "Korisnik ne postoji";
}
