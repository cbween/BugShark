<?php
class Bug_model extends Core_Model
{
	function __construct()
    {
		parent::__construct();
	}
	
	public function get($id) {
		return $this->db->get_where('bugs', array("id"=>$id))->row();
	}
	
	public function save($form = false)
	{
		if ( !$form ) { return false; }
		
		$insert = array(
			"track_id"=>$form["track_id"],
			"url"=>$form["url"],
			"type"=>$form["type"],
			"comments"=>$form["comments"],
			"screenshot"=>$form["screenshot"],
			"log"=>json_encode($form["log"]),
			"email"=>json_encode($form["email"])
		);
		
		return $this->db->insert("bugs", $insert);
	}
}
