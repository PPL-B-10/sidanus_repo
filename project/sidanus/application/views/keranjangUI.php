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
	
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SiDanus | Keranjang Anda</title>
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
	
	<Script type="text/javascript">
		function nambah(tes)
		{
			var temp = document.getElementById("jumlahnya"+tes).value;
			document.getElementById("jumlahnya"+tes).value = ++temp;
		}

		function kurang(tes)
		{
			var temp = document.getElementById("jumlahnya"+tes).value;
			
			if(temp-1 >= 0)
				document.getElementById("jumlahnya"+tes).value = --temp;
		}
	
	</script>
</head><!--/head-->

<body>

	<section id="cart_items">
		<div class="container">
			<div class="row">
				
				<?php 
					if($id == "keranjang")
					{
				?>
					<?php
						$temp = base_url();
							
						$subtotal = 0;
						$total = 0;

						foreach($keranjang as $keranjangnya) 
						{
							foreach($keranjang2 as $keranjangnya2) 
							{
								$total = $keranjangnya2->total;
							}
						}
																		
						echo "<div class='col-sm-12'>";			
							echo "<h3>Keranjang Anda</h3><br>";
							echo "<h4>Detil Belanjaan</h4>";
							echo "<p>Ada $total barang di keranjang Anda.</p>";
							echo "<div class='table-responsive cart_info'>";
								echo "<table class='table table-condensed'>";
									echo "<thead>";
										echo "<tr class='cart_menu'>";
											echo "<td class='description'>Produk</td>";
											echo "<td class='quantity'>Kuantitas</td>";
											echo "<td class='price'>Harga</td>";
											echo "<td class='total'>Total</td>";
											echo "<td></td>";
										echo "</tr>";
									echo "</thead>";
						
							$total=0;
							$temp = base_url();
							$ii = 0;
							foreach ($keranjang as $keranjangnya) {
								$idproduk = $keranjangnya->idProduk;
								$namaproduk = $keranjangnya->namaProduk;
								$subtotal= $keranjangnya->subtotal;
								$harganya = $keranjangnya->harga;
								$jumlahitem = $keranjangnya->jumlahItem;
									
								$total = $total+$subtotal;
								foreach ($keranjang2 as $keranjangnya2) {
								
								}
									echo "<tbody>";
										echo "<tr>";
											echo "<td class='cart_description'>";
												echo "$namaproduk";
											echo "</td>";
											echo "<td class='cart_quantity'>";
												echo"<form method='post' action='$temp/index.php/keranjangcontroller/ubahJumlahItem'>";
													echo"<input type='hidden' name='idnya' value='$idproduk'>";
													echo"<input type='hidden' name='hargaa' value='$harganya'>";
													echo"<input type='button' value='-' onclick='return kurang($ii);'>";
													echo "<input name='jumlahnyaa' size='1' id='jumlahnya$ii' value='$jumlahitem' type='text' readonly>";
													echo"<input type='button' onclick='return nambah($ii);' value='+'>";
													echo"<input type='submit' value='update'><br>";
												echo"</form>";
											echo "</td>";
											echo "<td class='cart_price'>";
												echo "Rp $harganya,-";
											echo "</td>";
											//ada fungsi ngitung dari jumlah x harga
											echo "<td class='cart_total'>";
												echo "Rp $subtotal,-";
											echo "</td>";
											//fungsi buat delete
											echo "<td class='cart_delete'>";
												echo"<form method=post action='$temp/index.php/keranjangcontroller/deleteproduk'><input type='hidden' name='idnya' value=$idproduk><input type=submit value='hapus'></form>";
											echo "</td>";
										echo"</tr>";
										
										
									echo "</tbody>";
								
									$ii++;
							
							}	
							echo"<tr>";
								echo"<td>subtotal</td>";
								echo"<td></td>";
								echo"<td></td>";
								echo"<td>Rp $total,-</td>";
							echo"</tr>";
								echo"</table>";
							echo "</div>";
						echo "</div>";					
										
						echo "<a class='btn btn-default check_out pull-right' href='checkout'>Lanjut ke Pembayaran</a>";
						echo "<a class='btn btn-default update pull-right' href='../../'>Lanjut Berbelanja</a>";
					?>
				<?php } ?>
				
			</div>
		</div>
	</section>

	<?php include("footer.php"); ?>

	<a href="#top" id="scrollUp" style="position: fixed; z-index:2147483647; display: block;">
        <i class="fa fa-angle-up"></i>
    </a>
</body>
</html>