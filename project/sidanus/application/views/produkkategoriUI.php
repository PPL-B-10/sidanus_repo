<?php
session_start();
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
    <title>SiDanus | Produk Kategori</title>
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
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<!-- produk by kategori -->
					<?php 
						if($id == "produkbykategori")
						{
					?>	
					
					<h3>
						<?php
							foreach($namakategori as $namakategorinya)
							{
								echo $namakategorinya->namaKategori;
							}
						?>
					</h3>
					<br>
					<br>

					<?php
						$temp = 0;
						foreach($produkbykategori as $produknya)
						{
							$idnya = $produknya->idProduk;
							$namanya = $produknya->namaProduk;
							$harganya = $produknya->harga;
						
							if($temp%4==0)
							{
								echo"<div class='col-sm-3'>";
									echo"<div class='product-image-wrapper'>";
										echo"<div class='single-products'>";
											echo"<div class='productinfo text-center'>";
												echo "<img src=\"\" height=\"200px\"><br><b><u><a href=\"tampilkanProduk/showdetil?idproduk=$idnya\">$namanya</a></u></b><Br>Rp $harganya, -";
											echo"</div>";
										echo"</div>";
									echo"</div>";
								echo"</div>";
								$temp++;
							}
							else
							{
								echo"<div class='col-sm-3'>";
									echo"<div class='product-image-wrapper'>";
										echo"<div class='single-products'>";
											echo"<div class='productinfo text-center'>";
												echo "<img src=\"\" height=\"200px\"><br><b><u><a href=\"tampilkanProduk/showdetil?idproduk=$idnya\">$namanya</a></u></b><Br>Rp $harganya, -";
											echo"</div>";
										echo"</div>";
									echo"</div>";
								echo"</div>";
								$temp++;
							}
						}
					?>
				<?php } ?>
				</div>
			</div>
		</div>
	</section>
		
	<?php include("footer.php"); ?>

    <a href="#top" id="scrollUp" style="position: fixed; z-index:2147483647; display: block;">
        <i class="fa fa-angle-up"></i>
    </a>
</body>
</html>