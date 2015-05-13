<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ajaxcontroller extends CI_Controller {

	public function __construct() {        
		parent::__construct();
	}
	
	public function insertdata()
	{
		
        $this->produkmodel->insertnya();
        
	}
	
}
	?>