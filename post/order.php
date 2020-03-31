<?php 
include "../config/koneksi.php";
$no_order   = $_POST['no_order'];
$nama        = $_POST['nama'];
$alamat        = $_POST['alamat'];
$hp        = $_POST['hp'];
$bank        = $_POST['bank'];
$subtotal        = $_POST['subtotal'];

    $query = "SELECT max(kd_alamat) AS last FROM `alamat_kirim`";
    $hasil1 = $koneksi->query($query);
    $data  = $hasil1->fetch_array();
    $lastNoTransaksi = $data['last'];
    $lastNoUrut = substr($lastNoTransaksi, 3, 3);
    $nextNoUrut = $lastNoUrut + 1;
    $kd_alamat = "AM".sprintf('%03s', $nextNoUrut);

$sql = $koneksi->query ("insert into alamat_kirim (kd_alamat, nama_penerima, no_telp, alamat_penerima) values ('$kd_alamat','$nama','$hp','$alamat')");
$sql = $koneksi->query ("update `order` set kd_alamat='$kd_alamat', pembayaran = '$bank', status = '1', total_bayar = '$subtotal' where no_order='$no_order'");
if ($sql){
    echo "berhasil";
}else{
    echo "gagal";
}
?>