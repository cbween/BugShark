<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Sitemanager extends Core_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('site_model');
	}
	
	public function index()
	{
		$this->data->sites = $this->site_model->listAccount();
		
		if ( empty($this->data->sites) ) {
			$this->render_view('sites/listTutorial');
		} else {
			$this->render_view('sites/list');
		}
	}
	
	public function details($id = false)
	{
		if ( !$id ) { retirect(base_url().'sitemanager'); }
		
		$this->data->site = $this->site_model->get($id);
		$this->render_view('sites/detail');
	}
	
	public function addsite()
	{
		$form = false;
		$form = $this->input->post(null, true);
		
		if ( $form ) {
			if ( ($site = $this->site_model->add($this->data->user->id, $form)) != false )
			{
				redirect(base_url(). 'sitemanager/details/'.$site->id);
			} else {
				die("fubar!");
			}
		}
		
		$this->render_view('sites/addSite');
	}
}
