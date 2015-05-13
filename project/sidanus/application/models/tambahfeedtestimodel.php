<?php
	
	if(!defined('BASEPATH')) exit('no direct script access allowed');
	
	class tambahfeedtestimodel  extends CI_Model {
	
		public function dbnya()
		{
			$serverdb = "localhost";
			$usernamedb = "k6519841_ppl";
			$passworddb = "testing12345";
	
			$id_mysql = mysql_connect($serverdb ,$usernamedb,$passworddb);
			$database = mysql_select_db("k6519841_ppl",$id_mysql);

		}
		
		function tambahfeedback()
		{
			$temp4 = base_url();
			$total = $_POST['totalproduk'];
			$total2 = $_POST['totaltoko'];
			
			
			for($i=0; $i<$total; $i++)
			{
				$idproduk= $_POST['idProduk-'.$i];
				$idproduk= explode("-", $idproduk); 
				
				$komenproduk= $_POST['komenproduk-'.$i];
				$komenproduk= explode("-", $komenproduk); 
				
				$sender = $_POST['sender-'.$i];
				$sender = explode("-", $sender); 
				
				$rateproduk = $_POST['rateproduk-'.$i];
				$rateproduk = explode("-", $rateproduk); 
				
				$sql5= "SELECT rate FROM produk WHERE idProduk= '$idproduk[0]'";
				$result5 = mysql_query($sql5);
				$baris5 = mysql_fetch_array($result5);
				
				$temp = $rateproduk[0] + $baris5[0];
				
				$sql3= "UPDATE produk set rate='$temp' WHERE idProduk= '$idproduk[0]'";
				$result3 = mysql_query($sql3);
			
				
				$sql5= "INSERT INTO feedtesti(idtestimoni,namapengirim,komentar,indikator) values('$idproduk[0]','$sender[0]','$komenproduk[0]','produk')";
				$result5 = mysql_query($sql5);
				
				
			}
			
			for($i=0; $i<$total2; $i++)
			{
				$idbeli= $_POST['idbeli-'.$i];
				$idbeli= explode("-", $idbeli); 
				
				$idtoko= $_POST['idToko-'.$i];
				$idtoko= explode("-", $idtoko); 
				
				$komentoko= $_POST['komentoko-'.$i];
				$komentoko= explode("-", $komentoko); 
				
				$sender = $_POST['sender-'.$i];
				$sender = explode("-", $sender); 
				
				$sql5= "INSERT INTO feedtesti(idtestimoni,namapengirim,komentar,indikator) values('$idtoko[0]','$sender[0]','$komentoko[0]','toko')";
				$result5 = mysql_query($sql5);
				
				
				$sql3= "UPDATE pengunjung set inditesti='1' WHERE idPembelian = '$idbeli[0]'";
				$result3 = mysql_query($sql3);
			
			}
		
			
				echo"<script>alert('testimoni berhasil ditambahkan, terima kasih sudah berbelanja di sidanus !');window.location.href='$temp4';</script>";
			
			
		}
		
		
	}
	
?>