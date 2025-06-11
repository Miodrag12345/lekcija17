<?php


require_once "modeli/baza.php";

$proizvodi = $baza->query("SELECT * FROM proizvodi ");


?>