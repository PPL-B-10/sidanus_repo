<?php
	if(!isset($_SESSION["role"]))
	{
		include("header.php");
	}
	else
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



	function getnya()
	{
		$temp = $_GET['i'];
		if($temp == "ubah")
		{
			echo"Ubah Profil";
		}
		else
		{
			echo "Ubah Profil <font color='red'>( $temp )</font>";
		}
		
	}

	function cek($temp)
	{
		$username= $_SESSION['user'];
		
		$serverdb = "localhost";
			$usernamedb = "k6519841_ppl";
			$passworddb = "testing12345";
	
			$id_mysql = mysql_connect($serverdb ,$usernamedb,$passworddb);
			$database = mysql_select_db("k6519841_ppl",$id_mysql);
		
		$sql= "SELECT t.lokasi from toko t,penjual p where t.idToko=p.idToko and p.username='$username'";
		$hasil = mysql_query($sql);
		$baris = mysql_Fetch_array($hasil);
		
		if($temp == $baris[0])
			echo"selected";
	}

	function cek2($temp)
	{
		$username= $_SESSION['user'];
		$serverdb = "localhost";
			$usernamedb = "k6519841_ppl";
			$passworddb = "testing12345";
	
			$id_mysql = mysql_connect($serverdb ,$usernamedb,$passworddb);
			$database = mysql_select_db("k6519841_ppl",$id_mysql);
		
		$sql= "SELECT jenisKelamin from penjual where username='$username'";
		$hasil = mysql_query($sql);
		$baris = mysql_Fetch_array($hasil);
		
		if($temp == $baris[0])
			echo"checked";
	}

	function cek3($temp)
	{
		$username= $_SESSION['user'];
		$serverdb = "localhost";
			$usernamedb = "k6519841_ppl";
			$passworddb = "testing12345";
	
			$id_mysql = mysql_connect($serverdb ,$usernamedb,$passworddb);
			$database = mysql_select_db("k6519841_ppl",$id_mysql);
		
		$sql= "SELECT bank from penjual where username='$username'";
		$hasil = mysql_query($sql);
		$baris = mysql_Fetch_array($hasil);
		
		if($temp == $baris[0])
			echo"selected";
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>SiDanus | Profil</title>
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
</head><!--/head-->

<body>
<section>
    <div class="container">
		<div class="row">
			<div class="col-lg-2"></div>
			<div class="col-lg-8">
				<h1><?php getnya(); ?></h1><br>
			</div>
			<div class="col-lg-2"></div>
		</div>
		<div class="row">
			<div class="col-lg-2"></div>
			<div class="col-lg-8">
				<div class="panel panel-default">
					<div class="panel-body">
						<?php
							$temp = base_url();
							foreach($ubahnya as $ubahnya2)
							{
								$idToko = $ubahnya2->idToko;
								$username = $ubahnya2->username ;
								$email= $ubahnya2->email;
								
								$namatoko= $ubahnya2->namaToko;
								$namapenjual= $ubahnya2->namaPenjual;
								$noHp= $ubahnya2->noHp;
								$jenisKelamin= $ubahnya2->jenisKelamin;
								$lokasi= $ubahnya2->lokasi;
								$alamat= $ubahnya2->alamat;
								
								$bank= $ubahnya2->bank;
								
								$noRek= $ubahnya2->noRek;
								$atasNama= $ubahnya2->atasNama;
							}
						?>
							
							
						<form class="form-horizontal" role="form" method="post" action='<?php echo $temp; ?>/index.php/tokocontroller/ubahprofilnya/' enctype="multipart/form-data">
							<input type="hidden" name="idtoko" value="<?php echo $idToko; ?>">
							<div class="form-group">
								<br>
								<label for="email" class="col-sm-4 control-label">Alamat Email <br><small>tidak dapat diubah</small></label>
								<div class="col-sm-6">
									<input class="form-control" type="text" name="email" value="<?php echo $email; ?>" readonly>
								</div>
							</div>
							<div class="form-group">
								<label for="username" class="col-sm-4 control-label">Username<br><small>tidak dapat diubah</small></label>
								<div class="col-sm-6">
									<input class="form-control" type="text" name="username" readonly value="<?php echo $username; ?>">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-4 control-label">Ubah Password</label>
								<div class="col-sm-6">
								</div>
							</div>
							<div class="form-group">
								<label for="passwordLama" class="col-sm-4 control-label">Password Lama *</label>
								<div class="col-sm-6">
									<input class="form-control" type="password" name="passwordLama">
								</div>
							</div>
							<div class="form-group">
								<label for="passwordBaru" class="col-sm-4 control-label">Password Baru</label>
								<div class="col-sm-6">
									<input class="form-control" type="password" name="passwordBaru">
								</div>
							</div>
							<div class="form-group">
								<label for="ulangPasswordBaru" class="col-sm-4 control-label">Ulang Password Baru</label>
								<div class="col-sm-6">
									<input class="form-control" type="password" name="ulangPasswordBaru">
								</div>
							</div>
							<hr>
							<div class="form-group">
								<label for="namatoko" class="col-sm-4 control-label">Nama Toko</label>
								<div class="col-sm-6">
									<input class="form-control" type="text" name="namatoko" value="<?php echo $namatoko; ?>">
								</div>
							</div>
							<div class="form-group">
								<label for="namapemilik" class="col-sm-4 control-label">Nama Pemilik Toko</label>
								<div class="col-sm-6">
									<input class="form-control" type="text" name="namapemilik" value="<?php echo $namapenjual; ?>">
								</div>
							</div>
							<div class="form-group">
								<label for="lokasitoko" class="col-sm-4 control-label">Lokasi Toko</label>
								<div class="col-sm-6">
									<select class="form-control" name="lokasitoko" id="lokasitoko">
										<option value="1" <?php cek('1'); ?> >Jakarta</option>
										<option value="2" <?php cek('2'); ?>>Bogor</option>
										<option value="3" <?php cek('3'); ?>>Depok</option>
										<option value="4" <?php cek('4'); ?>>Tangerang</option>
										<option value="5" <?php cek('5'); ?>>Bekasi</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label for="nohp" class="col-sm-4 control-label">Nomor HP</label>
								<div class="col-sm-6">
									<input class="form-control" type="text" name="nohp" value="<?php echo $noHp; ?>">
								</div>
							</div>
							<div class="form-group">
								<label for="jeniskelamin" class="col-sm-4 control-label">Jenis Kelamin</label>
								<div class="col-sm-1"></div>
								<div class="col-sm-2">
									<input type="radio" name="sex" value="male" <?php cek2('male'); ?>>Male
								</div>
								<div class="col-sm-2">
									<input type="radio" name="sex" value="female"  <?php cek2('female'); ?>>Female
								</div>
								<div class="col-sm-3"></div>
							</div>
							<div class="form-group">
								<label for="alamatlengkap" class="col-sm-4 control-label">Alamat Lengkap</label>
								<div class="col-sm-6">
									<textarea class="form-control" name="alamatlengkap" id="alamatlengkap" rows="5"><?php echo $alamat; ?></textarea>
								</div>
							</div>
							<div class="form-group">
								<label for="fotoprofil" class="col-sm-4 control-label">Foto Profil <br> <small>@Max.200kB</small></label>
								<div class="col-sm-6">
									<input type="file" name="userfile" id="file" value=""/>
								</div>
							</div>
							<hr>
							<div class="form-group">
								<label for="bank" class="col-sm-4 control-label">Bank</label>
								<div class="col-sm-6">
									<select class="form-control" name="bank" id="bank">
										<option value="BCA" <?php cek3('BCA'); ?> >BCA</option>
										<option value="Mandiri" <?php cek3('Mandiri'); ?>>Mandiri</option>
										<option value="BNI" <?php cek3('BNI'); ?>>BNI</option>
										<option value="BRI" <?php cek3('BRI'); ?>>BRI</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label for="norekening" class="col-sm-4 control-label">Nomor Rekening</label>
								<div class="col-sm-6">
								  <input class="form-control" type="text" name="norekening" value="<?php echo $noRek; ?>">
								</div>
							</div>
							<div class="form-group">
								<label for="atasnama" class="col-sm-4 control-label">Atas Nama</label>
								<div class="col-sm-6">
									<input class="form-control" type="text" name="atasnama" value="<?php echo $atasNama; ?>">
								</div>
							</div>
							<br>
							<center>
								<input type="submit" value="Simpan" class="btn btn-default">
								<br><br><br>* wajib di isi
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