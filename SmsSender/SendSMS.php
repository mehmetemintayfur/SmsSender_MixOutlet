<?php
require 'config.php';
?>
<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="utf-8"> 
    <title> Mix Outlet </title>
    <link rel="stylesheet" href="SendSMS.css">
</head>



<body>

<div id="maindiv">
    <div id="baslik"> MESAJ GÖNDER </div> <br>
    <form class="form" id="form3" action="" method="POST">
        <textarea id="msgbox" name="mesaj" rows="4" cols="50"> </textarea>
        <div class="grid-containers"> 
            <div class="slc">
                Erkek Sportive 
                <input type="radio" class="chx" id="ErkekSportive" name="categories" value="ErkekSportive">
            </div>
            <div class="slc">
                Erkek Klasik 
                <input type="radio" class="chx" id="ErkekKlasik" name="categories" value="ErkekKlasik">
            </div>
            <div class="slc">
                Erkek Buyuk Beden 
                <input type="radio" class="chx" id="ErkekBuyukBeden" name="categories" value="ErkekBuyukBeden">
            </div>
            <div class="slc">
                Erkek VIP 
                <input type="radio" class="chx" id="ErkekVIP" name="categories" value="ErkekVIP">
            </div>
            <div class="slc">
                Kadın Sportive
                <input type="radio" class="chx" id="KadinSportive" name="categories" value="KadinSportive">
            </div>
            <div class="slc">
                Kadın Tesettür
                <input type="radio" class="chx" id="KadinTesettur" name="categories" value="KadinTesettur">
            </div>
            <div class="slc">
                Kadın Büyük Beden
                <input type="radio" class="chx" id="KadinBuyukBeden" name="categories" value="KadinTesettur">
            </div>
            <div class="slc">
                Kadın VIP
                <input type="radio" class="chx" id="KadinVIP" name="categories" value="KadinVIP">
            </div>
            <div class="slc">
                Erkek Genel
                <input type="radio" class="chx" id="ErkekGenel" name="categories" value="ErkekGenel">
            </div>
            <div class="slc">
                Kadın Genel
                <input type="radio" class="chx" id="KadinGenel" name="categories" value="KadinGenel">
            </div>
            <div class="slc">
                Kadın Erkek Genel
                <input type="radio" class="chx" id="KadinErkekGenel" name="categories" value="KadinErkekGenel">
            </div>
            <div class="slc">
                Genç Erkek
                <input type="radio" class="chx" id="GencErkek" name="categories" value="GencErkek">
            </div>
            <div class="slc">
                Genç Kadın
                <input type="radio" class="chx" id="GencKadin" name="categories" value="GencKadin">
            </div>
            <div class="slc">
                Genel(Herkes)
                <input type="radio" class="chx" id="Hepsi" name="categories" value="Hepsi">
            </div>
        </div>
        <button name="send" id="send"> Send </button>
    </form>
</div>


</body>

<?php  
$numaralar = array();

if($_POST){
$radioVal = $_POST["categories"];
$mesaj = $_POST["mesaj"];

$stmt = $connect->query("SELECT * FROM musteriler WHERE kategori='$radioVal' ");
while ($row = $stmt->fetch()) {
    echo $row['telefon']."<br />\n";
    array_push($numaralar,$row['telefon']);
}


if(count($numaralar)>0){


for($i=0;$i<count($numaralar);$i++){
    
$curl = curl_init();

$params = [
  'api_id' => '',
  'api_key' => '',
  'sender' => 'SMS TEST',
  'message_type' => 'normal',
  'message' => "'$mesaj'",
  'phones' => [
    "'$numaralar[$i]'"
  ]
];

$curl_options = [
  CURLOPT_URL => 'https://api.vatansms.net/api/v1/1toN',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_SSL_VERIFYPEER => 0,
  CURLOPT_POSTFIELDS => json_encode($params),
  CURLOPT_HTTPHEADER => [
    'Content-Type: application/json'
  ]
];

curl_setopt_array($curl, $curl_options);

$response = curl_exec($curl);

curl_close($curl);

echo $response;
} 
}

else{
    ?> 
     <script type = "text/javascript">  
     alert ("Sectiğiniz kategoride müşteri bulunamamıştır.");         
     </script> 
    <?php
}

sleep(3);
header("location:SendSms.php");

}


?>

<html>