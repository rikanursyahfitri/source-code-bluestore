 <div class="jumbotron text-center">
  <h1> TAMBAH PRODUK</h1>
</div>

<form class="" method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>Nama</label>
		<input type="text" class="form-control" name="nama">
	</div>

	<div class="form-group">
		<label>Harga (RP)</label>
		<input type="number" class="form-control" name="harga">
	</div>

	<div class="form-group">
		<label>Kategori</label>
		<input type="text" class="form-control" name="kategori">
	</div>

	<div class="form-group">
		<label>Deskripsi</label>
		<textarea class="form-control" name="deskripsi" rows="10"></textarea>
	</div>

	<div class="form-group">
		<label>Foto</label>
		<input type="file" class="form-control" name="foto">
	</div>
	<button class="btn btn-primary" name="Save">Simpan</button>
</form>

<?php
if (isset($_POST['Save']))
{
	$nama=$_FILES['foto']['name'];
	$lokasi=$_FILES['foto']['tmp_name'];
	move_uploaded_file($lokasi, "../foto_produk/".$nama);
	$koneksi->query("INSERT INTO PRODUK
		(nama_produk,harga_produk,kategori_produk,foto_produk,deskripsi_produk)
		VALUES('$_POST[nama]','$_POST[harga]','$_POST[kategori]','$nama','$_POST[deskripsi]')");

	echo "<div class='alert alert-info'>Data Tersimpan</div>";
	echo "<meta http.equiv='refresh' content='1;url=index.php?halaman=produk'>";
}
?>
