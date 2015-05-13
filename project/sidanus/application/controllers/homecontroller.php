<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class homecontroller extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct() {        
		parent::__construct();
	}
	public function index()
	{
		$this->load->model('homeModel');
		
		$data['kategorinya'] = $this->homeModel->getkategori();
		$this->load->view('homeUI', $data);
		
	}
	
	public function showPanduanBelanja()
	{
		$data['indi'] = "panduanbelanja";
		$this->load->view("LayananInfoUI", $data);
		
	}
	public function showPanduanJual()
	{
		$data['indi'] = "panduanjual";
		$this->load->view("LayananInfoUI", $data);
		
	}
	public function showFAQ()
	{
		$data['indi'] = "faq";
		$this->load->view("LayananInfoUI", $data);
		
	}
	public function showPembayaran()
	{
		$data['indi'] = "pembayaran";
		$this->load->view("LayananInfoUI", $data);
		
	}
	public function showKontak()
	{
		$data['indi'] = "kontak";
		$this->load->view("LayananInfoUI", $data);
		
	}
	public function showKebijakan()
	{
		$data['indi'] = "kebijakan";
		$this->load->view("LayananInfoUI", $data);
		
	}
	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */