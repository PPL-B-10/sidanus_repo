<?php 
	if(!isset($_SESSION["role"]))
	{
		include("header.php");
	}else
	{
		if($_SESSION["role"]=="admin")
		{
			include("header3.php");
		} 
		if($_SESSION["role"]=="penjual")
		{
			include("header2.php");
		} 
	}
	
	function ceknya($idpembelian, $temp)
	{
		$serverdb = "localhost";
		$usernamedb = "k6519841_ppl";
		$passworddb = "testing12345";

		$id_mysql = mysql_connect($serverdb ,$usernamedb,$passworddb);
		$database = mysql_select_db("k6519841_ppl",$id_mysql);
		
		$sql = "SELECT statusPesanan FROM transaksi WHERE idPembelian='$idpembelian'";
		$result = mysql_query($sql);
		$baris = mysql_fetch_array($result);
		
		if($baris[0]==$temp)
		{
			echo"selected";
		}
	
	}
	
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SiDanus | Data Transaksi</title>
    <link href="<?php echo base_url().'/assets/css/bootstrap.min.css'; ?>" rel="stylesheet">
    <link href="<?php echo base_url().'/assets/css/font-awesome.min.css'; ?>" rel="stylesheet">
    <link href="<?php echo base_url().'/assets/css/prettyPhoto.css'; ?>" rel="stylesheet">
    <link href="<?php echo base_url().'/assets/css/price-range.css'; ?>" rel="stylesheet">
    <link href="<?php echo base_url().'/assets/css/animate.css'; ?>" rel="stylesheet">
	<link href="<?php echo base_url().'/assets/css/main.css'; ?>" rel="stylesheet">
	<link href="<?php echo base_url().'/assets/css/responsive.css'; ?>" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <script src="<?php echo base_url().'/assets/js/jquery-1.11.2.min.js'; ?>"></script>
	<script src="<?php echo base_url().'/assets/js/bootstrap.min.js'; ?>"></script>
	<script src="<?php echo base_url().'/assets/js/main.js'; ?>"></script>
	<script src="<?php echo base_url().'/assets/js/modal.js'; ?>"></script>
	<script src="<?php echo base_url().'/assets/js/jquery.scrollUp.min.js'; ?>"></script>
    <script src="<?php echo base_url().'/assets/js/jquery.prettyPhoto.js'; ?>"></script>
    <script src="<?php echo base_url().'/assets/js/photogallery.js'; ?>"></script>  
</head><!--/head-->

<body>
    <section>
        <!-- transaksi -->
        <center>
         <?php
         
         		
			
			
			$temp = base_url();
			 echo"<h3>Data Transaksi</h3><br><br>";
			 echo"<form method=post action='$temp/index.php/transaksicontroller/updatetransaksi'>";
				echo"<table cellspacing=\"0\" width=\"1000\" style=\"text-align:center\">";
				echo"<tr style=\"background-color:gray\"><td>Kode Transaksi</td><td>Nama Produk</td><td>Jumlah Produk</td><td>Total Harga</td><td>Status Pembayaran</td><td>Status Pesanan</td></tr>";
				
				$totalBarang=0;
				$totalHarga=0;
				$totalTransaksi=0;
				$ii=0;
				
				$ttp=0;
				
				$tot = 0;
				$tempo = 0;
				foreach($transaksinya as $transaksinya2) 
				{
					 $idPembelian = $transaksinya2->idPembelian;
					 $idProduk = $transaksinya2->idProduk;
					 $namaProduk = $transaksinya2->namaProduk;
					 $jumlahItem = $transaksinya2->jumlahItem;
					 $subtotal = $transaksinya2->subtotal;
					 $statusbayar = $transaksinya2->statusBayar;
					 $statusPesanan = $transaksinya2->statusPesanan;
					 
					$totalBarang+=$jumlahItem;
					
					$totalHarga+=$subtotal;
					
					
					
			
					if($ii%2==0)
					{
						echo"<tr style=\"background:white\">";
							echo"<td>$idPembelian</td>";
							echo"<td>$namaProduk</td>";
							echo"<td>$jumlahItem</td>";
							echo"<td>$subtotal</td>";
							echo"<td>$statusbayar</td>";
						
						if($idPembelian!= $tempo)
						{
							echo"<td>";
				?>
							
									<select name='statusnya-<?php echo $ttp; ?>'>
										<option <?php ceknya($idPembelian, 'Dalam Proses'); ?> value="Dalam Proses-<?php echo $idPembelian; ?>">Dalam Proses</option>
										<option <?php ceknya($idPembelian, 'Dalam Pengiriman'); ?> value="Dalam Pengiriman-<?php echo $idPembelian; ?>">Dalam Pengiriman</option>
										<option <?php ceknya($idPembelian, 'Selesai'); ?> value="Selesai-<?php echo $idPembelian; ?>"> Selesai</option>
									</select>
					<?php
							echo"</td>";
							$tempo = $idPembelian;
							
							$ttp++;
							$totalTransaksi++;
							$tot++;
						}
						$ii++;
						echo"</tr>";
							
						
					}else
					{
						echo"<tr style=\"background:#D8D8D8\">";
						echo"<td>$idPembelian</td>";
						echo"<td>$namaProduk</td>";
						echo"<td>$jumlahItem</td>";
						echo"<td>$subtotal</td>";
						echo"<td>$statusbayar</td>";
						if($idPembelian!= $tempo)
						{
							echo"<td>";
					?>
							
									<select name='statusnya-<?php echo $ttp; ?>'>
										<option <?php ceknya($idPembelian, 'Dalam Proses'); ?> value="Dalam Proses-<?php echo $idPembelian; ?>">Dalam Proses</option>
										<option <?php ceknya($idPembelian, 'Dalam Pengiriman'); ?> value="Dalam Pengiriman-<?php echo $idPembelian; ?>">Dalam Pengiriman</option>
										<option <?php ceknya($idPembelian, 'Selesai'); ?> value="Selesai-<?php echo $idPembelian; ?>"> Selesai</option>
									</select>
					<?php
							echo"</td>";
							$tempo = $idPembelian;
							
							$ttp++;
							$totalTransaksi++;
							$tot++;
						}
						$ii++;
							echo"</tr>";
							
						
						
					}
					
					
				}	
					echo"<input type=hidden name=total value=$tot>";
					
				echo"<tr style=\"background:#D8D8D8\">";
					echo"<td>Total Transaksi</td>";
					echo"<td colspan=\"4\"></td>";
					echo"<td>$totalTransaksi</td>";
					
				echo"</tr>";
				
				echo"<tr style=\"background:white\">";
					echo"<td>Total Barang</td>";
					echo"<td colspan=\"4\"></td>";
					echo"<td>$totalBarang</td>";
				echo"</tr>";
					
				echo"<tr style=\"background:#D8D8D8\">";
					echo"<td>Total Uang</td>";
					echo"<td colspan=\"4\"></td>";
					echo"<td>$totalHarga</td>";
				echo"</tr>";
				
				echo"<tr style=\"background:white\">";
					echo"<td>Total Transaksi Sukses</td>";
					echo"<td colspan=\"4\"></td>";
					echo"<td>$totalTransaksi</td>";
				echo"</tr>";
				
				echo"<tr><td colspan='6'>";
				echo"<input type='submit' class='btn btn-default' value='Simpan'>";
				echo"</td></tr>";
				echo"</table>";
				echo"</form>";
				
				echo"<br><br>";
				
				
				echo"<br><br><br>";
				
				?>
    </section>



<?php include("footer.php"); ?>

    <a href="#top" id="scrollUp" style="position: fixed; z-index:2147483647; display: block;">
        <i class="fa fa-angle-up"></i>
    </a>

</body>
</html>