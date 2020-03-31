<?php 
include "../../config/koneksi.php";
$no_order = $_POST['no_order'];

$sql = $koneksi->query ("update `order` set status='3' where no_order='$no_order'");
if ($sql){
    echo "berhasil";
}else{
    echo "gagal";
}