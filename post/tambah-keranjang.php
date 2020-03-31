<?php
session_start();
include "../config/koneksi.php";
$kd_produk = $_POST['kd_produk'];
$kd_user = $_SESSION['kd_user'];

$sql = $koneksi->query ("select * from produk where kd_produk='$kd_produk'");
$hasil = $sql->fetch_array();
$harga = $hasil['harga'];
$tgl_order = date('Y-m-d');

$sql2 = $koneksi->query ("select * from `order` where kd_user='$_SESSION[kd_user]' and status='0'");
$cek = $sql2->num_rows;
    
if ($cek == 0){
    $today = date('ymd');
    $query = "SELECT max(no_order) AS last FROM `order` WHERE no_order LIKE '%$today%'";
    $hasil1 = $koneksi->query($query);
    $data  = $hasil1->fetch_array();
    $lastNoTransaksi = $data['last'];
    $lastNoUrut = substr($lastNoTransaksi, 8, 6);
    $nextNoUrut = $lastNoUrut + 1;
    $no_order = "OR".$today.sprintf('%06s', $nextNoUrut);

    $query = $koneksi->query ("insert into `order` (no_order, kd_user, tgl_order, status) values ('$no_order','$kd_user','$tgl_order','0')");
    $query = $koneksi->query ("insert into order_detail (no_order, kd_produk, harga) values ('$no_order','$kd_produk','$harga')");

}else{
    $hasil2 = $sql2->fetch_array();
    $no_order = $hasil2['no_order'];
    $query = $koneksi->query ("insert into order_detail (no_order, kd_produk, harga) values ('$no_order','$kd_produk','$harga')");
}

if($query){
    echo "berhasil";
}else{
    echo "gagal";
}