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
  
  $temp = base_url();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>SiDanus | Data Pengiriman</title>
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
<body>
  <section>
  <div class="container">
    <div class="row">
      <br><br><br>
      <div class="col-lg-2"></div>
      <div class="col-lg-8"><br><br>
        <ul class="nav nav-tabs nav-justified">
          <li role="presentation" class="active"><a>Step 1: <br> Data Pengiriman</a></li>
          <li role="presentation" class="disabled"><a>Step 2: <br>Pembayaran</a></li>
        </ul>
      </div>
      <div class="col-lg-2"></div>
    </div>
    <div class="row">
      <div class="col-lg-2"></div>
      <div class="col-lg-8">
        <div class="panel panel-default">
          <div class="panel-body">
            <form class="form-horizontal" role="form" method="post" action='<?php echo $temp; ?>index.php/keranjangcontroller/submit'>
              <div class="form-group">
                <br>
                <label class="col-sm-4 control-label">Alamat Email</label>
                <div class="col-sm-6">
                  <input class="form-control" id="email" name="email" type="email">
                </div>
              </div>
              <div class="form-group">
                <label for="nama" class="col-sm-4 control-label">Nama</label>
                <div class="col-sm-6">
                  <input class="form-control" type="text" name="nama">
                </div>
              </div>
              <div class="form-group">
                <label for="alamat" class="col-sm-4 control-label">Alamat</label>
                <div class="col-sm-6">
                  <textarea class="form-control" rows="3" name="alamat"></textarea>
                </div>
              </div>
              <div class="form-group">
                <label for="provinsi" class="col-sm-4 control-label">Provinsi</label>
                <div class="col-sm-6">

                  <select class="form-control" name="provinsi">
                    <option value="DKI Jakarta">DKI Jakarta</option>
                    <option value="Jawa Barat">Jawa Barat</option>
                    <option value="Banten">Banten</option>
                    <option value="Sumatera Barat">Sumatera Barat</option>
                    <option value="Jawa Tengah">Jawa Tengah</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label for="kota" class="col-sm-4 control-label">Kota</label>
                <div class="col-sm-6">
                  <select class="form-control" name="kota">
                    <option value="Jakarta">Jakarta</option>
                    <option value="Bogor">Bogor</option>
                    <option value="Depok">Depok</option>
                    <option value="Tangerang">Tangerang</option>
                    <option value="Bekasi">Bekasi</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label for="kecamatan" class="col-sm-4 control-label">Kecamatan</label>
                <div class="col-sm-6">
                  <select class="form-control" name="kecamatan">
                    <option>Pondok Gede</option>
                    <option>Pondok Cina</option>
                    <option>Pondok Bambu</option>
                    <option>Pondok Ungu</option>
                    <option>Pondok Rawa</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label for="nohp" class="col-sm-4 control-label">Nomor HP</label>
                <div class="col-sm-6">
                  <div class="input-group">
                    <span class="input-group-addon" id="basic-addon1">+62</span>
                    <input class="form-control" type="text" name="nohp" >
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="pilihanpengiriman" class="col-sm-4 control-label">Pilihan Pengiriman</label>
                <div class="col-sm-6">
                  <input type="radio" name="pilihanpengiriman" value="standar">Pengiriman Standar
                  <br>
                  <input type="radio" name="pilihanpengiriman" value="kilat">Pengiriman Kilat
                </div>
              </div>
              
              <br>
              <div align="center">
                <input type="submit" value="Lanjutkan" class="btn btn-default">
              </div>
              <br>
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