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
	
	$temp = base_url();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Review</title>
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<link href="http://soalptn.info/pplZahra/index.php/../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="http://soalptn.info/pplZahra/index.php/../assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="http://soalptn.info/pplZahra/index.php/../assets/css/prettyPhoto.css" rel="stylesheet">
    <link href="http://soalptn.info/pplZahra/index.php/../assets/css/price-range.css" rel="stylesheet">
    <link href="http://soalptn.info/pplZahra/index.php/../assets/css/animate.css" rel="stylesheet">
	<link href="http://soalptn.info/pplZahra/index.php/../assets/css/main.css" rel="stylesheet">
	<link href="http://soalptn.info/pplZahra/index.php/../assets/css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <script src="http://soalptn.info/pplZahra/index.php/../assets/js/jquery-1.11.2.min.js"></script>
	<script src="http://soalptn.info/pplZahra/index.php/../assets/js/bootstrap.min.js"></script>
	<script src="http://soalptn.info/pplZahra/index.php/../assets/js/main.js"></script>
	<script src="http://soalptn.info/pplZahra/index.php/../assets/js/modal.js"></script>
	<script src="http://soalptn.info/pplZahra/index.php/../assets/js/jquery.scrollUp.min.js"></script>
    <script src="http://soalptn.info/pplZahra/index.php/../assets/js/jquery.prettyPhoto.js"></script>
</head>
<body>
  <div class="container">
    <div class="row">
      <br><br><br>
      <div class="col-lg-2">
        
      </div>
      <div class="col-lg-8">
	<h3>Terimakasih Telah Berbelanja dengan SiDanus</h3>
        <p>Silahkan isi testimonial dan beri rate produk</p>

        <br>
	<form class="form-horizontal" method="post" action="<?php echo $temp;?>index.php/produkcontroller/tambahfeedtesti">
	<h4>Produk yang Anda beli</h4>
	<!-- loop per produk yang dibeli-->
	<div class="row">
	<?php
	$total=0;
		$i = 0;
		foreach($dataproduk as $dataproduk) 
		{
			$total++;
			$namaProduk = $dataproduk ->namaProduk ;
			$idProduk = $dataproduk ->idProduk;
			$sender = $dataproduk ->namaPembeli;
			
		?>
		<div class="col-lg-2">
			<!-- url produk-->
			<br>
    			<a href="#">
      				<img class="media-object" src="product2.jpg" height="auto" width="130">
    			</a>
 		</div>
		
		<div class="col-lg-10">
    			<h4><?php echo $namaProduk ; ?></h4>
    			<input type="hidden" name="idProduk-<?php echo $i;?>" value="<?php echo $idProduk; ?>"> 
    			<input type="hidden" name="sender-<?php echo $i;?>" value="<?php echo $sender; ?>"> 
    			<div class="form-group">
			
    				<label for="" class="col-sm-3 control-label">Testimonial Produk</label>
    				<div class="col-sm-8">
      					<textarea class="form-control" rows="3" id="" name="komenproduk-<?php echo $i; ?>"  required></textarea>
    				</div>
  			</div>
			<div class="form-group">
    				<label for="" class="col-sm-3 control-label">Rate</label>
    				<div class="col-sm-3">
      					<input type="number" max="5" min="1" class="form-control" id="" name="rateproduk-<?php echo $i; ?>"  required>
    				</div>
  			</div>
  		</div>
  		
  		<?php $i++;} ?>
		
	</div>
	<hr>
	<!-- akhir loop-->

	<br>
	<h4>Feedback Toko</h4>
	<!-- loop per toko-->
	
	<?php
	$total2 = 0;
	foreach($datatoko as $datatoko) 
	{
		$total2++;
		$j = 0;
		$namaToko = $datatoko->namaToko;
		$idToko = $datatoko->idToko;
		$sender = $datatoko->namaPembeli;
		$idbeli = $datatoko->idPembelian;
	?>
	<div class="row">
		<div class="col-lg-2">
			<!-- url toko-->
			<br>
    			<a href="#">
      				<img class="media-object" src="product2.jpg" height="auto" width="130">
    			</a>
 		</div>
	
	
		<div class="col-lg-10">
    			<h4><?php echo $namaToko; ?></h4>
    			<input type="hidden" name="sender-<?php echo $j;?>" value="<?php echo $sender; ?>"> 
    			<input type="hidden" name="idToko-<?php echo $j; ?>" value="<?php echo $idToko; ?>"> 
    			<input type="hidden" name="idbeli-<?php echo $j; ?>" value="<?php echo $idbeli; ?>"> 
    			<div class="form-group">
			
    				<label for="" class="col-sm-3 control-label">Feedback Toko</label>
    				<div class="col-sm-8">
      					<textarea class="form-control" rows="3" id="" name="komentoko-<?php echo $j; ?>" required></textarea>
    				</div>
  			</div>
  		</div>
	</div>
	
	<?php $j++;} ?>
	<hr>
	<!-- akhir loop-->


	<div class="row">
		<div class="col-lg-8">
			
 		</div>
		<input type="hidden" name="totalproduk" value="<?php echo $total; ?>"> 
		<input type="hidden" name="totaltoko" value="<?php echo $total2; ?>"> 
		<div class="col-lg-4">
    			<input type="submit" class="form-control" id="" name="" value="Simpan">
  		</div>
	</div>
		
	</form>
        
      </div>
    </div>
  </div>

<br><br><br>
</body>


<?php include("footer.php"); ?>

    <a href="#top" id="scrollUp" style="position: fixed; z-index:2147483647; display: block;">
        <i class="fa fa-angle-up"></i>
    </a>
</body>
</html>
