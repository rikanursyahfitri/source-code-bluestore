 <div class="jumbotron text-center">
  <h1> DATA produk</h1>
</div>

<table class="table table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama</th>
			<th>Harga</th>
			<th>Kategori</th>
			<th>Foto</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1; ?>
		<?php $ambil=$koneksi->query("SELECT * FROM produk"); ?>
		<?php while($pecah = $ambil->fetch_assoc()){ ?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah['nama_produk']; ?></td>
			<td><?php echo $pecah['harga_produk']; ?></td>
			<td><?php echo $pecah['kategori_produk']; ?></td>
			<td>
				<img src=". ./foto_produk/ <?php echo $pecah['foto_produk']; ?>" width="100">

			 </td>
			<td>
				<a href="index.php?halaman=hapusproduk&id=<?php echo $pecah['id_produk'];?>" class="glyphicon glyphicon-trash">hapus</a>
				<a href="index.php?halaman=ubahproduk&id=<?php echo $pecah['id_produk'];?>" class="glyphicon glyphicon-edit">ubah</a>
			</td>
		</tr>
		<?php $nomor++; ?>
		<?php } ?>

	</tbody>
</table>

 <a href="index.php?halaman=tambahproduk" class="glyphicon glyphicon-file">Tambah</a>