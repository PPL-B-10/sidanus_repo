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
  <div class="container">
    <div class="row">
      <br><br><br>
      <div class="col-lg-2"></div>
      <div class="col-lg-8"><br><br>
        <ul class="nav nav-tabs nav-justified">
          <li role="presentation" class="disabled"><a>Step 1: <br> Data Pengiriman</a></li>
          <li role="presentation" class="active"><a>Step 2: <br>Pembayaran</a></li>
        </ul>
      </div>
      <div class="col-lg-2"></div>
    </div>
    <div class="row">
      <div class="col-lg-2"></div>
      <div class="col-lg-8">
        <div class="panel panel-default">
          <div class="panel-body">
            <form method="post" action="<?php echo $temp; ?>index.php/keranjangcontroller/submit2">
              <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                <div class="panel panel-default">
                  <div class="panel-heading" role="tab" id="headingTwo">
                    <label for="cod"  class="radio-inline">
                      <input role="tabpanel" type="radio" name="pilihanpembayaran" value="cod" data-toggle="collapse" data-parent="#accordion" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo" disabled>
                      Cash on Delivery
                    </label>
                  </div>
                  <div id="collapseTwo" class="panel-collapse collapse hidden" role="tabpanel" aria-labelledby="headingTwo">
                    <div class="panel-body">
                      
                    </div>
                  </div>
                </div>
				
				
                <div class="panel panel-default">
                  <div class="panel-heading" role="tab" id="headingOne">
                    <label for="transfer"  class="radio-inline">
                      <input type="radio" name="pilihanpembayaran" value="transfer" data-toggle="collapse" data-parent="#accordion" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                      Bank Transfer
                    </label>
                  </div>
                  <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                    <div class="panel-body">
                      <div class="form-group">
                        <label for="pilihbank" class="col-sm-4 control-label">Pilih Bank</label>
                        <div class="col-sm-6">
                         <select class="form-control" name="bank">
                            <option value="Mandiri">Bank Mandiri</option>
                            <option value="BNI">Bank BNI</option>
                            <option value="BCA">Bank BCA</option>
                            <option value="BRI">Bank BRI</option>
                            <option value="Permata">Bank Permata</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="namarekening" class="col-sm-4 control-label">Nama Pengirim</label>
                        <div class="col-sm-6">
                          <input class="form-control" type="text" name="namarekening" placeholder="nama yang tertera pada rekening">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <br>
              <div align="center">
                <input type="submit" value="Konfirmasi Pesanan" class="btn btn-default">
              </div>
			  </form>
              <br>
            </center>
            </form>
          </div>
        </div>
      </div>
      <div class="col-lg-2"></div>
    </div>
  </div>

<?php include("footer.php"); ?>
<a href="#top" id="scrollUp" style="position: fixed; z-index:2147483647; display: block;">
        <i class="fa fa-angle-up"></i>
    </a>

</body>
</html>