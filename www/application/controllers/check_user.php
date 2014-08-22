<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Check_user extends CI_Controller {

	public function index()
	{
		if (!empty($_POST['first_name']) && !empty($_POST['last_name']))
		{
			$ret = 'false';
			$user = $this->is_user_unique($this->input->post('first_name'), $this->input->post('last_name'));
			if ($user)
				$ret = 'true';
		}
		echo $ret;
	}
	
	private function is_user_unique($first_name, $last_name)
	{
		$ret = 0;
		$q = <<<QUERY
SELECT id
  FROM person
WHERE first_name LIKE ?
	AND last_name LIKE ?
QUERY;
		$query = $this->db->query($q, array($first_name, $last_name));
		if ($query->num_rows() == 0)
				$ret = 1;
		return $ret;				
	}
}

/* End of file check_user.php */
/* Location: ./application/controllers/check_user.php */