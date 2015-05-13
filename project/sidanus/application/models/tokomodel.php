<?php

	if(!defined('BASEPATH')) exit ('no direct script acces allowed');
	
	class tokomodel extends CI_model {
		
		public function dbnya()
		{
				$serverdb = "localhost";
			$usernamedb = "k6519841_ppl";
			$passworddb = "testing12345";
	
			$id_mysql = mysql_connect($serverdb ,$usernamedb,$passworddb);
			$database = mysql_select_db("k6519841_ppl",$id_mysql);

		}
		
		  function tampilkanToko()
		  {
			  $idToko = $_GET['idtoko'];
				
			  $sql2 = $this->db->query("SELECT a.namaToko, a.lokasi,p.email FROM toko a,penjual p WHERE p.idToko='$idToko' AND a.idToko='$idToko'");
			  return $sql2->result();
			  
		  }
		  
		function gettesti()
		{
			  $idtoko = $_GET['idtoko'];
			  
			  $sql2 = $this->db->query("SELECT namapengirim ,komentar FROM feedtesti WHERE idtestimoni='$idtoko' AND indikator='toko'");
			  return $sql2->result();
		
		}
		
		  function getDetailToko()
		  {
			  $idToko = $_GET['idtoko'];
				
			  $sql2 = $this->db->query("SELECT r.idProduk, r.harga, r.namaProduk FROM produk r WHERE r.idToko='$idToko'");
			  return $sql2->result();
			  
		  }
	  
		public function getDataToko()
		{
			$this->dbnya();
			
			$idProduk = 1 ;
	
			$query_nama_toko = "SELECT namaTOKO FROM toko where idProduk='$idProduk'";
			$query_lokasi_toko = "SELECT lokasi FROM toko where idProduk='$idProduk'";
			
			$hasil_query_lokasi_toko   = mysql_query($query_lokasi_toko);
			$hasil_query_nama_toko  = mysql_query($query_nama_toko);
			
			$namaToko = mysql_fetch_array($hasil_query_nama_toko);
			$lokasiToko = mysql_fetch_array($hasil_quuery_lokasi_toko);
				
		}
		public function showNamaToko()
		{
			getDataToko();
			echo "$namaToko[0]";
		}
		public function showLokasiToko()
		{
			getDataToko();
			echo "$lokasiToko[0]";
		}
		public function topSeller()
		{
			$top = array("","","");
			$x = 1 ;
			$query_topSeller       = "SELECT idToko , MAX(jumlahPenjualan) as jumlah FROM jumlahTransaksiToko group by idToko LIMIT 3";  
			$hasil_query_topSeller = mysql_query($query_topSeller);
			
			while ( $row = mysql_fetch_array($hasil_query_topSeller)){
				$top[$x] = $row[0];
				$x++ ;
			}
		}
		
		
		public function ubahnya()
		{
			$this->dbnya();
			
			$idtoko= $_POST['idtoko'];
			
			$sql = "SELECT password FROM penjual WHERE idToko='$idtoko'";
			$hasil = mysql_query($sql);
			$baris = mysql_Fetch_array($hasil);
			$pw = $baris[0];
			
			$passwordLama= $_POST['passwordLama'];
			$passwordBaru= $_POST['passwordBaru'];
			$ulangPasswordBaru= $_POST['ulangPasswordBaru'];
			$namatoko= $_POST['namatoko'];
			$namapemilik= $_POST['namapemilik'];
			$nohp= $_POST['nohp'];
			$lokasitoko= $_POST['lokasitoko'];
			$sex= $_POST['sex'];
			$alamatlengkap= $_POST['alamatlengkap'];
			$bank= $_POST['bank'];
			
			$norekening= $_POST['norekening'];
			$atasnama= $_POST['atasnama'];
			
			$temp = base_url();
			
			if($pw == $passwordLama)
			{
				if(($passwordBaru == $ulangPasswordBaru) && $ulangPasswordBaru != "")
				{
					$sql2= "UPDATE penjual set password='$passwordBaru' WHERE idToko='$idtoko'";
					$result2 = mysql_query($sql2);
					
				
				}
				
				$sql= "UPDATE penjual p,toko t set p.namaPenjual='$namapemilik',p.jenisKelamin='$sex',p.noHp='$nohp',p.bank='$bank',p.noRek='$norekening',p.atasNama='$atasnama',t.namaToko='$namatoko',t.lokasi='$lokasitoko',t.alamat='$alamatlengkap' WHERE p.idToko=t.idToko AND p.idToko='$idtoko'";
				$result = mysql_query($sql);
				
				
				if(mysql_affected_rows() > 0)
				{
					echo"<script> alert('Profil berhasil diubah'); window.location='$temp/index.php/tokocontroller/ubahprofiltoko/?i=ubah';</script>";
				}
				else
				{
					echo"<script> alert('Profil berhasil diubah'); window.location='$temp/index.php/tokocontroller/ubahprofiltoko/?i=ubah';</script>";
				}
					
					
				
				
			
			
			}else
			{
				
				echo"<script> alert('Password Lama Salah'); window.location='/pplZahra/index.php/tokocontroller/ubahprofiltoko/?i=Passord lama salah';</script>";
			}
		
		}
		
		function datanya()
		{
		session_start();
		   $username = $_SESSION["user"];
		   $this->dbnya();
		
	 
	  
		  $sql3 = "SELECT idToko FROM penjual WHERE username='$username'";
		  $hasil3 = mysql_query($sql3);
		  $baris3 = mysql_fetch_array($hasil3);
	  
			$sql= $this->db->query("SELECT p.idToko,p.username, p.email, p.password, p.jenisKelamin,p.noHp,p.namaPenjual,p.bank,p.noRek,p.atasNama,t.namaToko,t.lokasi,t.alamat FROM penjual p, toko t WHERE p.idToko='$baris3[0]' AND t.idToko = p.idToko");
			return $sql->result();
		
		}
		
		
	}
	