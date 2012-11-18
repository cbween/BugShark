<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Reports extends Core_Controller {	// Remember to cup gently
	
	function __construct()
	{
		parent::__construct();
		
		$this->load->model("report_model");
		$this->load->model("site_model");
	}
	
	public function index()
	{
		$this->data->sites = $this->site_model->listAccount();
		$this->render_view('reports/dashboard.php');
	}
	
	public function site($track_id = false)
	{
		if ( !$track_id ) { redirect(base_url().'reports'); }
		
		$this->data->bugs = $this->report_model->getSite($track_id);
		$this->render_view('reports/siteReport.php');
	}
}
