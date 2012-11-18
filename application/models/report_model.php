<?php
class Report_model extends Core_Model
{
	function __construct()
    {
		parent::__construct();
	}
	
	public function getSite($track_id)
	{
		return $this->db->get_where('bugs', array("track_id"=>$track_id))->result();	
	}
}
