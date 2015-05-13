<?php
	
	if(!defined('BASEPATH')) exit('no direct script access allowed');
	
	class transaksimodel extends CI_Model {
	
		public function dbnya()
		{
				$serverdb = "localhost";
			$usernamedb = "k6519841_ppl";
			$passworddb = "testing12345";
	
			$id_mysql = mysql_connect($serverdb ,$usernamedb,$passworddb);
			$database = mysql_select_db("k6519841_ppl",$id_mysql);

		}
		
	
	function getidpembelian()
	{	
		$nomor = $_POST['nomor'];
		
		$sql2 = $this->db->query("SELECT idPembelian, SUM(jumlahItem) as total FROM keranjangpembelian WHERE idPembelian='$nomor' GROUP By idPembelian");
		return $sql2->result();
		
	}
	
	function getidpembelian2($nomor)
	{	
		
		$sql2 = $this->db->query("SELECT idPembelian, SUM(jumlahItem) as total FROM keranjangpembelian WHERE idPembelian='$nomor' GROUP By idPembelian");
		return $sql2->result();
		
	}
	
	  function gettransaksi2()
	  {
		  session_start();
		  $username = $_SESSION["user"];
		  $this->dbnya();
		  
		  $sql3 = "SELECT idToko FROM penjual WHERE username='$username'";
		  $hasil3 = mysql_query($sql3);
		  $baris3 = mysql_fetch_array($hasil3);
		$sql2 = $this->db->query("SELECT k.idPembelian,b.statusBayar,k.idProduk, k.jumlahItem,k.subtotal, p.namaProduk, p.harga, t.statusPesanan FROM transaksi t,keranjangpembelian k, produk p,pembelian b WHERE b.idPembelian=k.idPembelian AND k.idToko='$baris3[0]' AND k.idProduk=p.idProduk AND t.idPembelian=k.idPembelian");
		return $sql2->result();
		 
	  }
	  
	  
	  function gettransaksi($tes,$tes2)
	  {
		  $this->dbnya();
		  
		  $sql3 = "SELECT p.idToko FROM penjual p,pengunjung k WHERE k.email='$tes2' AND k.idPembelian='$tes'";
		  $hasil3 = mysql_query($sql3);
		  $baris3 = mysql_fetch_array($hasil3);
		  $temp=$baris3[0];
		  
		$sql2 = $this->db->query("SELECT k.idPembelian,b.statusBayar,k.idProduk, k.jumlahItem,k.subtotal, p.namaProduk, p.harga, t.statusPesanan FROM transaksi t,keranjangpembelian k, produk p,pembelian b WHERE b.idPembelian=k.idPembelian AND k.idToko='$temp' AND k.idProduk=p.idProduk AND t.idPembelian='$tes' AND t.idPembelian=k.idPembelian");
		return $sql2->result();
		 
	  }
	  
	  
	  function updatetransaksi()
	  {
		$temp = base_url();
		
		
		
		$total = $_POST['total'];
		
		for($i=0; $i<$total; $i++)
		{
			$statusnya = $_POST['statusnya-'.$i];
			$statusnya = explode("-", $statusnya); 
			
			
			$sql6= "SELECT email FROM pengunjung p, pembelian b WHERE p.idPembelian = '$statusnya[1]' AND p.idPembelian=b.idPembelian";
			$result6 = mysql_query($sql6);
			$baris6 = mysql_fetch_array($result6);
			
			$sql5= "SELECT komen  FROM pembelian WHERE idPembelian = '$statusnya[1]'";
			$result5 = mysql_query($sql5);
			$baris5 = mysql_fetch_array($result5);
			
			$sql= "UPDATE transaksi set statusPesanan='$statusnya[0]' WHERE idPembelian = '$statusnya[1]'";
			$result = mysql_query($sql);
			
			
			
			if($statusnya[0] == "Selesai" && $baris5[0]==0)
			{
				$email = $baris6[0];
				$subject = 'Detil Pesanan';
				$message = "Berikut Detil Pesanan Anda : \n\n";
				
				$sql2 = "SELECT jumlahItem,subtotal,idProduk,idToko FROM keranjangpembelian WHERE idPembelian='$statusnya[1]'";
				$result2 = mysql_query($sql2);
				
				$temp1 = "ID pembelian : $statusnya[1] \n";
				$message = $message.$temp1;
				
				$totalnya= 0;
				$ongkir = 0;
				while($datanya = mysql_fetch_array($result2))
				{
					$idproduk = $datanya[3];
					$jumlah = $datanya[0];
					$subtotal = $datanya[1];
					$idtoko = $datanya[2];
					
					$temp2 = "Id Produk : $idproduk \n jumlah : $jumlah \n total : $subtotal \n id toko : $idtoko \n\n";
					$message = $message.$temp2;
					$totalnya= $totalnya+$subtotal;
				}
				
				$sql3= "SELECT hashnya FROM pembelian WHERE idPembelian='$statusnya[1]'";
				$result3 = mysql_query($sql3);
				$baris3 = mysql_Fetch_array($result3);
				
				$tambahan = "\n\n Pesanan sudah dikirim , selanjutnya silahkan mengisi form review dan feedback terhadap pesanan anda di $temp/index.php/produkcontroller/showreviewform?i=$baris3[0], terima kasih banyak telah menggunakan sidanus ";
				$message = $message.$tambahan;
				
				$from = 'From: SiDanus <SomeEmailAddress@Domain.com>';
				mail($email,$subject,$message,$from);
				
				$sql= "UPDATE pembelian set komen='1' WHERE idPembelian = '$statusnya[1]'";
				$result = mysql_query($sql);
			}
			
		
		
		}
		
			
		header("location:$temp/index.php/transaksicontroller/getDataTransaksi");
			
		
	  
	  }
	    
		
		function updatestatus()
		{
			
			$this->dbnya();
			
			$email = $_POST['emailnya'];
			$no = $_POST['nomornya'];
			
				$sql= "UPDATE pembelian p SET p.statusBayar='Sudah Bayar' WHERE idPembelian = '$no'";
				$result = mysql_query($sql);
				
				if(mysql_affected_rows() > 0)
				{
					header("location:suksesconfirm");
				}
				else
				{
					header("location:gagalconfirm");
				}
		}
		
		function viewtoko()
		{
			$this->dbnya();
			$sql2 = "SELECT t.namaToko , p.status, t.idToko FROM toko t , penjual p WHERE p.idToko = t.idToko";
			$result2 = mysql_query($sql2);
			$i = 1;
			echo"Blokir Akun Toko<br>";
			echo"<a href=logout>logout</a>";
			echo"<center>";
			echo"<div style=\"width:800px;border:1px solid black;height:500px;\">";
				echo"<table>";
				echo"<tr>";
				while($baris2 = mysql_fetch_array($result2))
				{
					if($i % 4 == 0)
					{
						echo"<td width=\"100\"><img src=\"a.jpg\" width=\"70px\" height=\"70px\"><Br>$baris2[0]</td>";
						echo"<td width=\"100\">$baris2[1]";
							echo"<form method=\"post\" action=\"blokir\">";
								if($baris2[1] == "aktif")
								{
									echo"<input style=\"cursor:pointer\" type=\"submit\" value=\"block\" name=\"submit\">";
									echo"<input type=\"hidden\" value=\"$baris2[2]\" name=\"idtoko\">";
								}else{
									echo"<input style=\"cursor:pointer\" type=\"submit\" value=\"un block\" name=\"submit\">";
									echo"<input type=\"hidden\" value=\"$baris2[2]\" name=\"idtoko\">";
								}
								
							echo"</form>";
						echo"</td>";
						echo"<td width=\"20px\"></td>";
						echo"</tr><tr>";
					}else{
						echo"<td width=\"100\"><img src=\"a.jpg\" width=\"70px\" height=\"70px\"><Br>$baris2[0]</td>";
						echo"<td width=\"100\">$baris2[1]";
							echo"<form method=\"post\" action=\"blokir\">";
								if($baris2[1] == "aktif")
								{
									echo"<input style=\"cursor:pointer\" type=\"submit\" value=\"block\" name=\"submit\">";
									echo"<input type=\"hidden\" value=\"$baris2[2]\" name=\"idtoko\">";
								}else{
									echo"<input style=\"cursor:pointer\" type=\"submit\" value=\"un block\" name=\"submit\">";
									echo"<input type=\"hidden\" value=\"$baris2[2]\" name=\"idtoko\">";
								}
								
							echo"</form>";
						echo"</td>";
						echo"<td width=\"20px\"></td>";
					}
					
					
				}
			
			echo"</div>";
		}
		
}
	  
 
?>