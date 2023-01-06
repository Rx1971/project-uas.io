<?php 
	require 'koneksi.php';
	include $view;
	$lihat = new view($config);
	$toko = $lihat -> toko();
	$hsl = $lihat -> penjualan();
?>
<html>
	<head>
		<title>print</title>
		<link rel="stylesheet" href="assets/css/bootstrap.css">
	</head>
	<body>
		<script>window.print();</script>
		<div class="container">
			<div class="row">
				<div class="col-sm-4"></div>
				<div class="col-sm-4">
					<center>
						<p><?php echo $toko['nama_toko'];?></p>
						<p><?php echo $toko['alamat_toko'];?></p>
						<p>Tanggal : <?php  echo date("j F Y, G:i");?></p>
						<p>Kasir : <?php  echo $_GET['nm_member'];?></p>
					</center>
					<table class="table table-bordered" style="width:100%;" border="1">
						<tr align="center" bgcolor="#3ed38b">
							<td><b>No.</b></td>
							<td><b>Barang</b></td>
							<td><b>Jumlah</b></td>
							<td><b>Total</b></td>
						</tr>
						<?php $no=1; foreach($hsl as $isi){?>
						<tr align="center">
							<td><?php echo $no;?></td>
							<td><?php echo $isi['nama_barang'];?></td>
							<td><?php echo $isi['jumlah'];?></td>
							<td><?php echo $isi['total'];?></td>
						</tr>
						<?php $no++; }?>
					</table>
					<div class="pull-right">
						<?php $hasil = $lihat -> jumlah(); ?>
						<b>Total : Rp.<?php echo number_format($hasil['bayar']);?>,-</b> 
						<br/>
					<b>Bayar : Rp.<?php echo number_format($_GET['bayar']);?>,-</b>
						<br/>
						<b>Kembali : Rp.<?php echo number_format($_GET['kembali']);?>,-</b> 
					</div>
					<div class="clearfix"></div>
					<center>
						<b><p>Terima Kasih Telah berbelanja di toko kami !😊</p></b>
					</center>
				</div>
				<div class="col-sm-4"></div>
			</div>
		</div>
	</body>
</html>
