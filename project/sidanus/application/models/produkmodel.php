<?php
	
	if(!defined('BASEPATH')) exit('no direct script access allowed');
	
	class produkmodel extends CI_Model {
	
	public function dbnya()
	{
			$serverdb = "localhost";
			$usernamedb = "k6519841_ppl";
			$passworddb = "testing12345";
	
			$id_mysql = mysql_connect($serverdb ,$usernamedb,$passworddb);
			$database = mysql_select_db("k6519841_ppl",$id_mysql);

	}
	
	function gethasilcari()
	{
		
		$querynya = $_POST['querynya'];
		$kategorinya = $_POST['kategorinya'];
			
		$sql = "SELECT idKategori FROM kategori WHERE namaKategori='$kategorinya'";
		$hasil = mysql_query($sql);
		$idkategorinya = mysql_fetch_array($hasil);
		
		$sql = $this->db->query("SELECT idProduk,namaProduk,COUNT(*) as jumlah,harga FROM produk WHERE namaProduk='$querynya' AND idKategori='$idkategorinya[0]' GROUP By idProduk");
		
		
		return $sql->result();
	}
	
	function getdatareview()
	{
		
		$id = $_GET['i'];
		
		$sql = $this->db->query("SELECT p.namaProduk,p.idProduk, d.namaPembeli FROM produk p , keranjangpembelian k ,pembelian b ,pengunjung d WHERE p.idProduk=k.idProduk AND b.idPembelian = k.idPembelian AND b.hashnya='$id' AND d.idPembelian=k.idPembelian");
		
		
		return $sql->result();
	}
	
	function getdatareviewtoko()
	{
		
		$id = $_GET['i'];
		
		$sql = $this->db->query("SELECT distinct t.namaToko, t.idToko, d.namaPembeli,d.idPembelian  FROM toko t , keranjangpembelian k ,pembelian b ,pengunjung d WHERE t.idToko=k.idToko AND b.idPembelian = k.idPembelian AND b.hashnya='$id' AND k.idPembelian = d.idPembelian");
		
		
		return $sql->result();
	}
	
		
	function addtocart($id,$nama,$harga,$qty)
	{
		$this->load->library('cart');
		$item =    array(
		               'id'      => $id,
		               'qty'     => $qty,
		               'name'   => $nama,
		               'price'    => $id,
		               'tes'    => $id
		            );
		            
		$this->cart->insert($item);
	}
	
	function getNamaProduk()
	{
	  $idProduk = $_GET['idproduk'];
	  
	  $sql2 = $this->db->query("SELECT namaProduk FROM produk WHERE idProduk='$idProduk'");
	  return $sql2->result();
	}
  
  function getHargaProduk()
  {
	  $idProduk = $_GET['idproduk'];
	  
	  $sql2 = $this->db->query("SELECT harga FROM produk WHERE idProduk='$idProduk'");
	  return $sql2->result();
  }
  
  function ubahproduk()
  {
  		$idProduk = $_GET['idnya'];
		  
		  $sql2 = $this->db->query("SELECT p.idProduk,p.namaProduk,k.namaKategori,p.stok,p.harga,p.deskripsi,p.spesifikasi FROM produk p, kategori k WHERE p.idProduk='$idProduk' AND k.idKategori=p.idKategori");
		  return $sql2->result();
  	
  
  }
  
  function ubahproduknya()
  {
  $user = $_SESSION['user'];
  
  	$idnyaa= $_POST['idnyaa'];
	    $namaproduk= $_POST['nama'];
	    $namakategori= $_POST['namakategori'];
	  
		$hargaproduk= $_POST['hargaproduk'];
		$deskripsi= $_POST['deskripsi'];
		
		$spesifikasi = $_POST['spesifikasi'];
		
		$jumlahstok= $_POST['jumlahstok'];
  	
  		$this->dbnya();
  		$sql3 = "SELECT p.idProduk,k.idKategori,j.username FROM produk p,kategori k,penjual j WHERE j.idToko=p.idToko AND p.idProduk='$idnyaa' AND k.namaKategori='$namakategori'";
		  $hasil3 = mysql_query($sql3);
		  $baris3 = mysql_fetch_array($hasil3);
  		$idproduk = $baris3[0];
  		
  		$idKategori = $baris3[1];
  		$temp = $baris3[2];
		
		$url = base_url();
  		if($user == $temp)
  		{
  		
  			$sql2 = "UPDATE produk set namaProduk='$namaproduk',idKategori='$idKategori',deskripsi='$deskripsi',stok='$jumlahstok',spesifikasi='$spesifikasi ',harga='$hargaproduk' WHERE idProduk='$idproduk'";
	  		$hasil2 = mysql_query($sql2);
	  		
	  		
			  
	  		if(mysql_affected_rows() >0)
			  {
				  header("location:$url/index.php/produkcontroller/editProduk/?idnya=$idproduk");  
				
			  }else{
				  echo"<script>alert('Gagal Mengubah Produk'); location.href='$url/index.php/produkcontroller/editProduk/?idnya=$idproduk';</script>"; 
			  }
  		
  		}else
  		{
  		
  			echo"<script>alert('Gagal Mengubah Produk Sendiri'); location.href='/pplZahra/';</script>"; 
  		}
  		
	  
	  
  }
  
  
  
  function showprofiltoko()
  {
	  $idToko = $_GET['idtoko'];
	  
	  $sql = "SELECT email FROM penjual WHERE idToko='$idToko'";
	  $hasil = mysql_query($sql);
	  $baris = mysql_fetch_array($hasil);
	  
	  $sql2 = "SELECT namaToko, lokasi FROM toko WHERE idToko='$idToko'";
	  $hasil2 = mysql_query($sql2);
	  $baris2 = mysql_fetch_array($hasil2);
	    
	   
	  echo"<table border=\"1\" style=\"text-align:center\";>";
	 	 echo"<tr>";
		 echo"<td> Nama Toko</td>";
		 echo"<td width=\"200px\" height=\"50px\">";
		 echo"$baris2[0]";
		 echo"</td>";
		 echo"</tr>";
		 
		 echo"<tr>";
		 echo"<td> Lokasi Penjual</td>";
		 echo"<td width=\"200px\" height=\"50px\">";
		 echo"$baris2[1]";
		 echo"</td>";
		 echo"</tr>";
		 
		 echo"<tr>";
		 echo"<td> Kontak Penjual</td>";
		 echo"<td width=\"200px\" height=\"50px\">";
		 echo"$baris[0]";
		 echo"</td>";
		 echo"</tr>";
		 
		 echo"<tr>";
		 echo"<td> Rating</td>";
		 echo"<td width=\"200px\" height=\"50px\">";
		 echo"0";
		 echo"</td>";
		 echo"</tr>";
	  
	  echo"</table>";
	  
	  
  
  
  }
  
  function getidToko()
  {
	  $idProduk = $_GET['idproduk'];
	  $sql = $this->db->query("SELECT idToko FROM produk WHERE idProduk='$idProduk'");
	  return $sql->result();
  }
  
  function getNamaToko()
  {
	  
	  $idProduk = $_GET['idproduk'];
	  
	  $sql2 = "SELECT idToko FROM produk WHERE idProduk='$idProduk'";
	  $hasil2 = mysql_query($sql2);
	  $baris2 = mysql_fetch_array($hasil2);
	  
	  $sql = $this->db->query("SELECT namaToko FROM toko WHERE idToko='$baris2[0]'");
	  return $sql->result();
	  
  }
 	
	function getDetilnya()
	{
		  $idProduk = $_GET['idproduk'];
		  
		  $sql2 = $this->db->query("SELECT namaProduk,harga,deskripsi,spesifikasi,stok FROM produk WHERE idProduk='$idProduk'");
		  return $sql2->result();
	
	}
	
	function gettesti()
	{
		  $idProduk = $_GET['idproduk'];
		  
		  $sql2 = $this->db->query("SELECT namapengirim ,komentar FROM feedtesti WHERE idtestimoni='$idProduk' AND indikator='produk'");
		  return $sql2->result();
	
	}
		
	
	
  
  function tambahproduknya()
  {
  session_start();
   $username = $_SESSION["user"];
	   $this->dbnya();
	    $nama = $_POST['nama'];
		$kategori = $_POST['kategori'];
		
		
	  $sql = "SELECT idKategori FROM kategori WHERE namaKategori='$kategori'";
	  $hasil = mysql_query($sql);
	  $baris = mysql_fetch_array($hasil);
	  
	  
	 
	  
	  $sql3 = "SELECT idToko FROM penjual WHERE username='$username'";
	  $hasil3 = mysql_query($sql3);
	  $baris3 = mysql_fetch_array($hasil3);
	  
		$harga = $_POST['hargaproduk'];
		$deskripsi = $_POST['deskripsi'];
		
		$spesifikasi = $_POST['spesifikasi'];
		
		$stok= $_POST['stok'];
		
		$temp = base_url();
		
	  $sql2 = "INSERT INTO produk(namaProduk, idToko, idKategori, deskripsi, stok, spesifikasi,harga, keyword) values('$nama', '$baris3[0]','$baris[0]','$deskripsi','$stok','$spesifikasi','$harga','')";
	  $hasil2 = mysql_query($sql2);
	  if(mysql_affected_rows() >0)
	  {
	  	  $sql4 = "SELECT idProduk FROM produk WHERE namaProduk='$nama' AND idToko='$baris3[0]'";
		  $hasil4 = mysql_query($sql4);
		  $baris4 = mysql_fetch_array($hasil4);
		  
		  header("location:$temp/index.php/produkcontroller/tampilkanProduk/showdetil?idproduk=$baris4[0]");  
	  }else{
		  echo"<script>alert('Gagal Menambahkan Produk'); location.href='$temp/index.php/produkcontroller/addproduk';</script>"; 
	  }
  }
  
  
  function showKategoriName()
  {
	  $idKategori = $_GET['idkategori'];
	  
	  $sql2 = $this->db->query("SELECT namaKategori FROM kategori WHERE idKategori='$idKategori'");
	  return $sql2->result();
  }
  
  function showprodukbykategori()
  {
	  $idKategori = $_GET['idkategori'];
	  
	  $sql2 = $this->db->query("SELECT idProduk,namaProduk,harga FROM produk WHERE idKategori='$idKategori'");
	  return $sql2->result();
	  
  }
  	  function deleteproduknya()
	  {
		session_start();
		$user = $_SESSION['user'];
		
	 	$this->dbnya();
	  	
		$sql2 = "SELECT t.idToko FROM toko t, penjual p WHERE p.username='$user' AND p.idToko=t.idToko";
	  	$hasil2 = mysql_query($sql2);
	  	$baris2 = mysql_fetch_array($hasil2);
	  	
		   $idproduk= $_GET["idnya"];
		   $sql= "DELETE FROM produk WHERE idProduk='$idproduk'";
		   $hasil = mysql_query($sql);
		   $temp = base_url();
				
				
		if(mysql_affected_rows() >0)
		{
			header("location:$temp/index.php/tokocontroller/tampilkanToko/?idtoko=$baris2[0]");
		}else{
			header("location:$temp/index.php/tokocontroller/tampilkanToko/?idtoko=$baris2[0]");
		}
	  }
  	
  
  function showtransaksi()
  {
  session_start();
	  $username= $_SESSION["user"];
	  
	  $this->dbnya();
	  $sql7 = "SELECT idToko FROM penjual WHERE username='$username'";
	  $hasil7 = mysql_query($sql7);
	  $baris7 = mysql_fetch_array($hasil7);
	
	   $idtoko =  $baris7[0];
	  $sql2 = $this->db->query("SELECT p.idToko,pr.namaProduk,k.subtotal,pb.statusBayar,tr.statusPesanan, k.idPembelian,k.idProduk,k.jumlahItem FROM transaksi tr,pembelian pb, keranjangpembelian k, penjual p, produk pr WHERE tr.idPembelian=k.idPembelian AND pb.idPembelian=k.idPembelian AND p.username='$username' AND k.idToko='$idtoko' AND pr.idProduk=k.idProduk");
	  return $sql2->result();
	
  
  }
  
  function showprodukbytoko()
  {
  session_start();
	  $username= $_SESSION["user"];
	  $this->dbnya();
	  $sql7 = "SELECT idToko FROM penjual WHERE username='$username'";
	  $hasil7 = mysql_query($sql7);
	  $baris7 = mysql_fetch_array($hasil7);
	  
	   $idtoko =  $baris7[0];
	   
	   
	   
	   $sql2 = $this->db->query("SELECT p.idToko, t.namaToko, pr.idProduk, pr.namaProduk, pr.harga FROM penjual p, toko t, produk pr WHERE p.username='$username' AND t.idToko='$idtoko' AND pr.idTOko='$idtoko'");
	   return $sql2->result();
  
  }
  
  
  
  
  	function uploadavatar()
	{
		session_start();
		$user_name = $_SESSION['user'];
	
		$this->dbnya();

		
		if (isset($_FILES['image']) && $_FILES['image']['size'] > 0)
		{ 
		// Temporary file name stored on the server
			$tmpName  = $_FILES['image']['tmp_name'];  
			// Read the file 
			$fp      = fopen($tmpName, 'r');
			$data = fread($fp, filesize($tmpName));
			$data = addslashes($data);
			fclose($fp);
			
			copyimage();
			
			echo"berhasil";
		// Print results
			
		}
		else 
		{
			echo"gagal";
		}
		
		
	}
	
	
	function copyimage()
	{
		session_start();
		$temp = base_url();
		$user_name = $_SESSION['user'];
		$pathnya = "$temp/index.php/assets/images/avatar";
		
			
		$datafile = $_FILES["image"];
	 	$namafile = $datafile["name"];
		
		$namafile =$user_name.".jpg";
			
			
		$tipe = $datafile["type"];
		$ukuran = $datafile["size"];
		$file_sementara = $_FILES["image"]["tmp_name"];
		
		if(copy($file_sementara,$pathnya.$namafile))
		{
			echo"berhasil";
			
		}
	}
		
		
		
		
		
	
	function showavatar()
	{
	session_start();
		$user_name = $_SESSION['user'];

		include("database.php");
		
		$query = "SELECT user_avatar FROM `user` WHERE `user_name` = '$user_name'";

		$result=mysql_query($query);
		$row = mysql_fetch_array($result);
		
		$temp = "avatar/".$row[0].".jpg";
		echo '<img src="'.$temp.'" width="100" height="100">';
		mysql_close($id_mysql);
	}
	
	function insertnya()
	{
		  $serverdb = "localhost";
		  $usernamedb = "k6519841_ppl";
		  $passworddb = "testing12345";
			
		  $id_mysql = mysql_connect($serverdb ,$usernamedb,$passworddb);
		  $database = mysql_select_db("k6519841_ppl",$id_mysql);
		  
		  session_start();
		  if(!isset($_SESSION['sid']))
		  {
			$number2 = rand(1, 10000);
			$_SESSION['sid'] = $number2;
		  
		  }
			  $id = $_SESSION['sid'];
			  $sql = "SELECT idPembelian from keranjangpembelian WHERE sid='$id'";
			  $result = mysql_query($sql);
			  $baris = mysql_Fetch_array($result);
		  
		  
		  
		  
		  $idproduk = $this->input->post('idproduk');
		  $namaproduk = $this->input->post('nama');
		  $namatoko = $this->input->post('toko');
		  $jumlahproduk = $this->input->post('jumlah');
		  $harga = $this->input->post('harga');
		  $subtotal = $this->input->post('subtotal');
		  
		  $sqll = "SELECT k.idProduk FROM keranjangpembelian k, produk p WHERE k.idProduk='$idproduk' AND sid='$id'";
		  $resultt = mysql_query($sqll);
		  if(mysql_affected_rows() >0)
		  {
			  $sqll2 = "SELECT k.idProduk FROM keranjangpembelian k, produk p WHERE k.idproduk=p.idproduk AND p.namaProduk='$namaproduk'";
			  $resultt2 = mysql_query($sqll2);
			  $idpr2 = mysql_Fetch_array($resultt2);
			  
			  $sql34 = "SELECT jumlahItem,subtotal FROM keranjangpembelian WHERE idProduk='$idpr2[0]' AND sid='$id'";
			  $result34 = mysql_query($sql34);
			  $baris34 = mysql_Fetch_array($result34);
			  
			  $temppp = $baris34[1]+$subtotal;
			  $tot = $baris34[0]+$jumlahproduk;
			  $sql33 = "UPDATE keranjangpembelian SET jumlahItem='$tot', subtotal='$temppp' WHERE sid='$id' AND idProduk='$idpr2[0]'";
			  $result33 = mysql_query($sql33);
		  }else
		  {
			  $sql3 = "SELECT a.idToko, b.idProduk from produk b, toko a WHERE b.namaProduk = '$namaproduk' AND a.namaToko='$namatoko'";
			  $result3 = mysql_query($sql3);
			  $baris3 = mysql_Fetch_array($result3);
			
			  if($baris != "")
			  {
				  
				  
				  $sql = "SELECT idPembelian from keranjangpembelian WHERE sid='$id'";
				  $result = mysql_query($sql);
				  $baris = mysql_Fetch_array($result);
				  
				  $order = "insert into keranjangpembelian (jumlahItem,subtotal,idProduk,idPembelian,idToko,stat,sid) values ('$jumlahproduk','$subtotal','$idproduk','$baris[0]','$baris3[0]','not fix','$id')";
				  $this->db->query($order);
			  }else
			  {
				  $number = rand(1, 1000000);
				  $sql4 = "SELECT idPembelian from keranjangpembelian ORDER By idPembelian DESC";
				  $result4 = mysql_query($sql4);
				  $baris4 = mysql_Fetch_array($result4);
				  
				  $idnya = $baris4[0] + 1;
				  
				  $order = "insert into keranjangpembelian (jumlahItem,subtotal,idProduk,idPembelian,idToko,stat,sid) values ('$jumlahproduk','$subtotal','$idproduk','$idnya','$baris3[0]','not fix','$id')";
				  $this->db->query($order);
				 
				  
			  }
		  }
		  
		

		
	}
	
	
 
}
	
	  ?>