
<?php 
include "config/koneksi.php";
            $query = "SELECT max(kd_user) AS last FROM `user`";
			$hasil1 = $koneksi->query($query);
			$data  = $hasil1->fetch_array();
			$lastNoTransaksi = $data['last'];
			$lastNoUrut = substr($lastNoTransaksi, 3, 3);
			$nextNoUrut = $lastNoUrut + 1;
			$kd_user = "USR".sprintf('%03s', $nextNoUrut);

        $nama         =   $_POST['nama'];
        $email        =   $_POST['email'];
        $alamat            =   $_POST['alamat'];
        $password          =   $_POST['password'];


        if($simpan){ 
          $query = $koneksi->query ("insert into user (kd_user, nama_user, email_user, alamat_user, password) values ('$kd_user','$nama','$email','$alamat','$password')");
          if($query){
          ?>
             <script type="text/javascript">
              window.alert("Telah di tambahkan data pembeli");
              window.location = "login.php";
             </script>
          <?php
          }else{
            ?>
            <script type="text/javascript">
              window.alert("Gagal");
              window.history.go(-1);
             </script>
            <?php
          }
        ?>