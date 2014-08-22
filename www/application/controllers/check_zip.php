<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Check_zip extends CI_Controller {

	public function index()
	{
		if (!empty($_POST['zip']))
		{
			$ret = 'false';
			if(preg_match("/^\d{5}(-\d{4})?$/", $this->input->post('zip')))
			{
				$ret = 'true';
			}
			echo $ret;		
		}
	}
}

/* End of file check_zip.php */
/* Location: ./application/controllers/check_zip.php */