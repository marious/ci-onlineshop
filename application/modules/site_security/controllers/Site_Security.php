<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Site_Security extends MY_Controller 
{

	public function not_allowed()
	{
		echo 'you are not allowed to be here';
	}


	public function _make_sure_is_admin()
	{
		$is_admin = true;

		if ($is_admin != true) {
			redirect('site_security/not_allowed');
		}
	}

}