<?php
	
	if(!defined('BASEPATH')) exit('no direct script access allowed');
	
	class datatransaksimodel extends CI_Model {
	
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
	 }
	  
 
?>