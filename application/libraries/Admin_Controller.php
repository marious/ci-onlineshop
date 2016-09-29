<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_Controller extends MY_Controller 
{
	const ADMIN_NOTALLOWED_REDIRECT = 'site_security/not_allowed';

	public function __construct()
	{
		parent::__construct();

		$this->load->module('site_security');
		$this->site_security->_make_sure_is_admin();
		$this->load->library('form_validation');	
	}






}