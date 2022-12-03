<?php
require 'config.php';
?>
<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="utf-8"> 
    <title> Mix Outlet </title>
    <link rel="stylesheet" href="DeleteCust.css">
</head>




<body>

<div id="maindiv">
    <div id="baslik"> MÜŞTERİ SİL</div>
    <form class="form" id="form2" action="" method="POST">  
        <div id="rnd">
        <input type="tel" id="phone" name="phone" pattern="[0-9]{11}" placeholder="Telefon" required>
        </div>

        <button name="add" id="add"> Sil </button>
    </form>

</div>

</body>

<?php  
if($_POST){

$tel = $_POST["phone"];

$sil = $connect->prepare("DELETE from musteriler WHERE telefon=:telefon");
$sil->execute(array(
    "telefon" => $tel
));

$sil2 = $connect->prepare("DELETE from tummusteriler WHERE telefon=:telefon");
$sil2->execute(array(
    "telefon" => $tel
));

}


?>

<html>