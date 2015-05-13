<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class produkcontroller extends CI_Controller {

	public function __construct() {        
		parent::__construct();
	}
	
	public function searchByKeyword()
	{
		$this->load->model('produkmodel');
		
		if($this->produkmodel->gethasilcari() == null)
		{
			$data['daftar_cari'] = "kosong";
		}else
		{
			$data['daftar_cari'] = $this->produkmodel->gethasilcari();
		}
		
		
		$this->load->view('hasilcariUI', $data);
	}
	
	
	public function searchbykategori()
	{
		$this->load->model('produkmodel');
		
		$data['id'] = "produkbykategori";
		$data['produkbykategori'] = $this->produkmodel->showprodukbykategori();
		$data['namakategori'] = $this->produkmodel->showKategoriName();
		
		$this->load->view('produkkategoriUI', $data);
		
		
	}
	
	public function addProduk()
	{
		
		$this->load->view('produkformUI');
	}
	
	
	public function showreviewform()
	{
		$id = $_GET['i'];
		$temp = base_url();
		if($id !== null)
		{
			
			$sql = "SELECT p.inditesti FROM pengunjung p,pembelian b WHERE b.idPembelian=p.idPembelian AND b.hashnya='$id'";
			$result = mysql_query($sql);
			$baris = mysql_fetch_array($result);
			
			if($baris[0]==0)
			{
				$this->load->model('produkmodel');
			
				$data['dataproduk'] = $this->produkmodel->getdatareview();
				$data['datatoko'] = $this->produkmodel->getdatareviewtoko();
				$this->load->view('formreviewUI',$data);
			
			}else
			{
				echo"<script>alert('testimoni sudah diisi');window.location.href='$temp';</script>";
			}
		
		}else
		{
			echo"<script>window.location.href='$temp';</script>";
		
		
		}
		
		
		
	}
	
	public function tambahfeedtesti()
	{
		
		$this->tambahfeedtestimodel->tambahfeedback();
	}
	
	
	
	public function do_upload(){
	session_start();
		$user= $_SESSION['user'];
		
		$nama= $_POST['nama'];
		$pathToUpload = './assets/images/'.$user.'/produk/'.$nama.'/';
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
			'file_name' => '1'
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
			'file_name' => '1'
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
	
	
	public function addproduknya()
	{
		$this->do_upload();
		$this->produkmodel->tambahproduknya();
	}
	
	public function deleteProduk()
	{
		$this->produkmodel->deleteproduknya();
	}
	
	public function editProduk()
	{
		$this->load->model('produkmodel');
		
		$data['ubahh'] = $this->produkmodel->ubahproduk();
		
		$this->load->view('ubahprodukUI', $data);
	
	}
	
	
	public function ubahproduknyaa()
	{
		$this->do_upload();
		$this->produkmodel->ubahproduknya();
	}
	
	public function addcart()
	{
		$this->load->library('cart');
		$this->load->view('a');
	}
	
	
	
	
	public function tampilkanProduk()
	{
		$this->load->model('produkmodel');
		
		$data['id'] = "detilproduk";
		$data['testi'] = $this->produkmodel->gettesti();
		$data['namatoko'] = $this->produkmodel->getNamaToko();
		$data['idtoko'] = $this->produkmodel->getidToko();
		$data['detilnya'] = $this->produkmodel->getDetilnya();
		
		$this->load->view('produkUI', $data);
	}
}
	?>