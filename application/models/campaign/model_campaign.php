<?php  

class model_campaign extends CI_Model{

	public $data = array();

	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Prepare the variables from insert campaign
	 * @return array values from the campaign
	 */
	private function prepare_data()
	{
		$params = array(
			'id' => $this->db->escape_str($this->data['id']),
            'campaign' => $this->db->escape_str($this->data['campaign']),
            'design' => $this->db->escape_str($this->data['design']),
            'user' => $this->db->escape_str($this->data['user']),
            'date_created' => date('Y-m-d H:i:s'),
            'date_modified' => date('Y-m-d H:i:s'),
            'is_enable' => 1
        );

        return $params;
	}

	/**
	 * Save the campaign on the db
	 * @return int return the ID inserted
	 */
	public function store_campaign()
	{

		$data = $this->prepare_data();
		$sql = "CALL MANAGE_CAMPAIGN('".$data['campaign']."','". $data['design']."','". $data['user']."','". $data['date_created']."','". $data['date_modified']."','INSERT')";
		$query = $this->db->query($sql);

		$response = FALSE;
		if($query->num_rows() > 0)
        {
            $last_id = $query->result();
            $response = $last_id;
        }

        return $response;

	}

	public function show_all_campaigns()
	{
	    $sql = "SELECT id, campaign, design FROM sys_campaign WHERE is_enable = 1;";

        $query = $this->db->query($sql);

        if($query->num_rows() > 0){
            $campaigns = $query->result_array();
            $response = $campaigns;
        }
        else{
            $response = false;
        }

        return $response;
	}

	public function show_one_campaign($id)
	{

	}


}



?>