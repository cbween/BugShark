<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends Core_Controller {

	function __construct()
	{
		parent::__construct();
	}
	
	public function index()
	{

		$this->load->view('welcome_message');
	}
}
