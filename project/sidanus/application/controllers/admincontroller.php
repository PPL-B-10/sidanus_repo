<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class admincontroller extends CI_Controller {

	public function __construct() {        
		parent::__construct();
	}
	
	public function viewadmin()
	{
		$this->load->model('adminmodel');
		
		
		$data['adminnya'] = $this->adminmodel->viewtoko();
		
		$this->load->view('adminUI', $data);
		
	}
	
	public function updateStatusPenjual()
	{
		
	}
	
	public function blockToko()
	{
		$this->adminmodel->blokir();
	}
	
}
	?>