 <div class="jumbotron text-center">
  <h1> DATA PEMBELIAN</h1>
</div>

<table class="table table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama Pelanggan</th>
			<th>Tanggal</th>
			<th>Total</th>
			<th>Aksi</th>
		</tr>
	</thead>
		<?php $nomor=1; ?>
		<?php $ambil=$koneksi->query("SELECT * FROM pembelian JOIN Pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan"); ?>
		<?php while($pecah=$ambil->fetch_assoc()) { ?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php  echo $pecah['nama_pelanggan']; ?> </td>
			<td><?php  echo $pecah['tanggal_pembelian']; ?></td>
			<td><?php  echo $pecah['total_pembelian']; ?></td>
			<td>
				<a href="index.php?halaman=detail&id=<?php echo $pecah['id_pembelian']; ?>" class="btn btn-info">detail</a>
			 </td>
		</tr>
		<?php $nomor++; ?>
		<?php } ?>
	</tbody>
</table>