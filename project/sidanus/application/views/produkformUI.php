<?php
session_start();
	if(!isset($_SESSION["role"]))
	{
		include("header.php");
	}
	else
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
	
	function getkategori()
	{
		$serverdb = "localhost";
			$usernamedb = "k6519841_ppl";
			$passworddb = "testing12345";
	
			$id_mysql = mysql_connect($serverdb ,$usernamedb,$passworddb);
			$database = mysql_select_db("k6519841_ppl",$id_mysql);
		
		$sql = "SELECT namaKategori FROM kategori";
		$query = mysql_query($sql);
		
		echo"<select name=\"kategori\" class=\"form-control\">";
					
										
		while($baris=mysql_Fetch_array($query))
		{
			echo"<option value='$baris[0]'>$baris[0]</option>";
		}

		echo"</select>";
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SiDanus | Form Produk</title>
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
    <script type="text/javascript">
    	function cek()
    	{
    		var nama = document.getElementsByName("nama")[0].value;
    		var kategori = document.getElementsByName("kategori")[0].value;
    		var stok = document.getElementsByName("stok")[0].value;
    		var harga = document.getElementsByName("harga")[0].value;
    		var deskripsi = document.getElementsByName("deskripsi")[0].value;
    		var spesifikasi = document.getElementsByName("spesifikasi")[0].value;
    		
    		
    		if(nama !== "" && stok != "" && harga !== "" && deskripsi !== "" && spesifikasi !== "")
    		{			
    			alert("Produk berhasil ditambahkan");
    		}
    		else
    		{
    			alert("Data ada yang kosong !");
    			return false;	
    		}
    	}
    </script>
</head><!--/head-->

<body>
	<section>
		<div class="container">
			<div class="row">
				<br><br><br>
				<div class="col-sm-2"></div>
				<div class="col-sm-8">
					<h3>Produk Baru</h3><br>
				</div>
				<div class="col-sm-2"></div>
			</div>
			<div class="row">
				<div class="col-sm-2"></div>
				<div class="col-sm-8">
					<div class="panel panel-success">
						<div class="panel-body">
							<form class="form-horizontal" onSubmit="return cek();" method="post" action="<?php echo base_url().'/index.php/produkcontroller/addproduknya'; ?>"  enctype="multipart/form-data">
								<div class="form-group">
									<label for="inputNama" class="col-sm-4 control-label">Nama Produk</label>
									<div class="col-sm-6">
										<input type="text" name="nama" class="form-control" id="inputNama">
									</div>
								</div>
								<div class="form-group">
									<!--Disini harusnya nama kategori ngambil dari database-->
									<label for="inputKategori" class="col-sm-4 control-label">Kategori</label>
									<div class="col-sm-6">
										<?php getkategori(); ?>
									</div>
								</div>
								<div class="form-group">
									<label for="inputStok" class="col-sm-4 control-label">Jumlah Stok</label>
									<div class="col-sm-6">
										<input type="text" name="stok" class="form-control" id="inputStok">
									</div>
								</div>
								<div class="form-group">
									<label for="inputHarga" class="col-sm-4 control-label">Harga</label>
									<div class="col-sm-6">
										<div class="input-group">
											<div class="input-group-addon">Rp</div>
											<input type="text" class="form-control" id="inputHarga" name="hargaproduk">
											<div class="input-group-addon">,00</div>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label for="inputFoto" class="col-sm-4 control-label">Foto Produk <br> <small>@Max.200kB</small></label>
									<div class="col-sm-6">
										<input type="file" name="userfile" id="file" value=""/>
									</div>
								</div>
								<div class="form-group">
									<label for="inputDetil" class="col-sm-4 control-label">Detil Produk</label>
								</div>
								<div class="form-group">
									<label for="inputDeskripsi" class="col-sm-4 control-label">Deskripsi</label>
									<div class="col-sm-6">
										<textarea name="deskripsi" class="form-control" id="inputDeskripsi" rows="5"></textarea>									</div>
								</div>
								<div class="form-group">
									<label for="inputSpesifikasi" class="col-sm-4 control-label">Spesifikasi</label>
									<div class="col-sm-6">
										<textarea name="spesifikasi" class="form-control" id="inputSpesifikasi" rows="5"></textarea>
									</div>
								</div>
								<br>
								<br>
								<center>
									<!--Nyimpen semua2nya ke database. Gambar yang disimpen di database url nya aja-->
									<input type="submit" class="btn btn-default get" value="Simpan">
									<br>
									<br>
								</center>
							</form>
						</div>
					</div>
				</div>
				<div class="col-sm-2"></div>
			</div>
		</div>
	</section>

	<?php include("footer.php"); ?>

	<a href="#top" id="scrollUp" style="position: fixed; z-index:2147483647; display: block;">
    	<i class="fa fa-angle-up"></i>
	</a>

</body>
</html>