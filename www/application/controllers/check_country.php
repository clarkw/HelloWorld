<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Check_country extends CI_Controller {

	public function index()
	{
		if (!empty($_POST['country']))
		{
			$ret = 'false';
			$country = $this->input->post('country');
			if ($country == 'US')
				$ret = 'true';
		}
		echo $ret;
	}
}

/* End of file check_country.php */
/* Location: ./application/controllers/check_country.php */