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
		
		// Load us up the views
		$this->load->view('templates/head', $this->data);
		$this->load->view($view, $this->data);
		$this->load->view('templates/foot', $this->data);
	
    }

	public function logged_in()
	{
		return $this->user_model->is_logged_in();
	}

}
