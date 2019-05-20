 <div class="jumbotron text-center">
  <h1> UBAH PRODUK</h1>
</div>
<?php
$ambil=$koneksi->query("SELECT * FROM produk WHERE id_produk='$_GET[id]'");
$pecah=$ambil->fetch_assoc();

echo"<pre>";
print_r($pecah);
echo "</pre>";
?>

<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>Nama</label>
		<input type="text" class="form-control" name="nama" value="<?php echo $pecah['nama_produk']; ?>">
	</div>

	<div class="form-group">
		<label>Harga (RP)</label>
		<input type="number" class="form-control" name="harga" value="<?php echo $pecah['harga_produk']; ?>">
	</div>

	<div class="form-group">
		<label>Kategori</label>
		<input type="text" class="form-control" name="kategori" value="<?php echo $pecah['kategori_produk']; ?>">
	</div>

	<div class="form-group">
		<label>Deskripsi</label>
		<textarea class="form-control" name="deskripsi" rows="10">
			<?php echo $pecah['deskripsi_produk']; ?>
		</textarea>
	</div>

	<div class="form-group">
		<label>Foto</label>
		<img src="../foto_produk/<?php echo $pecah['foto_produk'] ?>" width="200">
	</div>
	<div class="form-group">
		<label>Ganti Foto</label>
		<input type="file" name="foto" class="form-control">
	</div>

	<button class="btn btn-primary" name="ubah">Ubah</button>
</form>

<?php 
if (isset($_POST['ubah']))
{
	$namafoto=$_FILES['foto']['name'];
	$lokasifoto=$_FILES['foto']['tmp_name'];
	//diubah
	if (!empty($lokasifoto))
	{
		move_uploaded_file($lokasifoto, "../foto_produk/$namafoto");

		$koneksi->query("UPDATE produk SET nama_produk='$_POST[nama]',harga_produk='$_POST[harga]',kategori_produk='$_POST[kategori]',foto_produk='$namafoto',deskripsi_produk='$_POST[deskripsi]' WHERE id_produk='$_GET[id]'");
	}
		else
		{
		$koneksi->query("UPDATE produk SET nama_produk='$_POST[nama]',harga_produk='$_POST[harga]',kategori_produk='$_POST[kategori]',deskripsi_produk='$_POST[deskripsi]' WHERE id_produk='$_GET[id]'");
		}
		echo "<script>alert('data produk telah diubah');</script>";
		echo "<script>location='index.php?halaman=produk';</script>";
	}
?>

