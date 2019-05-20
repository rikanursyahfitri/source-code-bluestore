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
		<div class="col-md-4 col-md-offset-4">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Login Pelanggan</h3>
				</div>
				<div class="panel-body">
					<form method="post">
						<div class="form-group">
							<label>Email</email>
								<input type="email" class="form-control" name="email">
							</div>
							<div class="form-group">
								<label>Password</label>
								<input type="password" class="form-control" name="password">
							</div>
							<button class="btn btn-primarry" name="login">Login</button>
						</form>
							</div>
				</div>
			</div>
	</div>
</div>

<?php
//jk ada tombol simpan
if (isset($_POST["login"]))
{
	$email=$_POST["email"];
	$password=$_POST["password"];
	//lakukan query cek akun
	$ambil=$koneksi->query("SELECT * FROM pelanggan WHERE email_pelanggan='$email' AND password_pelanggan='$password'");
	//ngitung akun yang termbil
	$akunyangcocok= $ambil->num_rows;

	//jk 1 akun cocok

	if($akunyangcocok==1)
	{
		$akun=$ambil->fetch_assoc();
		$_SESSION["pelanggan"]=$akun;
		echo "<script>alert('login sukses, waktunya belanja');</script>";
		echo "<script>location='checkout.php';</script>";

	}
	else
	{
		//anda gagal
		echo "<script>alert('anda gagal login');</script>";
		echo "<script>location='login.php';</script>";
	}
}
?>


</body>
</html>