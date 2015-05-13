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
    <title>SiDanus | Beranda</title>
    <link href="<?php echo base_url().'assets/css/bootstrap.min.css'; ?>" rel="stylesheet">
    <link href="<?php echo base_url().'assets/css/font-awesome.min.css'; ?>" rel="stylesheet">
    <link href="<?php echo base_url().'assets/css/prettyPhoto.css'; ?>" rel="stylesheet">
    <link href="<?php echo base_url().'assets/css/price-range.css'; ?>" rel="stylesheet">
    <link href="<?php echo base_url().'assets/css/animate.css'; ?>" rel="stylesheet">
	<link href="<?php echo base_url().'assets/css/main.css'; ?>" rel="stylesheet">
	<link href="<?php echo base_url().'assets/css/responsive.css'; ?>" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    	
</head><!--/head-->

<body>
	<section id="slider" data-sr="ease-in 50px"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<div class="carousel-inner">
							<div class="item active">
								<div class="col-sm-12">
									<h1><span>Si</span>Danus</h1>
									<h2>Selamat Datang</h2>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
									<!--<button type="button" class="btn btn-default get">Unduh Project Plan</button>-->
								</div>
							</div>
							<div class="item">
								<div class="col-sm-12">
									<h1><span>Si</span>Danus</h1>
									<h2>Ingin punya akun di SiDanus?</h2>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
									<!--<button type="button" class="btn btn-default get">Daftar Sekarang</button>-->
								</div>
							</div>
							
							<div class="item">
								<div class="col-sm-12">
									<h1><span>Si</span>Danus</h1>
									<h2>Produk Berkualitas</h2>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
									<!--<button type="button" class="btn btn-default get">Yuk Belanja</button>-->
								</div>
								<!--<div class="col-sm-6">
									<img src="images/home/girl3.jpg" class="girl img-responsive" alt="" />
									<img src="images/home/pricing.png" class="pricing" alt="" />
								</div>-->
							</div>
							
						</div>
						
						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
					
				</div>
			</div>
		</div>
	</section><!--/slider-->
	
	<section data-sr="ease-in 50px">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div class="features_items"><!--features_items-->
						<h2 class="title">Produk Populer</h2>
						<hr></hr>
						<div class="col-sm-3">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img src="<?php echo base_url().'assets/images/home/product1.jpg'; ?>" class="img-responsive" alt="" />
										<h2>Produk 1</h2>
										<p>Rp123</p>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-3">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img src="<?php echo base_url().'assets/images/home/product2.jpg'; ?>" class="img-responsive" alt="" />
										<h2>Produk 2</h2>
										<p>Rp123</p>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-3">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img src="<?php echo base_url().'assets/images/home/product3.jpg'; ?>" class="img-responsive" alt="" />
										<h2>Produk 3</h2>
										<p>Rp123</p>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-3">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img src="<?php echo base_url().'assets/images/home/product4.jpg'; ?>" class="img-responsive" alt="" />
										<h2>Produk 4</h2>
										<p>Rp123</p>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-3">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img src="<?php echo base_url().'assets/images/home/product5.jpg'; ?>" class="img-responsive" alt="" />
										<h2>Produk 5</h2>
										<p>Rp123</p>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-3">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img src="<?php echo base_url().'assets/images/home/product6.jpg'; ?>" class="img-responsive" alt="" />
										<h2>Produk 6</h2>
										<p>Rp123</p>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-3">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img src="<?php echo base_url().'assets/images/home/product6.jpg'; ?>" class="img-responsive" alt="" />
										<h2>Produk 7</h2>
										<p>Rp123</p>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-3">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img src="<?php echo base_url().'assets/images/home/product6.jpg'; ?>" class="img-responsive" alt="" />
										<h2>Produk 8</h2>
										<p>Rp123</p>
									</div>
								</div>
							</div>
						</div>
					</div><!--features_items-->
					
					<div class="recommended_items">
						<h2 class="title">Kategori Produk</h2>
						<hr></hr>
						<?php	
						$temp = base_url();
						$i=0;
						foreach($kategorinya as $kategori)
						{	
							$idnya = $kategori->idKategori;
							$namanya = $kategori->namaKategori;
								
								echo"<div class='col-sm-2'>";
									echo"<div class='product-image-wrapper'>";
										echo"<div class='single-products'>";
										echo"<div class='category-products text-center'>";
												echo "<img src='$temp/assets/images/kategori/$namanya.png' width=\"60px\" height=\"60px\">";
												echo "<h6><a href='".$temp."index.php/produkcontroller/searchbykategori?idkategori=$idnya'>$namanya</a></h6>";												
											echo"</div>";
										echo"</div>";
									echo"</div>";
								echo"</div>";
						}
					?>
					</div>

				<div class="col-sm-8">
					<div class="top-seller"><!--features_items-->
						<h2 class="title">Top Seller Mingguan</h2>
						<hr></hr>
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img src="assets/images/home/product1.jpg" alt="" /><!--ini ngambil url foto toko harusnya-->
										<h2>Toko 1</h2>
										<!--disini taro fungsi buat ngambil toko top seller urutan pertama-->
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img src="assets/images/home/product2.jpg" alt="" /><!--ini ngambil url foto toko harusnya-->
										<h2>Toko 2</h2>
										<!--disini taro fungsi buat ngambil toko top seller urutan kedua-->
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img src="assets/images/home/product3.jpg" alt="" /><!--ini ngambil url foto toko harusnya-->
										<h2>Toko 3</h2>
										<!--disini taro fungsi buat ngambil toko top seller urutan ketiga-->
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="konfirm-bayar">
						<form method="post" action="<?php echo base_url().'index.php/transaksicontroller/konfirmasipemb'; ?>">
							<button type="submit" class="btn btn-default konfirmasi">Konfirmasi Pembayaran</button>
						</form>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="status-pesanan">
						<h2 class="text-center">Status Pesanan</h2>
						<hr></hr>
						<form method="post" action="<?php echo base_url().'/index.php/transaksicontroller/tampilkanStatusPesanan'; ?>">
							<div class="form-group">
								<input type="text" name="nomor" class="form-control" placeholder="Nomor pesanan">
							</div>
							<div class="form-group">
								<input type="text" name="email" class="form-control" placeholder="Alamat Email">
							</div>
							<button type="submit" name="submit" class="btn btn-default get pull-right">Lihat Status Pesanan</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<?php include("footer.php"); ?>

	<a href="#top" id="scrollUp" style="position: fixed; z-index:2147483647; display: block;">
        <i class="fa fa-angle-up"></i>
    </a>

	<script src="<?php echo base_url().'assets/js/jquery-1.11.2.min.js'; ?>"></script>
	<script src="<?php echo base_url().'assets/js/bootstrap.min.js'; ?>"></script>
	<script src="<?php echo base_url().'assets/js/main.js'; ?>"></script>
	<script src="<?php echo base_url().'assets/js/modal.js'; ?>"></script>
	<script src="<?php echo base_url().'assets/js/jquery.scrollUp.min.js'; ?>"></script>
	<script src="<?php echo base_url().'assets/js/jquery.prettyPhoto.js'; ?>"></script>
    	<script src="<?php echo base_url().'assets/js/photogallery.js'; ?>"></script>
	<script src="<?php echo base_url().'assets/js/scrollReveal.js'; ?>"></script>
	<script src="<?php echo base_url().'assets/js/smoothscroll.js'; ?>"></script>
	<script>

      		window.sr = new scrollReveal();

    	</script>
</body>
</html>