<?php
require 'config.php';
?>
<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="utf-8"> 
    <title> Mix Outlet </title>
    <link rel="stylesheet" href="AddCust.css">
</head>




<body>

<div id="maindiv">
    <div id="baslik"> MÜŞTERİ EKLE</div>
    <form class="form" id="form2" action="" method="POST">  
        <div id="rnd">
        <input type="text" id="isim" name="isim" placeholder="İsim">
        <input type="tel" id="phone" name="phone" pattern="[0-9]{11}" placeholder="Telefon" required>
        </div>
        <div class="grid-containers"> 
            <div class="slc">
                Erkek Sportive 
                <input type="checkbox" class="chx" id="ErkekSportive" name="categories[]" value="ErkekSportive">
            </div>
            <div class="slc">
                Erkek Klasik 
                <input type="checkbox" class="chx" id="ErkekKlasik" name="categories[]" value="ErkekKlasik">
            </div>
            <div class="slc">
                Erkek Büyük Beden 
                <input type="checkbox" class="chx" id="ErkekBuyukBeden" name="categories[]" value="ErkekBuyukBeden">
            </div>
            <div class="slc">
                Erkek VIP 
                <input type="checkbox" class="chx" id="ErkekVIP" name="categories[]" value="ErkekVIP">
            </div>
            <div class="slc">
                Kadın Sportive
                <input type="checkbox" class="chx" id="KadinSportive" name="categories[]" value="KadinSportive">
            </div>
            <div class="slc">
                Kadın Tesettür
                <input type="checkbox" class="chx" id="KadinTesettur" name="categories[]" value="KadinTesettur">
            </div>
            <div class="slc">
                Kadın Büyük Beden
                <input type="checkbox" class="chx" id="KadinBuyukBeden" name="categories[]" value="KadinBuyukBeden">
            </div>
            <div class="slc">
                Kadın VIP
                <input type="checkbox" class="chx" id="KadinVIP" name="categories[]" value="KadinVIP">
            </div>
            <div class="slc">
                Erkek Genel
                <input type="checkbox" class="chx" id="ErkekGenel" name="categories[]" value="ErkekGenel">
            </div>
            <div class="slc">
                Kadın Genel
                <input type="checkbox" class="chx" id="KadinGenel" name="categories[]" value="KadinGenel">
            </div>
            <div class="slc">
                Kadın Erkek Genel
                <input type="checkbox" class="chx" id="KadinErkekGenel" name="categories[]" value="KadinErkekGenel">
            </div>
            <div class="slc">
                Genç Erkek
                <input type="checkbox" class="chx" id="GencErkekKadin" name="categories[]" value="GencErkek">
            </div>
            <div class="slc">
                Genç Kadın
                <input type="checkbox" class="chx" id="GencErkekKadin" name="categories[]" value="GencKadin">
            </div>

        </div>
        <button name="add" id="add"> Ekle </button>
    </form>

</div>



<?php  
if($_POST){

$tel = $_POST["phone"];
$categories = $_POST["categories"];
$isim = $_POST["isim"];

$sql2 = "SELECT COUNT(*) FROM musteriler WHERE telefon=$tel ";
$res2 = $connect->query($sql2);
$count2 = $res2->fetchColumn();


if($count2<1){
        $sorgu2 = $connect->prepare('INSERT INTO tummusteriler SET isim=?,telefon=?');
        $ekle2 = $sorgu2->execute([
        $isim,$tel
        ]);
}


for($i=0;$i<count($categories);$i++){
    $sql = "SELECT COUNT(*) FROM musteriler WHERE kategori='$categories[$i]' and telefon=$tel ";
    $res = $connect->query($sql);
    $count = $res->fetchColumn();
    if($count>=1){
        ?>  <script type = "text/javascript">  
        alert ("Bu müşteri zaten kayıt edilmiş.");         
        </script> 
        <?php
    }

    else{
        $sorgu = $connect->prepare('INSERT INTO musteriler SET isim=?,telefon=?,kategori=?');
        $ekle = $sorgu->execute([
        $isim,$tel,$categories[$i]
     ]);
    }
}






}



?>

</body>


<html>