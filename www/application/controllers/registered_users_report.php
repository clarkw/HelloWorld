<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Registered_users_report extends CI_Controller {

	public function index()
	{
		$data['users'] = $this->get_user_report();
		$this->load->view('registered_users_report', $data);
	}
	
	private function get_user_report()
	{
		$q = <<<QUERY
SELECT p.first_name,
			 p.last_name,
			 l.address1,
			 l.address2,
			 l.city,
			 l.state,
			 l.zip,
			 l.country,
			 DATE_FORMAT(a.created, '%Y-%m-%d %H:%i:%s') as date_created
  FROM person p
 INNER JOIN account a
		ON p.id = a.person_id
 INNER JOIN location l
		ON p.id = l.person_id
QUERY;
			$query = $this->db->query($q);
		if ($query->num_rows() > 0)
		{
			$rows = $query->result();
		}
		else
		{
			$rows = (object) array();
		}
		return $rows;
	}		
}

/* End of file registered_users_report.php */
/* Location: ./application/controllers/registered_users_report.php */