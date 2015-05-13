<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class transaksicontroller extends CI_Controller {

	public function __construct() {        
		parent::__construct();
	}
	
	public function dbnya()
	{
			$serverdb = "localhost";
			$usernamedb = "k6519841_ppl";
			$passworddb = "testing12345";
	
			$id_mysql = mysql_connect($serverdb ,$usernamedb,$passworddb);
			$database = mysql_select_db("k6519841_ppl",$id_mysql);

	}
	
	public function updateStatusPesanan()
	{
		$this->transaksimodel->updatestatus();
	}
	
	public function suksesconfirm()
	{
		$this->load->view("suksesconfirm");
	}
	
	public function gagalconfirm()
	{
		$this->load->view("gagalconfirm");
	}
	
	function updatetransaksi()
	{
		$this->transaksimodel->updatetransaksi();
	}
	
	
	
	public function getDataTransaksi()
	{
		$this->load->model('transaksimodel');
		
		$data['transaksinya'] = $this->transaksimodel->gettransaksi2();
		$this->load->view('transaksiUI', $data);
	}
	
	public function konfirmasipemb()
	{
		$this->load->view("konfirmasipembayaranUI");
	}
	
	public function tampilkanStatusPesanan()
	{
		$temp = base_url();
		$nomor = $_POST['nomor'];
		$email = $_POST['email'];
		$this->dbnya();
		$sql ="SELECT namaPembeli FROM pengunjung WHERE idPembelian='$nomor' AND email='$email'";
		$hasil= mysql_query($sql);
		if(mysql_affected_rows() >0)
	  	{
	  		$this->load->model('transaksimodel');
	  		$data['id'] = "transaksi";
		
			$data['data_transaksi2'] = $this->transaksimodel->getidpembelian();
			$data['data_transaksi'] = $this->transaksimodel->gettransaksi($nomor,$email);
			
			$this->load->view('statusUI', $data);
	  	}else
	  	{
	  		echo"<script> alert('Email atau nomor tidak terdaftar'); window.location.href='$temp';</script>";
	  	
	  	}
		
	}
}
	?>