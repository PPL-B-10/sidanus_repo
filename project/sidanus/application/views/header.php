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
	
	$temp = base_url();
?>

<header id="header"><!--header-->
	<div class="header-middle navbar-fixed-top"><!--header-middle-->
		<div class="container">
			<div class="row">
				<div class="col-sm-3 col-xs-6">
					<div class="logo pull-left">
						<a href="<?php echo base_url(); ?>"><img src="<?php echo base_url().'/assets/images/home/logo2.png'; ?>" alt="" /></a>
					</div>
				</div>
				<div class="col-sm-5 col-xs-6" style="margin-top: 18px">
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
				<div class="col-sm-2 col-xs-6" style="margin-top: 18px">
					<form class="form-inline" method="post" action="<?php echo base_url().'index.php/keranjangcontroller/tampilkankeranjang'; ?>">
						<button type="submit" class="btn btn-default get"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"><span class="badge" id="count"><?php getcart(); ?></span></span></button>
					</form>
				</div>
				<div class="col-sm-2 col-xs-6" style="margin-top: 18px">
					<div class="shop-menu pull-right">
						<div class="btn-group">
							<a href="<?php echo base_url().'index.php/akuncontroller/daftarakun'; ?>" class="btn btn-default get">Daftar</a>
						
							<button type="button" class="btn btn-default get" data-toggle="modal" data-target="#myModal">Login</button>
                           	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
											<h4 class="modal-title" id="myModalLabel">Login</h4>
										</div> <!-- /.modal-header -->

										<form role="form" method="post" action="<?php echo base_url().'index.php/akuncontroller/ceklogin'; ?>">
											<div class="modal-body">
												<div class="form-group">
													<div class="input-group">
														<input type="text" class="form-control" name="user" id="uLogin" placeholder="Login">
														<label for="uLogin" class="input-group-addon glyphicon glyphicon-user"></label>
													</div>
												</div> <!-- /.form-group -->

												<div class="form-group">
													<div class="input-group">
														<input type="password" name="pass" class="form-control" id="uPassword" placeholder="Password">
														<label for="uPassword" class="input-group-addon glyphicon glyphicon-lock"></label>
													</div> <!-- /.input-group -->
												</div> <!-- /.form-group -->

												<div class="form-group">
													<div class="input-group">
														<label>
															<a href="<?php echo $temp; ?>index.php/akuncontroller/forgotpass">Lupa Password?</a>
														</label>
													</div>
												</div> <!-- /.checkbox -->
											</div> <!-- /.modal-body -->
										
											<div class="modal-footer">
												<input type="submit" class="form-control btn btn-primary" name="submit" value="submit">
											</div> <!-- /.modal-footer -->
										</form>
									</div><!-- /.modal-content -->
								</div><!-- /.modal-dialog -->
							</div><!-- /.modal -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div><!--/header-middle-->
</header>