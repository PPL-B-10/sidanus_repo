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
	
	foreach($profiltoko as $profiltokonya) 
	{
		 $namaToko = $profiltokonya->namaToko;
		 
		  $email= $profiltokonya->email;
		 $lokasi= $profiltokonya->lokasi;
		 
	}
	
	foreach($produktoko as $produktokonya) 
	{
		  $idProduk = $produktokonya->idProduk;
		 $namaProduk = $produktokonya->namaProduk;
		 
		 $harga = $produktokonya->harga;
	}
	
	function username()
  	{
  	
  		$serverdb = "localhost";
			$usernamedb = "k6519841_ppl";
			$passworddb = "testing12345";
	
			$id_mysql = mysql_connect($serverdb ,$usernamedb,$passworddb);
			$database = mysql_select_db("k6519841_ppl",$id_mysql);

	  	$id = $_GET['idtoko'];
	  	
		$sql = "SELECT j.username FROM produk p , penjual j WHERE p.idToko ='$id' AND  p.idToko = j.idToko";
	  	$hasil = mysql_query($sql);
	  	$baris = mysql_fetch_array($hasil);
	  	 return $baris[0];
  	}
  	
  	function getuser()
  	{
  		$serverdb = "localhost";
			$usernamedb = "k6519841_ppl";
			$passworddb = "testing12345";
	
			$id_mysql = mysql_connect($serverdb ,$usernamedb,$passworddb);
			$database = mysql_select_db("k6519841_ppl",$id_mysql);

	  	$id = $_GET['idtoko'];
	  	
		$sql = "SELECT j.username FROM penjual j, toko t WHERE t.idToko ='$id' AND  t.idToko = j.idToko";
	  	$hasil = mysql_query($sql);
	  	$baris = mysql_fetch_array($hasil);
	  	
  		return $baris[0]."/avatar/".$baris[0];
  	}
	
	function getuser2()
  	{
  		$serverdb = "localhost";
			$usernamedb = "k6519841_ppl";
			$passworddb = "testing12345";
	
			$id_mysql = mysql_connect($serverdb ,$usernamedb,$passworddb);
			$database = mysql_select_db("k6519841_ppl",$id_mysql);

	  	$id = $_GET['idtoko'];
	  	
		$sql = "SELECT j.username FROM penjual j, toko t WHERE t.idToko ='$id' AND  t.idToko = j.idToko";
	  	$hasil = mysql_query($sql);
	  	$baris = mysql_fetch_array($hasil);
	  	
  		return $baris[0];
  	}
  	
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>SiDanus | <?php echo $namaToko; ?></title>
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<title>SiDanus | Toko</title>
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
    
    </script>
    <script type="text/javascript">
      function ConfirmDelete(tes,tes2)
      {
      	    //var nama = document.getElementById("namanyaa").value;
            if (confirm("Hapus Produk Ini ?"))
                 location.href='<?php echo base_url(); ?>/index.php/produkcontroller/deleteProduk/?idnya='+tes;
      }
      
      function editt(tes)
      {
      	location.href='<?php echo base_url(); ?>/index.php/produkcontroller/editProduk/?idnya='+tes;
      }
      
  </script>
</head>
<body>

<section>
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="container-fluid">
          <div class="row">
		<br>
            <ol class="breadcrumb">
              <li><a href="#">Home</a></li>
              <li><a href="#">Toko</a></li>
              <li class="active">Nama Toko</li>
            </ol>
          </div>
          <div class="row">
            <h1>Profil Toko</h1>
          </div>
          <div class="row">
            <div class="col-lg-5">
			
			<?php
			
				$temp = base_url();
				$temp2 = getuser();
				$temp3 = getuser2();
				$filename='admin.jpg';
				
					if (file_exists('assets/images/'.$temp3.'/avatar/'.$filename) == 1) {
						echo"<img src='$temp/assets/images/$temp2.jpg' class='img-rounded' width='320' height='320'>";
					}else{
						echo"<img src='$temp/assets/images/user.png' class='img-rounded' width='320' height='320'>";
					}
              
                ?>
            </div>
            
            <div class="col-lg-1"></div>
            
            <div class="col-lg-5">
              <!-- brbrbrbr dibawah ini di offin kalo session login penjualnya ada terus diganti sama button dibawah ini-->
              
              <!-- kalo session aktif -->
              	<br><br>
		<?php
			$temp=0;
			$tempp = base_url();
			  foreach($profiltoko as $profiltokonya) 
			  {			  
					  //<!-- matiin buttonnya kalo gak ada session loginnya -->
					  
					  if(isset($_SESSION["role"]))
					  {
					  	 $role = $_SESSION["role"];
					  	 $user = $_SESSION["user"];
					  	 if($role=="penjual" && $user==username())
					  	 {
					  	 	echo"<center>";
						  	 	echo"<button class='btn btn-default get' onclick=\"window.location.href='$tempp/index.php/produkcontroller/addproduk/'\">Tambah produk</button>";
						  	 	
						  	 			echo"<button class='btn btn-default get' onclick=\"window.location.href='$tempp/index.php/tokocontroller/ubahprofiltoko/?i=ubah'\">Edit Profil</button>";
							echo"</center>";
							
							
					  	 }
					  	 
					  
					  
					  }else
					  {
					  
					  
					  }
			}			  
		?>
              

              <!--<br><br> -->
              <!-- end of session aktif -->
              <br><br>
              <table class="table table-bordered">
                <tr>
                  <td align="right">Nama Toko</td>
                  <td><?php echo $namaToko; ?></td>
                </tr>
                <tr>
                  <td align="right">Lokasi Penjual</td>
                  <td><?php echo  $lokasi; ?></td>
                </tr>
                <tr>
                  <td align="right">Kontak Penjual</td>
                  <td><a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></td>
                </tr>
                <tr>
                  <td align="right">Rating Toko</td>
                  <td><!-- ceritanya rating -->
                  <span class="glyphicon glyphicon-star" aria-hidden="true"></span><span class="glyphicon glyphicon-star" aria-hidden="true"></span><span class="glyphicon glyphicon-star" aria-hidden="true"></span><span class="glyphicon glyphicon-star" aria-hidden="true"></span><span class="glyphicon glyphicon-star" aria-hidden="true"></span></td>
                </tr>
              </table>
              
            </div>
          </div>
          <div class="row">
            <br><br>

            <div class="category-tab shop-details-tab">
              <!-- Nav tabs -->
              <ul class="nav nav-tabs" role="tablist" style="margin: 0 0 0">
                <li role="presentation" class="active"><a href="#produk" aria-controls="produk" role="tab" data-toggle="tab">Produk</a></li>
                <li role="presentation"><a href="#feedback" aria-controls="feedback" role="tab" data-toggle="tab">Feedback</a></li>
              </ul>

              <!-- Tab panes -->
              <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="produk">
                  <div class="panel panel-default">
                    <div class="panel-body" style="height:650px;overflow-y: scroll;">
					
					
					
			<?php
			$temp=0;
			$idnyaa= $_GET['idtoko'];
                        $serverdb = "localhost";
			$usernamedb = "k6519841_ppl";
			$passworddb = "testing12345";
	
			$id_mysql = mysql_connect($serverdb ,$usernamedb,$passworddb);
			$database = mysql_select_db("k6519841_ppl",$id_mysql);
			
			$sql="SELECT p.username FROM penjual p, toko t,produk r WHERE t.idToko=p.idToko AND r.idToko='$idnyaa' AND r.idToko=t.idToko";
			$hasil=mysql_query($sql);
			$baris=mysql_fetch_array($hasil);
			
			  foreach($produktoko as $produktokonya) 
			  {
				  $temp = base_url();
				 $idProduk = $produktokonya->idProduk;
				 $namaProduk = $produktokonya->namaProduk;
				 
				 $harga = $produktokonya->harga;
				
				  echo"<div class='col-sm-3 col-md-2'>";
					echo"<div class='thumbnail' id='show-image'>";
					  echo"<img src='$temp/assets/images/$baris[0]/produk/$namaProduk/1.jpg'>";
					  
					  //<!-- matiin buttonnya kalo gak ada session loginnya -->
					  
					 
					  if(isset($_SESSION["role"]))
					  {
					  	 $role = $_SESSION["role"];
					  	 $user = $_SESSION["user"];
					  	 if($role=="penjual" && $user==username())
					  	 {
					  	 	echo"<button type='button' id='editproduk' onclick='editt($idProduk)' class='form-control btn btn-default' aria-label='Left Align'>";
							echo"<span class='glyphicon glyphicon-pencil' aria-hidden='true'></span>";
						  	echo"</button>";
						  
						  //<!-- data whatever itu buat nilai produk yang mau dihapus -->
						  	 
							  echo"<button onclick='ConfirmDelete($idProduk)' id='hapusproduk' class='form-control btn btn-danger' aria-label='Left Align'>";
								echo"<span class='glyphicon glyphicon-trash' aria-hidden='true' data-toggle='modal' data-target='#exampleModal' data-whatever='Produk1'></span>";
								
							  echo"</button>";
					  	 
					  	 }
					  	 
					  
					  
					  }else
					  {
					  
					  
					  }
					 
					  $tempp = base_url();
					  echo"<div class='caption'>";
						echo"<p class='text-center'>";
						  echo"<a href='$tempp/index.php/produkcontroller/tampilkanProduk/showdetil?idproduk=$idProduk'>$namaProduk </a><br>";
						 
						  
						  echo"Rp $harga,.";
						  
						echo"</p>";
					  echo"</div>";
					echo"</div>";
				  echo"</div>";
			  }
								  
								  
			 ?>
			 
			 
                      
                      <!-- dst -->


                      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              <h4 class="modal-title" id="exampleModalLabel">Hapus Produk</h4>
                            </div>
                            <div class="modal-body">
                              <form>
                                <div class="form-group">
                                  <p class="text-center">Nama Produk</p>
                                  <input type="hidden" class="form-control" id="produkyangdihapus">
                                </div>
                              </form>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                              <button type="submit" class="btn btn-danger">Ya</button>
                            </div>
                          </div>
                        </div>
                      </div>
                      <script>
                        $('#exampleModal').on('show.bs.modal', function (event) {
                          var button = $(event.relatedTarget) // Button that triggered the modal
                          var recipient = button.data('whatever') // Extract info from data-* attributes
                          // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
                          // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
                          var modal = $(this)
                          modal.find('.modal-body p').text('Apakah anda yakin akan menghapus ' + recipient+'?')
                          modal.find('.modal-body input').val(recipient)
                        })
                      </script>
                    </div>      
                  </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="feedback" >
                 <!--  <div class="container">
                    <div class="row">
                      <div class="col-lg-7"> -->
                        <div class="panel panel-default" style="height:650px;overflow-y: scroll;">
                          <!-- Belum Ada Feedback -->
                          <!-- <center><br><br><p>Belum Ada Feedback</p></center> -->

                          <!-- Table -->
                          <table class="table">
                            <tr>
                              <th>From</th>
                              <th>Feedback</th>
                            </tr>
                            
                              <?php
                                foreach($testi as $testi )
                                {

                                    $namapengirim = $testi->namapengirim ;
                                    $komentar = $testi->komentar ;
            			?>
            				<tr>
	                                <td><?php echo $namapengirim ; ?></td>
	                                <td><?php echo $komentar; ?></td>
                                	</tr>
                                <?php } ?>
                            
                          </table>
                        </div>
                      <!-- </div>
                      
                    </div>
                  </div> -->
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-1"></div>
    </div>
  </div>
</section>


			
			 
			
	
	
<?php include("footer.php"); ?>
<a href="#top" id="scrollUp" style="position: fixed; z-index:2147483647; display: block;">
        <i class="fa fa-angle-up"></i>
    </a>

</body>
</html>