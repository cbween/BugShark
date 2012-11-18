<?php
class Bug_model extends Core_Model
{
	function __construct()
    {
		parent::__construct();
	}
	
	public function save($form = false)
	{
		if ( !$form ) { return false; }
		
		$insert = array(
			"track_id"=>$form["track_id"],
			"url"=>urlencode($form["url"]),
			"type"=>$form["type"],
			"comments"=>$form["comments"],
			"screenshot"=>$form["screenshot"],
			"log"=>json_encode($form["log"])
		);
		
		return $this->db->insert("bugs", $insert);
	}
}
