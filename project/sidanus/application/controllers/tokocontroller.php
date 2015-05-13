<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class tokocontroller extends CI_Controller {

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
	
	public function showprodukbytoko()
	{
		$this->load->view("toko-penjual");
		
	}
	public function detilproduk()
	{
		echo"<center>";
		$this->detilprodukmodel->getNamaToko();
		echo"<br>";
		$this->detilprodukmodel->getNamaProduk();
		$this->detilprodukmodel->getHargaProduk();
		$this->detilprodukmodel->getDeskripsi();
	}
	
	public function tampilkanToko()
	{
		$this->load->model('tokomodel');
		
		$data['testi'] = $this->tokomodel->gettesti();
		$data['profiltoko'] = $this->tokomodel->tampilkanToko();
		$data['produktoko'] = $this->tokomodel->getDetailToko();
		$this->load->view('tokoUI', $data);
	}
	
	public function getDetailToko()
	{
		
	}
	
	
	public function ubahprofiltoko()
	{
		$this->load->model('tokomodel');
		
		
		$data['ubahnya'] = $this->tokomodel->datanya();
		$this->load->view("ubahprofilUI", $data);
	}
	
	public function ubahprofilnya()
	{
		
		$this->do_upload();
		$this->tokomodel->ubahnya();
		
	}
	
	public function do_upload(){
	session_start();
		$user= $_SESSION['user'];
		
		$pathToUpload = './assets/images/'.$user.'/avatar/';
		if ( ! file_exists($pathToUpload) )
    		{
			mkdir($pathToUpload, 0777, TRUE);
			$config = array(
			'upload_path' => "$pathToUpload/",
			'allowed_types' => "jpg",
			'overwrite' => TRUE,
			'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
			'max_height' => "768",
			'max_width' => "1024",
			'file_name' => $user
			);
			$this->load->library('upload', $config);
			if($this->upload->do_upload())
			{
				
			}
			else
			{
			
			}
		}else
		{
		
			$config = array(
			'upload_path' => "$pathToUpload/",
			'allowed_types' => "jpg",
			'overwrite' => TRUE,
			'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
			'max_height' => "768",
			'max_width' => "1024",
			'file_name' => $user
			);
			$this->load->library('upload', $config);
			if($this->upload->do_upload())
			{
				
			}
			else
			{
			
			}
		}
		
		
		
	}
	
	
	
	
	
	public function showtransaksi()
	{
		$this->load->model('transaksimodel');
		
		$data['transaksinya'] = $this->detilprodukmodel->showprofiltoko();
		$this->load->view('transaksipenjualUI', $data);
	}
	
	

}
	?>