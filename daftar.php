<!doctype html>
<html lang="en" class="fullscreen-bg">

<head>
	<title>Daftar Akun Aiska Store</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="admin/assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="admin/assets/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="admin/assets/vendor/linearicons/style.css">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="admin/assets/css/main.css">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="admin/assets/css/demo.css">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="admin/assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<div class="vertical-align-wrap">
			<div class="vertical-align-middle">
				<div class="auth-box ">
					<div class="left">
						<div class="content">
							<div class="header">
								<div class="logo text-center"><img src="images/logo.png" width="70" alt="Klorofil Logo"></div>
								<p class="lead">Daftar Akun Aiska Store</p>
							</div>
							<form class="form-auth-small" action="#" name="form">
                                <div class="form-group">
									<label for="signin-email" class="control-label sr-only">Nama</label>
									<input type="text" name="nama" class="form-control" id="signin-email" placeholder="Nama">
								</div>
								<div class="form-group">
									<label for="signin-email" class="control-label sr-only">Email</label>
									<input type="email" name="email" class="form-control" id="signin-email" placeholder="Email">
								</div>
                                <div class="form-group">
									<label for="signin-email" class="control-label sr-only">Alamat</label>
									<input type="text" name="alamat" class="form-control" id="signin-email" placeholder="Alamat">
								</div>
								<div class="form-group">
									<label for="signin-password" class="control-label sr-only">Buat Password</label>
									<input type="password" name="password" class="form-control" id="signin-password" placeholder="Password">
								</div>
								<button type="submit" name="daftar" value="daftar" class="btn btn-primary btn-lg btn-block">DAFTAR SEKARANG</button>
								<a href="login.php" class="btn btn-success btn-lg btn-block">LOGIN</a>
							</form>
						</div>
					</div>
					<div class="right">
						<div class="overlay"></div>
						<div class="content text">
							<h1 class="heading">APLIKASi E-COMMERCE TOKO AISKA STORE</h1>
							<p>by Sintia</p>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
	<!-- END WRAPPER -->
</body>

</html>

<?php 
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

        $simpan  =  $_POST['daftar'];

        if($simpan){ 
          $query = $koneksi->query ("insert into user (kd_user, nama_user, email_user, alamat_user, password) values ('$kd_user','$nama','$email','$alamat','$password')");
          if($query){
          ?>
             <script type="text/javascript">
              window.alert("Telah di tambahkan data pembeli");
              window.location = "?page=login";
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
        }
        ?>