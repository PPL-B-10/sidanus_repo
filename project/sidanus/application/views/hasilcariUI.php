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
    <title>SiDanus | Hasil Pencarian</title>
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
				<h3>Hasil Pencarian</h3><br><br>
				<?php
					if($daftar_cari=="kosong")
					{
						echo"Tidak ada produk yang match dengan keyword yang anda masukkan.<br><br><br>";
					}
					else
					{
						foreach($daftar_cari as $hasil){
							$jumlah = $hasil->jumlah;
							$nama = $hasil->namaProduk;
						}
	
						echo  "$nama $jumlah barang ditemukan <br><br>";
						foreach($daftar_cari as $hasil){
						$id= $hasil->idProduk;
								
							echo"<div class='col-sm-2'>";
								echo"<div class='product-image-wrapper'>";
									echo"<div class='single-products'>";
										echo"<div class='productinfo text-center'>";
											echo"<img src=''><br>";
											echo "<a target='_blank' href='/pplZahra/index.php/produkcontroller/detilproduk/showdetil?idproduk=$id'>".$hasil->namaProduk."</a><Br>";
											echo $hasil->harga;
										echo"</div>";
									echo"</div>";
								echo"</div>";
							echo"</div>";
						}
					}
				?>
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
