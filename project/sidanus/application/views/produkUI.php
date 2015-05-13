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
	
	$temppp = base_url();
	
		?>
	
	
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SiDanus | Keranjang Anda</title>
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

	function submitnya()
	{
	
		var countnya = document.getElementById("count").innerHTML;
		var stok = document.getElementById("stokk").value;
		var temp = document.getElementById("jumlahproduk").value;
		
		var jum = parseInt(temp)+parseInt(countnya);
		
		var idproduk = document.getElementById("idproduk").value;
		
		
			document.getElementById("count").innerHTML= jum;
			document.getElementById("apaa").innerHTML= jum;
			
			if (window.XMLHttpRequest)
			{// code for IE7+, Firefox, Chrome, Opera, Safari
				xmlhttp=new XMLHttpRequest();
			}
			else
			{// code for IE6, IE5
				xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange=function()
			{
				if (xmlhttp.readyState==4 && xmlhttp.status==200)
				{
					
				}
			}
			
			
			var produk = document.getElementById("namaproduknyaa").value;
			var toko = document.getElementById("namanyaa").value;
			var harga = document.getElementById("harganya").value;
			
			var subtotal = parseInt(temp) * parseInt(harga);
			
			xmlhttp.open("POST","<?php echo $temppp; ?>index.php/ajaxcontroller/insertdata",true);
			xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			xmlhttp.send("nama="+produk+"&&toko="+toko+"&&harga="+harga+"&&jumlah="+temp+"&&subtotal="+subtotal+"&&idproduk="+idproduk);
		
			
		
			
	}
	
	function oke()
	{
		window.location.href = '<?php echo $temppp; ?>index.php/keranjangcontroller/tampilkankeranjang';
	
	
	}
	
	function oke2()
	{
		window.location.href = '<?php echo $temppp; ?>';
	
	
	}
	
	
		
		
</script>
</head><!--/head-->

<body>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="container-fluid">
                        <div class="row">
                            <br>
                            <ol class="breadcrumb">
                              <li><a href="#">Home</a></li>
                              <li><a href="#">Kategori</a></li>
                              <li class="active">Nama Produk</li>
                            </ol>
                        </div>

                        <div class="row">
                            <?php 
                                if($id == "detilproduk")
                                {
                            ?>
                                <?php
                                    $temp = base_url();
                                        $idnyaa= $_GET['idproduk'];
                                        
                                        
                                        
                    	$serverdb = "localhost";
			$usernamedb = "k6519841_ppl";
			$passworddb = "testing12345";
	
			$id_mysql = mysql_connect($serverdb ,$usernamedb,$passworddb);
			$database = mysql_select_db("k6519841_ppl",$id_mysql);
					
					$sql="SELECT p.username FROM penjual p, toko t,produk r WHERE t.idToko=p.idToko AND r.idProduk='$idnyaa' AND r.idToko=t.idToko";
					$hasil=mysql_query($sql);
					$baris=mysql_fetch_array($hasil);
                                                                            
                                        foreach($detilnya as $detilnya)
                                        {

                                            $namaproduk = $detilnya->namaProduk;
                                            $harganya = $detilnya->harga;
                                            $deskripsi = $detilnya->deskripsi;
                                            $deskripsi= $detilnya->deskripsi;
	                                    $spesifikasi= $detilnya->spesifikasi;
	                                    $stok= $detilnya->stok;
	                                    $temp = base_url();
                                            echo "<h1>$namaproduk</h1>";
                                                echo "<div class='col-lg-2'>";
                                                echo "<div id='ribbon_wrap'>";
                                                    echo "<div id='ribbon'>";
                                                        echo "<ul id='list' class='list-unstyled'>";
                                                        
                                                            echo "<li><img id='thumbnail' class='img-rounded' class='first' src='$temp/assets/images/$baris[0]/produk/$namaproduk/1.jpg' width='100' height='100'></li>";
                                                             echo "<li><img id='thumbnail' class='img-rounded' class='first' src='$temp/assets/images/$baris[0]/produk/$namaproduk/2.jpg' width='100' height='100'></li>";
                                                             echo "<li><img id='thumbnail' class='img-rounded' class='first' src='$temp/assets/images/produk/$baris[0]/3.jpg' width='100' height='100'></li>";
                                                        echo "</ul>";
                                                    echo "</div>";
                                                echo "</div>";
                                            echo "</div>";

                                            echo "<div class='col-lg-6'>";
                                                echo "<div id='popopen_wrap'>";
                                                    echo "<div id='img_holder'>";
                                                        echo "<img src='$temp/assets/images/$baris[0]/produk/$namaproduk/1.jpg' class='img-rounded' id='maximised' width='320' height='320'>";
                                                    echo "</div>";
                                                echo "</div>";
                                            echo "</div>";

                                                    foreach($namatoko as $namatoko) 
                                                    {
                                                        foreach($idtoko as $idtoko) 
                                                        {
                                                            $namatoko = $namatoko->namaToko;
                                                            $idtoko = $idtoko->idToko;
                                                            echo "<div class='col-lg-3'>";
                                                               echo"<input type=hidden id=namanyaa value=$namatoko>";
                                                               echo"<input type=hidden id=namaproduknyaa value=$namaproduk>";
                                                               echo"<input type=hidden id=harganya value=$harganya>";
                                                                echo"<input type='hidden' id='idproduk' value='$idnyaa'>";
                                                               
                                                                
                                                                    echo "Oleh <a href='".$temp."index.php/tokocontroller/tampilkanToko/?idtoko=$idtoko'>$namatoko</a>";
                                                                    echo "<br>";
                                                                    echo "<span class='glyphicon glyphicon-star' aria-hidden='true'></span><span class='glyphicon glyphicon-star' aria-hidden='true'></span><span class='glyphicon glyphicon-star' aria-hidden='true'></span><span class='glyphicon glyphicon-star' aria-hidden='true'></span><span class='glyphicon glyphicon-star' aria-hidden='true'></span>";
                                                                    echo "<br>";
										echo "<br>";
                                                                    echo "Rp $harganya,-";
                                                                    echo "<br>";
                                                                    echo "Stok : <input type='text' readonly size='1' id='stokk' value='$stok'>";
                                                                    echo "<br>";
										echo "<br>";
                                                                    echo "Jumlah Pembelian <input type='number' name='jumlahproduk' id='jumlahproduk' value='1' min='1' max='50' class='form-control'>";
                                                                    echo "<br>";
										echo "<br>";
                                                                    echo "<button type='submit' onclick='return submitnya();' class='btn btn-default add-to-cart btn-lg' data-toggle='modal' data-target='.bs-example-modal-lg'>Beli<span class='glyphicon glyphicon-shopping-cart' aria-hidden='true'></span></button>";
                                                                    echo "<div class='modal fade bs-example-modal-lg' tabindex='1' role='dialog' aria-labelledby='myLargeModalLabel' aria-hidden='true'>";
                                                                        echo "<div class='modal-dialog'>";
                                                                            echo "<div class='modal-content'>";
                                                                                echo "<div class='modal-header'>";
                                                                                    echo "<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>";
                                                                                    echo "<h4 class='modal-title' id='exampleModalLabel'><span class='glyphicon glyphicon-ok' aria-hidden='true'></span>   $namaproduk berhasil ditambahkan ke Keranjang</h4>";
                                                                                echo "</div>";
                                                                                echo "<div class='modal-body' align='center'>";
                                                                                    echo "<img src='' alt=''>";
                                                                                    echo "Ada <div id='apaa'></div>produk di keranjang";
                                                                                echo "</div>";
                                                                                echo "<div class='modal-footer'>";
                                                                                    echo "<button type='button' class='btn btn-default get' data-dismiss='modal' onclick=\"return oke2();\">Lanjut Berbelanja</button>";
                                                                                    echo "<button type='button' class='btn btn-default add-to-cart' onclick=\"return oke();\">Lanjut ke Keranjang</a></button>";
                                                                                echo "</div>";
                                                                            echo "</div>";
                                                                        echo "</div>";
                                                                    echo "</div>";
                                                                    echo "<br>";
                                                                    echo "<br>";
                                                               
                                                            echo "</div>";       
                                                        }
                                                    }
                                        }
                                ?>  
                            
                        </div>
                                                                    <br>
                                            <div class="category-tab shop-details-tab">
                                                <div class="col-sm-12">
                                                    <ul class="nav nav-tabs" role="tablist">
                                                        <li role="presentation" class="active"><a href="#detilproduk" aria-controls="detilproduk" role="tab" data-toggle="tab">Detil Produk</a></li>
                                                        <li role="presentation"><a href="#testi" aria-controls="testi" role="tab" data-toggle="tab">Testimonial</a></li>
                                                    </ul>
                                                </div>
						
                                            
                                            <div class="tab-content">
                                                <div role="tabpanel" class="tab-pane active" id="detilproduk">
                                                    <div class="panel panel-default">
                                                        <div class="panel-body">
                                                            <h4>Deskripsi</h4>
                                                            <p><?php echo $deskripsi; ?></p>
                                                        </div>
                                                        <div class="panel-body">
                                                            <h4>Spesifikasi</h4>
                                                            <p><?php echo $spesifikasi; ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div role="tabpanel" class="tab-pane" id="testi">
                                                    <div class="panel panel-default">
                                                        <table class="table">
                                                            <tr>
                                                                <th>From</th>
                                                                <th>Testimonial</th>
                                                            </tr>
                                                            
                                                            <?php
                                                                foreach($testi as $testi )
			                                        {
			
			                                            $namapengirim = $testi->namapengirim ;
			                                            $komentar = $testi->komentar ;
                                            			?>
                                            			<tr>
                                                                <td><?php echo  $namapengirim ; ?></td>
                                                                <td><?php echo $komentar; ?></td>
                                                                </tr>
                                                                <?php } ?>
                                                            
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php } ?>
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