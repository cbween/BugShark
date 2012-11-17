<?php
class User_model extends Core_Model
{
	function __construct()
    {
		parent::__construct();
        $this->users = array(); // Cached results
	}
	
	function get($sid = false)
	{
        // If there's no session, the user is clearly not logged in.
		if ( !$sid = $_SESSION['sid'] ) {
             return false;
		}
		
		$user = $this->get_where(array("sid"=>$sid));
        $this->users[$user->id] = $user; // Cache
        return $user;
	}

    public function get_by_id($id)
    {
        if ($this->users[$id]) {
            return $this->users[$id];
        }
        $user = $this->db->get_where('users', array('id' => $id))->row();
        $this->users[$user->id] = $user;
        return $user;
    }
	
	public function get_where($where = array()) {
		
		$this->user = $this->db->get_where("users", $where);
		
		if ( $this->user->num_rows == 1 ) {
			$this->user = $this->db->get_where("users", $where)->row();
		} else {
			$this->user = $this->db->get_where("users", $where)->result();
		}
		
		return $this->user;
	}
	
	function login() {
		
		// Set the Session ID
		$sid = md5(microtime());
		$update = array('sid' => $sid,'last_login' => date("Y-m-d H:i:s", time()));
        $where = array('id' => $this->user->id);
		$this->db->update('users', $update, $where);
		
		if ( $this->user = $this->get_where(array("sid"=>$sid)) ) {
			$_SESSION['sid'] = $this->user->sid;
			return true;
		}
		
		return false;
	}
	
	function is_logged_in() {
		if ( isset($_SESSION['sid']) ) {
			return $_SESSION['sid'];
		}
		
		if ( $user = $this->get() ) {
			return true;
		} 
		return false;
	}
	
	function logout() {
		
		$update = array('sid' => NULL);
        $where = array('id' => $this->session->userdata('id'));

		$this->db->update('users', $update, $where);
		$this->session->sess_destroy();
		unset($_SESSION['sid']);
		unset($this->data->user);
		
		return true;
	}

	function register($registration)
	{
		// Check if user exists
		$current_users = $this->db->select("email")->from('users')->where(array("email"=>$registration->email))->get();
		if ( $current_users->num_rows != 0 ) { 
			$this->session->set_flashdata('notify', 'You have all ready registered.');
			return false; 
		}

		$this->load->helper('hashPassword');
		$passwordHash = $this->hashPassword($registration->password);
		
		if ( !isset($registration->email) ) { return false; }
		if ( !isset($registration->fname) ) { return false; }
		if ( !isset($registration->lname) ) { return false; }
		if ( !isset($registration->address) ) { return false; }
		if ( !isset($registration->city) ) { return false; }
		if ( !isset($registration->state) ) { return false; }
		if ( !isset($registration->zip) ) { return false; }
		
		$time = date("Y-m-d H:i:s", time());
		
		$update = array(
			"sid"=>NULL,
			"created"=>$time,
			"modified"=>$time,
			"last_login"=>NULL,
			"status"=>"t",
			"email"=>$registration->email,
			"fname"=>$registration->fname,
			"lname"=>$registration->lname,
			"address"=>$registration->address,
			"city"=>$registration->city,
			"state"=>$registration->state,
			"zip"=>$registration->zip,
			"password"=>$passwordHash
		);
		
		if ( isset($registration->address2) ) { $update['address2'] = $registration->address2; }
		if ( isset($registration->phone) ) { $update['phone'] = $registration->phone; }
		
		if ( $insert = $this->db->insert('users', $update) ) { 
			return true;
		}
		
		return false;
	}
	
	public function get_session()
    {
        $session = (object) $this->session->userdata;
        if ( !$session->sid ) {
            return false;
        }

		return $session->sid;
    }
	
	/**
	* hashes password
	*/
	public function hashPassword($password) {
		$hash = new Passwordhash_Admin_Helper;
		return $hash->HashPassword($password);
	}
}
