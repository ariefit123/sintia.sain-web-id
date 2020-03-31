<?php
session_start();
// koneksi database -------------------------------------------->
include "config/koneksi.php";
//<--------------------------------------------------------------

if(isset($_POST['email']) && ($_POST['password'])){
   $email = $koneksi->real_escape_string($_POST['email']);
   $password = $koneksi->real_escape_string($_POST['password']);
   $sql = "select * from user where email_user = '$email' AND password = '$password'";
   $result = $koneksi->query($sql) or die('Terjadi Kesalahan : '.$koneksi->error);
 
  if ($result->num_rows == 1){
      $row = $result->fetch_assoc();
      $_SESSION['email_user'] = $row['email_user'];
      $_SESSION['kd_user'] = $row['kd_user'];
      $_SESSION['nama_user'] = $row['nama_user'];

      header("location:index.php");
      
  
  }else{
    ?>
    <script>
      alert ('Email dan Password Salah');
      </script>
    <?php
    header("location:login_penjual.php");
  }
}else{
  //jika tidak menggunakan html5 ( 'required' pada form login )
  //pesan ini akan muncul
  ?>
  
  <script>
    alert ('Tidak Boleh Kosong');
  </script>
  <?php
  header("login.php");
}
?>
