<?php
session_start();
//konek database
include 'koneksi.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>BlueStore</title>
	<link rel="stylesheet" href="admin/assets/css/bootstrap.css">
</head>
<body>

	<?php include'menu.php'; ?>

	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Daftar Pelanggan</h3>
					</div>
					<div class="panel-body">
						<form method="post" class="form-horizontal">
							<div class="form-group">
								<label class="control-label col-md-3">Nama</label>
								<div class="col-md-7">
									<input type="text" class="form-control" name="nama" required>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3">E-mail</label>
								<div class="col-md-7">
									<input type="text" class="form-control" name="email" required>
									</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3">Password</label>
								<div class="col-md-7">
									<input type="text" class="form-control" name="password" required>
									</div>
								</div>
							<div class="form-group">
								<label class="control-label col-md-3">Telepon</label>
								<div class="col-md-7">
									<input type="text" class="form-control" name="telepon" required>
									</div>
							</div>

							
							<div class="form-group">
								<label class="control-label col-md-3">Username</label>
								<div class="col-md-7">
									<input type="text" class="form-control" name="username" required>
									</div>
							</div>
							
							<div class="form-group">
								<label class="control-label col-md-3">Alamat</label>
								<div class="col-md-7">
									<textarea class="form-control" name="alamat" required></textarea>
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-7 col-md-offset-3">
									<button class="btn btn-primary" name="daftar">Daftar</button>
								</div>
							</div>
						</form>
						<?php 
						if (isset($_POST["daftar"]))
						{
							$nama = $_POST["nama"];
							$email = $_POST["email"];
							$password = $_POST["password"];
							$telepon=$_POST["telepon"];
							$username=$_POST["username"];
							$alamat=$_POST["alamat"];
							
						$ambil=$koneksi->query("SELECT * FROM pelanggan WHERE email_pelanggan='$email'");
						if($yangcocok==1)
						{
							echo "<script> alert ('pendaftaran gagal,e-mail sudah digunakan');</script>";
							echo "<script>location='daftar.php';</script>";
						}
						else
						{
							$koneksi->query("INSERT INTO pelanggan (email_pelanggan,password_pelanggan,nama_pelanggan,telepon_pelanggan,username_pelanggan,alamat_pelanggan) VALUES('$email','$password','$telepon','$username','$alamat')");
							echo "<script> alert ('pendaftaran Sukses,silahkan Login');</script>";
							echo "<script>location='login.php';</script>";
						}
						} 
						?>
			</div>
		</div>
	</div>
</body>
</html>
