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
    <title>SiDanus | Konfirmasi Pembayaran</title>
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
					<div class="konfirm-pesanan">
						<h3>Konfirmasi Pembayaran</h3><br>
						<form class="form-horizontal" method="post" action="<?php echo base_url().'index.php/transaksicontroller/updateStatusPesanan' ; ?>">
							<div class="form-group">
								<label for="inputEmail" class="col-sm-2 control-label">Email</label>
								<div class="col-sm-4">
									<input type="text" class="form-control" name="emailnya">
								</div>
							</div>
							<div class="form-group">
								<label for="inputNomor" class="col-sm-2 control-label">Nomor pesanan</label>
								<div class="col-sm-4">
									<input type="text" class="form-control" name="nomornya">
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-offset-2 col-sm-4">
									<button type="submit" class="btn btn-default get pull-right" name="submit">Konfirmasi</button>
								</div>
							</div>
							
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
</body>
</html>