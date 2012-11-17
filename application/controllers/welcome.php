<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends Core_Controller {

	function __construct()
	{
		parent::__construct();
	}
	
	public function index()
	{
		
		print_r($this->data);

		$this->load->view('welcome_message');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */