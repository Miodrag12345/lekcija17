

<?php
require_once "modeli/baza.php";

$rezultat = $baza->query("SELECT * FROM proizvodi ");
$proizvodi=$rezultat->fetch_all(MYSQLI_ASSOC); // da mi ispise logiku rezultate  sa asocijativnim nizom  io varijablom za rezultat su proizvodi kao iz tabele proizvodi

if(session_status()==PHP_SESSION_NONE) {
    session_start();
} // otvorio sam sesiju za logout i login da upisem
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Lista proizvoda</title>
</head>
<body>
<div>
    <nav>
        <a href="index.php">Glavna </a>

        <?php if(isset($_SESSION['ulogovan'])):?> // ako je ulogovan proveri i ispisi referencu koju smo dali logout
            <a href="logout.php">Logout</a
        <?php else: ?>
            <a href="login.php">Login </a>

        <?php endif; ?>


    </nav>
</div>
<?php foreach ($proizvodi as $proizvod): ?>
    <div style="border:1px solid #ccc; padding:10px; margin:10px;">
        <h2><?php echo $proizvod['ime']; ?></h2>
        <p>Opis: <?php echo $proizvod['opis']; ?></p>
        <p>Cena: <?php echo $proizvod['cena']; ?> RSD</p>
        <p>Količina: <?php echo $proizvod['kolicina']; ?></p>

        <?php if($proizvod['kolicina']==0) : ?>
            <p>Nema na stanju</p>

        <?php else: ?>
            <p>Ima na stanju</p>
        <?php endif; ?>


        <a href="proizvod.php?id=<?php echo $proizvod['id']; ?>">Pogledaj proizvod</a>

    </div>
<?php endforeach; ?>

</body>
</html>









