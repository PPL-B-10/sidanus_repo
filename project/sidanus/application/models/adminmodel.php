<?php
	
	if(!defined('BASEPATH')) exit('no direct script access allowed');
	
	class adminmodel extends CI_Model {
	
		public function dbnya()
		{
				$serverdb = "localhost";
			$usernamedb = "k6519841_ppl";
			$passworddb = "testing12345";
	
			$id_mysql = mysql_connect($serverdb ,$usernamedb,$passworddb);
			$database = mysql_select_db("k6519841_ppl",$id_mysql);

		}
		
		function blokir()
		{
			
			//$this->dbnya();
			
			$idnya = $_POST['idtokonya'];
			
			$sql2 = "SELECT status FROM penjual WHERE idToko = '$idnya'";
			$result2 = mysql_query($sql2);
			$baris2 = mysql_fetch_array($result2);
			if($baris2[0]=="tidak aktif")
			{
				$sql= "UPDATE penjual p SET p.status='aktif' WHERE idToko = '$idnya'";
				$result = mysql_query($sql);
				header("location:viewadmin");
			}else{
				$sql= "UPDATE penjual p SET p.status='tidak aktif' WHERE idToko = '$idnya'";
				$result = mysql_query($sql);
				header("location:viewadmin");
			}
			
			
		}
		
		function viewtoko()
		{
			$sql2 = $this->db->query("SELECT t.idToko,t.namaToko , p.status, t.idToko FROM toko t , penjual p WHERE p.idToko = t.idToko");
		  	return $sql2->result();
		  
		  
		}
	}
	
	  ?>