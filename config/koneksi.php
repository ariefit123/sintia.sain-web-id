<?php
$koneksi = new mysqli ("sain.web.id","sainw_sintia","Sintia123","sainwebi_sintia");

if ($koneksi->connect_error) {
   // jika terjadi error, matikan proses dengan die() atau exit();
   die('Maaf koneksi gagal: '. $koneksi->connect_error);
}
?>

