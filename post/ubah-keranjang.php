<?php 
include "../config/koneksi.php";
$kd_produk  = $_POST['kd_produk'];
$no_order   = $_POST['no_order'];
$qty        = $_POST['qty'];

$sql = $koneksi->query ("update order_detail set qty='$qty' where no_order='$no_order' and kd_produk='$kd_produk'");
if ($sql){
    echo "berhasil";
}else{
    echo "gagal";
}
?>