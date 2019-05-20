 <div class="jumbotron text-center">
  <h1> DETAIL PEMBELIAN</h1>
</div>
<?php 
$ambil = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan WHERE pembelian.id_pembelian='$_GET[id]'");
$detail=$ambil->fetch_assoc();
 ?>

 <strong><?php echo $detail['nama_pelanggan']; ?></strong><br>
 <p>
 	<?php echo $detail['telepon_pelanggan']; ?><br>
 	<?php echo $detail['email_pelanggan']; ?>
 </p>

 <p>
 	tanggal:<?php echo $detail['tanggal_pembelian']; ?><br>
 	Total: Rp <?php echo number_format( $detail['total_pembelian']); ?>
 </p>

 <table class="table table-bordered">
 	<thead>
 		<tr>
 			<th>No</th>
 			<th>Nama Produk</th>
 			<th>Harga</th>
 			<th>Jumlah</th>
 			<th>Subtotal</th>
 		</tr>
 	</thead>
 	<tbody>
 		<?php $nomor=1; $id = $_GET['id']; ?>
 		<?php $ambil1=$koneksi->query("SELECT * FROM pembelian_produk INNER JOIN produk ON pembelian_produk.id_produk=produk.id_produk WHERE pembelian_produk.id_pembelian='$id'"); ?>
 		<?php while($row = mysqli_fetch_array($ambil))
    			$ambil1[] = $row; ?>
 		<?php foreach($ambil1 as $pecah){  ?>
 		<tr>
 			<td><?php echo $nomor; ?></td>
 			<td><?php echo $pecah['nama_produk']; ?></td>
 			<td> Rp. <?php echo number_format($pecah['harga_produk']); ?></td>
 			<td><?php echo $pecah['jumlah']; ?></td>
 			<td>Rp. <?php echo number_format($pecah['harga_produk'] * $pecah['jumlah']); ?></td>
 		</tr>
 		<?php $nomor++; ?>
  		<?php } ?>
 	</tbody>
 </table>