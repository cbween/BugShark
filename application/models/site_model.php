<?php
class Site_model extends Core_Model
{
	function __construct()
    {
		parent::__construct();
	}
	
	public function listAccount()
	{
		$this->data->user;
	
	
		return true;
	}
	
    public function get($id = false)
    {
		return $this->db->get_where('sites', array("id"=>$id))->row();
    }

	public function getByTrack($track_id)
	{
		return $this->db->get_where("sites", array("track_id"=>$track_id))->row();
	}
	
	public function get_where($where = array()) 
	{
	
	}
	
	public function add($user_id = false, $form = array())
	{
		if ( empty($form) || !is_array($form) ) { return false; }
		if ( !$user_id ) { return false; }
		
		// Meh
		$form['user_id'] = $user_id;
	//	if ( !$this->_validate($form) ) { return false; }
		
		$starts = strtotime($form['starts']['date']. ' '.$form['starts']['hour']. ':'.$form['starts']['min']. ':00');
		$ends = strtotime($form['ends']['date']. ' '.$form['ends']['hour']. ':'.$form['ends']['min']. ':00');
		
		$insert = array(
			"user_id"=>$form['user_id'],
			"track_id"=>substr(sha1($form['url'].time()), 0, 7),
			"title"=>$form['title'],
			"url"=>$form['url'],
			"created"=>date("c", time()),
			"starts"=>date("c", $starts),
			"ends"=>date("c", $ends),
			"bounty"=>$form['bounty']
		);
		
		if  ( $this->db->insert('sites', $insert) ) {
			return $this->db->get_where('sites', array("id"=>mysql_insert_id()))->row();
		}
	}
	
	private function _validate($insert = array())
	{
		$error = false;
		
		// Check for a unique URL
		$urlCheck = $this->db->get_where('sites', array("url"=>$insert['url']));
		if ( $urlCheck->num_rows > 0 ) {
			$error = true;
		}
		
		// Check we have a user_id
		if ( !isset($insert['user_id']) || trim($insert['user_id']) == "" )
		{
			$error = true;
		}
		
		return $error;
	}
}
