<?php
	
	if(!defined('BASEPATH')) exit('no direct script access allowed');
	
	class homeModel extends CI_Model {
	
		function getkategori()
		{
			$sql = $this->db->query("SELECT idKategori,namaKategori FROM kategori");
			return $sql->result();
			
		}
		
		
	}
	
	  ?>