<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Registration extends CI_Controller {

	public function index()
	{
		$this->load->view('registration');
	}

	public function register()
	{
		$this->form_validation->set_rules('first_name', 'First Name', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required|max_length[100]|callback_user_check');
		$this->form_validation->set_rules('address1', 'Address1', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('city', 'City', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('state', 'State', 'trim|required|max_length[2]');
		$this->form_validation->set_rules('zip', 'ZIP', 'trim|required|max_length[10]|callback_zip_check');
		$this->form_validation->set_rules('country', 'Country', 'required|max_length[2]|callback_country_check');
		$this->form_validation->set_message('user_check', 'This user already exists!');
		$this->form_validation->set_message('zip_check', 'Please enter a valid zipcode ex: 54321 or 54321-1234');
		$this->form_validation->set_message('country_check', 'Country must be set to US');

		// hold error messages in div
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');

		// check for validation
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('registration');
		}
		else
		{
			$person_flds = array(
				'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name')
			);
			$this->db->insert('person', $person_flds);
			$person_id = $this->db->insert_id();

			$flds = array(
				'person_id' => $person_id,
				'created' => date('Y-m-d H:i:s')
			);
			$this->db->insert('account', $flds);

			$flds = array(
				'person_id' => $person_id,
				'address1' => $this->input->post('address1'),
				'address2' => $this->input->post('address2'),
				'city' => $this->input->post('city'),
				'state' => $this->input->post('state'),
				'zip' => $this->input->post('zip'),
				'country' => $this->input->post('country')
			);
			$this->db->insert('location', $flds);
			$this->load->view('/confirmation', $person_flds);
		}
	}
	public function country_check($str)
	{
		$ret = TRUE;
		if ($str != 'US')
		{
			$ret = FALSE;
		}
		return $ret;
	}

	public function user_check($last_name)
	{
		$ret = TRUE;
		$q = <<<QUERY
SELECT id
  FROM person
WHERE first_name = ?
  AND last_name = ?
QUERY;
		$query = $this->db->query($q, array($this->input->post('first_name'), $last_name));
		if ($query->num_rows() > 0)
		{
			$ret = FALSE;
		}
		return $ret;		
	}

	public function zip_check($zip)
	{
		$ret = FALSE;		
		if(preg_match("/^\d{5}(-\d{4})?$/",$zip))
		{
			$ret = TRUE;
		}
		return $ret;		
	}
}

/* End of file registration.php */
/* Location: ./application/controllers/registration.php */