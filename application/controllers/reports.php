<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Reports extends Core_Controller {	// Remember to cup gently
	
	function __construct()
	{
		parent::__construct();
		
		$this->load->model("report_model");
		$this->load->model("site_model");
		$this->load->model("bug_model");
	}
	
	public function index()
	{
		$this->data->sites = $this->site_model->listAccount();
		$this->render_view('reports/dashboard.php');
	}
	
	public function site($track_id = false)
	{
		if ( !$track_id ) { redirect(base_url().'reports'); }
		
		$bugs = $this->report_model->getSite($track_id);
		$organizedBugs = array();
		
		foreach ( $bugs as $bug ) {
			$organizedBugs[urlencode($bug->url)][] = $bug;
		}
		
		$this->data->bugs = $organizedBugs;
		$this->render_view('reports/siteReport.php');
	}
	
	public function imgCapture($id) {
		
		$bug = $this->bug_model->get($id);
		
		header("Content-type: image/png");
		echo 'data:image/png;base64,' . $bug->screenshot;
		
		exit;
	}
}
