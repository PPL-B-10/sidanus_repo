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
	<meta charset="UTF-8">
	<title>SiDanus | Reset Password</title>
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
    	<link href="<?php echo base_url().'../assets/css/bootstrap.min.css'; ?>" rel="stylesheet">
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
</head>

<body>
	<section>
  <div class="container">
    <div class="row">
      <div class="col-lg-2"></div>
      <div class="col-lg-8"><h1>Reset Password</h1></div>
    </div>
    <div class="row">

      <div class="col-lg-2">
        
      </div>
      <div class="col-lg-8" style="height:350px;">
        <br>
        <center><form method="post" action="<?php echo base_url().'index.php/akuncontroller/resetpass'; ?>">
          <!-- kalo email gak terdaftar ganti class jadi "input-group has-error" dan aktifin script popover-->
          <div class="input-group">
          <!-- <div class="input-group has-error">   -->
            <label for="resetpassword"></label>Masukkan alamat email anda untuk mereset password<br><br>
            <input class="form-control" type="text" name="email">
          </div><br>

          
          <input type="submit" value="Reset Password" class="btn btn-default">
      </form></center>
      </div>
      <div class="col-lg-2"></div>
    </div>
  </div>
<section>

<?php include("footer.php"); ?>
<a href="#top" id="scrollUp" style="position: fixed; z-index:2147483647; display: block;">
        <i class="fa fa-angle-up"></i>
    </a>

</body>
</html>