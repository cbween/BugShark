<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Testies extends Core_Controller {	// Remember to cup gently
	
	function __construct()
	{
		parent::__construct();
		
		$this->load->model("bug_model");
		$this->load->model("site_model");
	}
	
	public function index()
	{
		$this->render_view('testies/getSite');
	}
	
	public function g($track_id = false)
	{
		if ( !$track_id ) { $this->_sendOut(array("error"=>"noid", "message"=>"No idea who you are.")); }
		$site_settings = $this->site_model->getByTrack($track_id);
		
		$this->_sendOut($site_settings);
	}
	
	public function s()
	{
		$post = false;
		$post = $this->input->post(null, true);
		
		$this->_validateInitial($post);
		$this->bug_model->save($post);
	}
	
	private function _validateInitial($post = false)
	{
		if ( !$post ) {
			$error['error'] = "MissingNO";
			$error['message'] = "Missing data!";
			
			$this->_sendOut($error);
		}
		
		if ( !isset($post['track_id']) ) {
			$error['error'] = "Missing Tracking";
			$error['message'] = "Who the hell are you?";
			
			$this->_sendOut($error);
		}
	}
	
	private function _sendOut($json = false)
	{
		echo json_encode($json);
		exit;
	}
}
