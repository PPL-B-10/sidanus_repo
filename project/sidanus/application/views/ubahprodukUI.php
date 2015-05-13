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
  
  
  
  	function showKategoriDrop2()
  	{
  		$idnya = $_GET['idnya'];
  		$serverdb = "localhost";
		$usernamedb = "k6519841_ppl";
		$passworddb = "testing12345";

		$id_mysql = mysql_connect($serverdb ,$usernamedb,$passworddb);
		$database = mysql_select_db("k6519841_ppl",$id_mysql);

	  	$sql = "SELECT k.namaKategori, p.idKategori FROM produk p,kategori k WHERE p.idProduk='$idnya' AND k.idKategori=p.idKategori";
	  	$hasil = mysql_query($sql);
	  	$baris = mysql_fetch_array($hasil);
	  	
	  	
		$sql2 = "SELECT namaKategori FROM kategori";
	  	$hasil2 = mysql_query($sql2);
	  	while($baris2 = mysql_fetch_array($hasil2))
	  	{
	  		if($baris2[0] == $baris[0])
	  		{
	  			echo "<option value=\"$baris2[0]\" selected>$baris2[0]</option>";
	  		}else
	  		{
	  			echo "<option value=\"$baris2[0]\">$baris2[0]</option>";
	  		}
	  	 	
	  	}
  	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SiDanus | Produk</title>
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
    		
    			
    		alert("Produk berhasil diubah");
    		
    	}
    </script>
</head><!--/head-->

<body>
  <section>


<?php 

foreach($ubahh as $ubahh2)
{

$idProduk = $ubahh2->idProduk ;
	$namaProduk= $ubahh2->namaProduk;
	 $namaKategori= $ubahh2->namaKategori;
	 $stok= $ubahh2->stok;
	 $harga= $ubahh2->harga;
	 $deskripsi= $ubahh2->deskripsi;
	 $spesifikasi = $ubahh2->spesifikasi ;

}

	

?>
  <div class="container">
    <div class="row">
      <br><br><br>
      <div class="col-lg-2"></div>
      <div class="col-lg-8">
        <h1>Produk</h1><br>
      </div>
      <div class="col-lg-2"></div>
    </div>
    <div class="row">
      <div class="col-lg-2"></div>
      <div class="col-lg-8">
        <div class="panel panel-success">
          
          <div class="panel-body">
           
            <form class="form-horizontal" onsubmit="return cek();" method="post" action='<?php echo base_url().'index.php/produkcontroller/ubahproduknyaa'; ?>' enctype="multipart/form-data">
            
              <div class="form-group">
                <br>
                <input type="hidden" value="<?php echo $idProduk; ?>" name="idnyaa">
                <label for="namaproduk" class="col-sm-4 control-label">Nama Produk</label>
                <div class="col-sm-6">
                  <input class="form-control" id="namaproduk" name="nama" value="<?php echo $namaProduk; ?>" type="text">
                </div>
              </div>
              <div class="form-group">
                <label for="namakategori" class="col-sm-4 control-label">Kategori</label>
                <div class="col-sm-6">
                  <select class="form-control" name="namakategori" id="namakategori">
                    <?php showKategoriDrop2(); ?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label for="jumlahstok" class="col-sm-4 control-label">Jumlah Stok</label>
                <div class="col-sm-6">
                  <input class="form-control" type="number" value="<?php echo $stok; ?>" name="jumlahstok" min="0">
                </div>
              </div>
              <div class="form-group">
                <label for="hargaproduk" class="col-sm-4 control-label">Harga</label>
                <div class="col-sm-6">
                  <div class="input-group">
                    <div class="input-group-addon">Rp</div>
                    <input type="text" class="form-control" id="hargaproduk" value="<?php echo $harga; ?>" name="hargaproduk">
                    <div class="input-group-addon">,00</div>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="fotoprofil" class="col-sm-4 control-label">Foto Profil <br> <small>@Max.200kB</small></label>
                <div class="col-sm-6">
                  <input type="file" name="userfile" id="file" value=""/>
               
                  	
                </div>
              </div>
              <div class="form-group">
                <label for="" class="col-sm-4 control-label">Detil Produk</label>
                <div class="col-sm-6">
                </div>
              </div>
              <div class="form-group">
                <label for="deskripsi" class="col-sm-4 control-label">Deskripsi</label>
                <div class="col-sm-6">
                  <textarea class="form-control" name="deskripsi" id="deskripsi" rows="5"><?php echo $deskripsi; ?></textarea>
                </div>
              </div>
              <div class="form-group">
                <label for="spesifikasi" class="col-sm-4 control-label">Spesifikasi</label>
                <div class="col-sm-6">
                  <textarea class="form-control" name="spesifikasi" id="spesifikasi" rows="5"> <?php echo $spesifikasi; ?></textarea>
                </div>
              </div>
              <br>
              <center>
              <input type="submit" value="Simpan" class="btn btn-default get">
                <br>
		<br>
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