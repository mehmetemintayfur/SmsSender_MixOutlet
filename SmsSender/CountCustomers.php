<?php
require 'config.php';
?>
<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="utf-8"> 
    <title> Mix Outlet </title>
    <link rel="stylesheet" href="CountCustomers.css">
</head>



<body>

<div id="maindiv">
    <div id="baslik"> MÜŞTERİ SAYISI </div> <br>
    <table style="width:80%">
        <tr>
            <td>ErkekSportive</td>
            <td> <?php $sql = "SELECT COUNT(*) FROM musteriler WHERE kategori='ErkekSportive' ";
                 $res = $connect->query($sql);
                 $count = $res->fetchColumn();  echo $count; ?> </td>
        </tr>
        <tr>
            <td>Erkek Klasik</td>
            <td> <?php $sql = "SELECT COUNT(*) FROM musteriler WHERE kategori='ErkekKlasik' ";
                 $res = $connect->query($sql);
                 $count = $res->fetchColumn();  echo $count; ?> </td>
        </tr>
        <tr>
            <td>Erkek Büyük Beden</td>
            <td> <?php $sql = "SELECT COUNT(*) FROM musteriler WHERE kategori='ErkekBuyukBeden' ";
                 $res = $connect->query($sql);
                 $count = $res->fetchColumn();  echo $count; ?> </td>
        </tr>
        <tr>
            <td>Erkek VIP</td>
            <td> <?php $sql = "SELECT COUNT(*) FROM musteriler WHERE kategori='ErkekVIP' ";
                 $res = $connect->query($sql);
                 $count = $res->fetchColumn();  echo $count; ?> </td>
        </tr>
        <tr>
            <td>Kadın Sportive</td>
            <td> <?php $sql = "SELECT COUNT(*) FROM musteriler WHERE kategori='KadinSportive' ";
                 $res = $connect->query($sql);
                 $count = $res->fetchColumn();  echo $count; ?> </td>
        </tr>
        <tr>
            <td>Kadın Tesettür</td>
            <td> <?php $sql = "SELECT COUNT(*) FROM musteriler WHERE kategori='KadinTesettur' ";
                 $res = $connect->query($sql);
                 $count = $res->fetchColumn();  echo $count; ?> </td>
        </tr>
        <tr>
            <td>Kadın Büyük Beden</td>
            <td> <?php $sql = "SELECT COUNT(*) FROM musteriler WHERE kategori='KadinBuyukBeden' ";
                 $res = $connect->query($sql);
                 $count = $res->fetchColumn();  echo $count; ?> </td>
        </tr>
        <tr>
            <td>Kadın VIP</td>
            <td> <?php $sql = "SELECT COUNT(*) FROM musteriler WHERE kategori='KadinVIP' ";
                 $res = $connect->query($sql);
                 $count = $res->fetchColumn();  echo $count; ?> </td>
        </tr>
        <tr>
            <td>Erkek Genel</td>
            <td> <?php $sql = "SELECT COUNT(*) FROM musteriler WHERE kategori='ErkekGenel' ";
                 $res = $connect->query($sql);
                 $count = $res->fetchColumn();  echo $count; ?> </td>
        </tr>
        <tr>
            <td>Kadın Genel</td>
            <td> <?php $sql = "SELECT COUNT(*) FROM musteriler WHERE kategori='KadinGenel' ";
                 $res = $connect->query($sql);
                 $count = $res->fetchColumn();  echo $count; ?> </td>
        </tr>
        <tr>
            <td>Kadın Erkek Genel</td>
            <td> <?php $sql = "SELECT COUNT(*) FROM musteriler WHERE kategori='KadinErkekGenel' ";
                 $res = $connect->query($sql);
                 $count = $res->fetchColumn();  echo $count; ?> </td>
        </tr>
        <tr>
            <td>Genç Erkek-Kadın</td>
            <td> <?php $sql = "SELECT COUNT(*) FROM musteriler WHERE kategori='GencErkekKadin' ";
                 $res = $connect->query($sql);
                 $count = $res->fetchColumn();  echo $count; ?> </td>
        </tr>
    </table>


</div>


</body>




<html>