<?php
	
	if(!defined('BASEPATH')) exit('no direct script access allowed');
	
	class pembelianmodel extends CI_Model {
	
		public function dbnya()
		{
				$serverdb = "localhost";
			$usernamedb = "k6519841_ppl";
			$passworddb = "testing12345";
	
			$id_mysql = mysql_connect($serverdb ,$usernamedb,$passworddb);
			$database = mysql_select_db("k6519841_ppl",$id_mysql);

		}
		
	}
	
	  ?>