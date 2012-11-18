<?php
class Core_Controller extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
		$this->data = new stdClass();
		
		$this->data->user = $this->user_model->get(); // Grabs the user if set	
    }

    protected function render_view($view)
    {
		// $this->data->template = file_get_contents($_SERVER['DOCUMENT_ROOT'].'/'.APPPATH.'/views/'.$view.'.php');
		// $this->load->view('ajax', $this->data);
		// 
		// 	
		// if ( $this->input->is_ajax_request() && array_shift($this->uri->segments) == 'testies' ) {
		// 		
		// 
		// 	$this->data->template = file_get_contents(APPPATH.$view.'.php');
		// 	$this->load->view('ajax', $this->data);
		// 
		// } else {
			// Load us up the views
			$this->load->view('templates/head', $this->data);
			$this->load->view($view, $this->data);
			$this->load->view('templates/foot', $this->data);
		//}
    }

	public function logged_in()
	{
		return $this->user_model->is_logged_in();
	}

}
