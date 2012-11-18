<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class About extends Core_Controller {

	function __construct()
	{
		parent::__construct();
	}
	
	public function index()
	{
		$this->render_view('about');
	}
}
