<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class akuncontroller extends CI_Controller {

	public function __construct() {        
		parent::__construct();
	}
	
	public function index()
	{
		$this->load->view("index");
		
	}
	
	public function ceklogin()
	{
		$this->akunmodel->login();
		
	}
		
	
	public function daftarakun()
	{
		// Require the required files.
		require 'vendor/SSO-master/SSO/SSO.php';
		
		// Path to CAS.php, make sure to change this to the suitable location.
		$cas_path = dirname(__FILE__).'/vendor/CAS/CAS.php';
		
		// Set the CAS path.
		SSO\SSO::setCASPath($cas_path);

		if(SSO\SSO::check())
		{
			$this->load->view("daftar-form");
		}
		else
		{
			SSO\SSO::authenticate();
			$this->load->view("daftar-form");
		}

		
	}
	
	public function getnpm(){
		// Require the required files.
		require 'vendor/SSO-master/SSO/SSO.php';
		
		// Path to CAS.php, make sure to change this to the suitable location.
		$cas_path = dirname(__FILE__).'/vendor/CAS/CAS.php';
		
		// Set the CAS path.
		SSO\SSO::setCASPath($cas_path);

		if(SSO\SSO::check())
		{
			$user = SSO\SSO::getUser();
			$npm = $user->npm;
			return $npm;
		}
		else
		{
			$user = SSO\SSO::getUser();
			$npm = $user->npm;
			return $npm;
		}
	}
	
	public function daftarakunbaru()
	{
		$npm = $this->getnpm();
		$this->akunmodel->daftar($npm);
			
	}
	
	public function penjual()
	{
		$this->load->model('produkmodel');
		
		
		session_start();
		$data['produktoko'] = $this->produkmodel->showprodukbytoko();
		$data['transaksinya'] = $this->produkmodel->showtransaksi();
		
		$this->load->view('toko-penjual', $data);
	}
	public function logout()
	{
		session_start();
		$temp = base_url();
		session_destroy();
		header("location:$temp");
	}
	
	public function forgotpass()
	{
		$this->load->view("resetUI");
	}
	public function resetpass()
	{
		$this->akunmodel->resetpassword();
		
	}
	public function resetsuccess()
	{
		$this->load->view("berhasil-reset");
	}
	public function wrongemail()
	{
		echo "<script type='text/javascript'>alert('email yang anda masukkan belum terdaftar')</script>";
		$this->load->view("reset-password");
		
	}

}
	?>