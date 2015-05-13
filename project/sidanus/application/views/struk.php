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
    			<?php
				$temp = base_url();
				$ii= 0;
				$subtotal = 0;
				$subjumlah =0;
				$ongkir = 0;
				
				foreach($data_transaksi as $transaksinya) 
				{
					$status= $transaksinya->statusPesanan;	
				}
				
				foreach($data_transaksi2 as $transaksinya2) 
				{
					$idPembelian = $transaksinya2->idPembelian;
				}
			?>
    <div class="row">
      <br><br><br>
      <div class="col-lg-2"></div>
      <div class="col-lg-8">
        <div class="panel panel-success">
          <div class="panel-heading ">
            <div class="media">
              <br>
              <div class="media-body">
                <h4 class="panel-title" align="center">
                  <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                  Pesanan sukses dibuat 
                </h4>
              </div>
              <br>
            </div>
          </div>
          <div class="panel-body">

            <div class="row">
              <div class="col-sm-2"></div>
              <div class="col-sm-4">
                <h4>Detil Pesanan</h4>
                <br>
                <strong><p>Nomor Pesanan</p></strong>
                
              </div>
              <div class="col-sm-4">
                <br><br><br>
                <strong><p align="right"><?php echo $idPembelian;?></p></strong>
                
              </div>
            </div>
            <?php
			$ii= 0;
			$subtotal = 0;
			$subjumlah =0;
			$ongkir = 0;
			$totalnya=0;
			echo"<br>";
		            echo"<div class=\"row\">";
		              echo"<div class=\"col-sm-2\"></div>";
		              echo"<div class=\"col-sm-8\">";
		                echo"<table class=\"table table-hover table-condensed\">";
		                  echo"<thead>";
		                    echo"<tr>";
		                      echo"<th>Produk</th>";
		                      echo"<th>Kuantitas</th>";
		                      echo"<th>Harga</th>";
		                    echo"</tr>";
		                  echo"</thead>";
		                  echo"<tbody>";
		                foreach($data_transaksi as $transaksinya) 
				{
					$namaproduk = $transaksinya->namaProduk;
					$jumlah = $transaksinya->jumlahItem;
					$subjumlah = $subjumlah+$jumlah;
					$subnya = $transaksinya->subtotal;
					$subtotal = $subtotal+ $subnya ;
				
					foreach($data_transaksi2 as $transaksinya2) 
					{
				                   
				            $totalnya = $subtotal + $ongkir;
					}
					
						echo"<tr>";
						  echo"<td>$namaproduk </td>";
						  echo"<td>$jumlah</td>";
						  echo"<td align=\"right\">$subnya </td>";
						echo"</tr>";
				}
							
					                    echo"<tr>";
					                      echo"<td>Subtotal</td>";
										  echo"<td align=\"right\" colspan=\"2\">$subtotal</td>";
					                    echo"</tr>";
					                    echo"<tr>";
					                      echo"<td>Biaya Pengiriman</td>";
					                      echo"<td align=\"right\" colspan=\"2\">$ongkir</td>";
					                    echo"</tr>";
					                    echo"<tr>";
					                      echo"<td><strong>Total (tax included)</strong></td>";
					                      echo"<td><strong>$subjumlah</strong></td>";
					                      echo"<td align=\"right\"><strong>$totalnya</strong></td>";
					                    echo"</tr>";
					                  echo"</tbody>";
					                echo"</table>";
					                
					              echo"</div>";
					            echo"</div>";
					          echo"</div>";
					        echo"</div>";
					      echo"</div>";
					      echo"</div>";
			?>
                <!-- keterangan tergantung milih pembayaran -->
                
                <!--<p id="cod" class="text-justify">Anda telah memilih pengiriman dan pembayaran berdasarkan cash on delivery. Pesanan akan dikirimkan 1-5 hari. Kurir kami akan menghubungi anda </p> -->
                <center>
                <p id="transfer" class="text-justify">Silahkan transfer sejumlah Rp <?php echo $totalnya; ?>,. dalam waktu 24 jam untuk menghindari pembatalan. <br>Silahkan periksa email anda untuk nomor rekening tujuan transfer. <br>Anda dapat melacak pesanan anda menggunakan form lacak pada beranda SiDanus.	 </p>
              </div>
            </div>
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