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
	<title>SiDanus | Daftar Akun</title>
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
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
<body onload='document.form1.text1.focus()'>
	<section>
  <div class="container">
    <div class="row">
      <div class="col-lg-2"></div>
      <div class="col-lg-8">
        <h1>Daftar Akun Toko</h1><br>
      </div>
      <div class="col-lg-2"></div>
    </div>
    <div class="row">
      <div class="col-lg-2"></div>
      <div class="col-lg-8">
        <div class="panel panel-success">
          <div class="panel-heading ">
            <div class="media">
              <br>
              <div class="media-body">
                <h4 class="panel-title">
                  <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                  Verified. Anda anak UI. 
                </h4>
              </div>
              <br>
            </div>
          </div>
          <div class="panel-body">
           
            <form class="form-horizontal" role="form" method="post" action="<?php echo base_url().'index.php/akuncontroller/daftarakunbaru'; ?>">
              <div class="form-group">
                              <br>
                <label class="col-sm-4 control-label">Alamat Email</label>
                <div class="col-sm-6">
                  <input class="form-control" id="email" name="email"type="email">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-4 control-label">Username</label>
                <div class="col-sm-6">
                  <input class="form-control" id="username" name="username"type="text">
                </div>
              </div>
              <div class="form-group">
                <label for="inputPassword" class="col-sm-4 control-label">Password</label>
                <div class="col-sm-6">
                  <input class="form-control" type="password" name="password">
                </div>
              </div>
              <div class="form-group">
                <label for="inputPassword" class="col-sm-4 control-label">Ulang Password</label>
                <div class="col-sm-6">
                  <input class="form-control" type="password" name="ulangpassword">
                </div>
              </div>
              <hr>
              <div class="form-group">
                <label for="namapemilik" class="col-sm-4 control-label">Nama Pemilik Toko</label>
                <div class="col-sm-6">
                  <input class="form-control" type="text" name="namapemilik">
                </div>
              </div>
              <div class="form-group">
                <label for="nohp" class="col-sm-4 control-label">Nomor HP</label>
                <div class="col-sm-6">
                  <input class="form-control" type="text" name="nohp">
                </div>
              </div>
              <div class="form-group">
                <label for="jeniskelamin" class="col-sm-4 control-label">Jenis Kelamin</label>
                <div class="col-sm-1"></div>
                <div class="col-sm-2">
                  <input type="radio" name="sex" value="male">Male
                </div>
                <div class="col-sm-2">
                  <input type="radio" name="sex" value="female">Female
                </div>
                <div class="col-sm-3"></div>
              </div>
              <hr>
              <br>
              <center><p>Dengan klik Daftar, Anda telah menyetujui <a href="<?php echo $temp;?>index.php/homecontroller/showKebijakan">Kebijakan Privasi</a> SiDanus.</p>
                <br>
              <input type="submit" value="Daftar" class="btn btn-default">
                <br><br><br>
            </center>
            </form>
          </div>
        </div>
      </div>
      <div class="col-lg-2"></div>
    </div>
  </div>
</section>

<?php include("footer.php"); ?>
<a href="#top" id="scrollUp" style="position: fixed; z-index:2147483647; display: block;">
        <i class="fa fa-angle-up"></i>
    </a>

</body>
</html>