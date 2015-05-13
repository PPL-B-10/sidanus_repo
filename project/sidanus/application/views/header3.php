<?php
	function showKategoriDrop()
  	{
  		include("connectdb.php");

	  
		$sql = "SELECT namaKategori FROM kategori";
	  	$hasil = mysql_query($sql);
	  	while($baris = mysql_fetch_array($hasil))
	  	{
	  	 	echo "<option id=\"$baris[0]\">$baris[0]</option>";
	  	}
  	}
  	
  	function getcart()
	{
		if(isset($_SESSION['sid']))
		{
		
			$id = $_SESSION['sid'];
			$serverdb = "localhost";
			$usernamedb = "k6519841_ppl";
			$passworddb = "testing12345";
	
			$id_mysql = mysql_connect($serverdb ,$usernamedb,$passworddb);
			$database = mysql_select_db("k6519841_ppl",$id_mysql);
			
			$sql = "SELECT sum(jumlahItem) as total FROM keranjangpembelian WHERE stat='not fix' AND sid='$id'";
			$result = mysql_query($sql);
			$baris = mysql_fetch_array($result);
			if($baris[0] == null)
			{
				echo 0;
			}else
			{
				echo $baris[0];
			}
		}else
		{
			echo 0;
		}
		
		
		
	}
?>

<header id="header"><!--header-->
		<div class="header-middle navbar-fixed-top"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-3">
						<div class="logo pull-left">
							<a href="<?php echo base_url(); ?>"><img src="<?php echo base_url().'/assets/images/home/logo2.png'; ?>" alt="" /></a>
						</div>
					</div>
					<div class="col-sm-5" style="margin-top: 18px">
						<div class="search_box pull-right">
							<form class="form-inline" method="post" action="<?php echo base_url().'index.php/produkcontroller/searchByKeyword'; ?>">
								<div class="form-group">
									<input type="text" name="querynya" placeholder="Masukkan kata kunci...">
								</div>
								<div class="form-group">
									<select class="form-control cat" name="kategorinya">
										<?php showKategoriDrop(); ?>
									</select>
								</div> 
								<button type="submit" class="btn btn-default get"><i class="fa fa-search"></i></button>
							</form>
						</div>
					</div>
					<div class="col-sm-2" style="margin-top: 18px">
						<form class="form-inline" method="post" action="<?php echo base_url().'index.php/keranjangcontroller/tampilkankeranjang'; ?>">
						<button type="submit" class="btn btn-default get"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"><span class="badge" id="count"><?php getcart(); ?></span></span></button>
					</form>
					</div>
					<div class="col-sm-2" style="margin-top: 18px">
						<div class="shop-menu pull-right">
							<div class="btn-group">
								<form method="post" action="<?php echo base_url().'index.php/akuncontroller/logout'; ?>">
									<input type="submit" class="btn btn-default get" value="Logout">
								</form>
							</div>
						</div>
						
						<div class="shop-menu pull-right">
							<div class="btn-group">
								<form method="post" action="<?php echo base_url().'index.php/admincontroller/viewadmin'; ?>">
									<input type="submit" class="btn btn-default get" value="Admin">
								</form>
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	</header>
