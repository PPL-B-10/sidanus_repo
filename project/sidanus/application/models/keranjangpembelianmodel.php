<?php
	
	if(!defined('BASEPATH')) exit('no direct script access allowed');
	
	class keranjangpembelianmodel extends CI_Model {
	
		public function dbnya()
		{
				$serverdb = "localhost";
			$usernamedb = "k6519841_ppl";
			$passworddb = "testing12345";
	
			$id_mysql = mysql_connect($serverdb ,$usernamedb,$passworddb);
			$database = mysql_select_db("k6519841_ppl",$id_mysql);
		}
		
		function ubahJumlahItemnya()
		{
			$jumlah = $_POST['jumlahnyaa'];
			$id = $_POST['idnya'];
			$hargaa = $_POST['hargaa'];
			
			$temp = base_url();
			$this->dbnya();
			
			$sql2 = "SELECT stok FROM produk WHERE idProduk='$id'";
			$result2 = mysql_query($sql2);
			$baris2 = mysql_fetch_array($result2);
			
			session_start();
			$sid = $_SESSION['sid'];
			
			if($baris2[0]<$jumlah)
			{
				
				echo "<script type='text/javascript'>alert('Stok barang tidak mencukupi'); window.location.href='$temp/index.php/keranjangcontroller/tampilkankeranjang';</script>";
			}else{
				$total = $jumlah*$hargaa;
				$sql = "UPDATE keranjangpembelian SET jumlahItem='$jumlah' , subtotal='$total' WHERE idProduk='$id' AND sid='$sid'";
				$result = mysql_query($sql);
				
					header("location:$temp/index.php/keranjangcontroller/tampilkankeranjang");
				
			}
			
		}
		
		function deleteproduknya()
		{
			$this->dbnya();
			session_start();
			$sid = $_SESSION['sid'];
			$temp = base_url();
			$idproduk = $_POST['idnya'];
			$sql= "DELETE FROM keranjangpembelian WHERE idproduk='$idproduk' AND sid='$sid'";
			$result = mysql_query($sql);
			if(mysql_affected_rows() >0)
			{
				header("location:$temp/index.php/keranjangcontroller/tampilkankeranjang");
			}else{
				header("location:$temp/index.php/keranjangcontroller/tampilkankeranjang");
			}
		}
		
		function gettotal()
		{
			
			$sid = $_SESSION['sid'];
			
			$sql2 = $this->db->query("SELECT sum(k.jumlahItem) as total,k.subtotal,k.idProduk,k.idPembelian, k.idToko,p.namaProduk FROM keranjangpembelian k,produk p  WHERE sid='$sid' AND k.idProduk = p.idProduk Group By k.idProduk");
			return $sql2->result();	
		}
		
		function showbarangkeranjang()
		{
			$sid = $_SESSION['sid'];
			
			$sql2 = $this->db->query("SELECT k.jumlahItem,k.subtotal,k.idProduk,k.idPembelian, k.idToko,p.namaProduk,p.harga FROM keranjangpembelian k,produk p  WHERE sid='$sid' AND k.idProduk = p.idProduk");
			return $sql2->result();	
		}
		
	}
	
	  ?>