<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends Core_Controller {

    function __construct()
    {
        parent::__construct();
		$this->load->model("user_model");
		
    }

    public function index()
    {
		// Nothing here!
    }

	public function login() 
	{	
		// Add a redirect function?
		if ( $login = $this->input->post(null, true) ) {
			$this->_validateLogin($login);
		}
		
		$this->render_view('user/login', $this->data);
	}
	
	public function register()
	{	
		$this->data->registration = new stdClass();
		$this->data->registration = (object) $this->input->post(null, true);
		
		// There is no registration post object. 
		if ( !empty( $this->data->registration ) ) {
			if ( $this->data->registration->password === $this->data->registration->confirm_password ) {
				
				// Use the model to register our user. 
				if ( !$this->user_model->register($this->data->registration) ) {
					redirect( base_url()."account/login" );
				}
				
				// Worked? Log me in!
				if ( $this->_validateLogin(array("email"=>$this->data->registration->username, "password"=>$this->data->registration->password)) ) {
					redirect( base_url() );
				}
			} else {
				$this->session->set_flashdata('notify', 'Your Passwords must match.');
			}
		}
		
		$this->render_view('account/register', $this->data);
	}
	
	/**
	* handles login
	*/
	private function _validateLogin($form) {
		
		if (empty($form['username'])) { $this->session->set_flashdata('notify','Please enter in a username'); return false; }
		if (empty($form['password'])) { $this->session->set_flashdata('notify','Please enter in a password'); return false; }
		
		// Is the email address provided an user?
		if ( !$user = $this->user_model->get_where(array("username"=>$form['username'])) ) {
			$this->session->set_flashdata('notify','Incorrect Login Information.'); return false;
		}
		
		// Load up the password hashing class.
		$this->load->helper('hashPassword', "hashPassword");
		$this->hashPassword = new Passwordhash_Admin_Helper();
		
		// Check if our password matches the one provided
		if ( $this->hashPassword->CheckPassword($form['password'], $user->password) === true ) {
			
			// Attempt to log in the user.
			if ( !$this->user_model->login() ) { $this->session->set_flashdata('notify','Incorrect Login Information.'); return false; }	
			$this->session->set_userdata($this->user->user);
			
			// Check for that redirect var!
			if ( isset($form['redirect']) ) {
				redirect($form['redirect']);
			}
			
			redirect(base_url());
		}

		// if we got here then the username and/or password didn't match
		$this->session->set_flashdata('notify','Incorrect Login Information.'); return false;
		return false;
	}
	
	/**
	* logout page
	*/
	public function logout() {
		$this->user_model->logout();
		redirect(base_url());
	}
	
}
