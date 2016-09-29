<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends MX_Controller 
{
	public $data = [];

	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->module('templates');

		if (! isset($this->data['view_module'])) {
			$this->data['view_module'] = $this->uri->segment(1);
		}
	}


		/**
	 * admin template view 
	 * @param string view file 
	 * @param array $data
	 */
	protected function template($view_file, $data)
	{
		$data['view_file'] = $view_file;
		$this->templates->admin($data);
	}

	protected function publicTemplate($view_file, $data)
	{
		$data['view_file'] = $view_file;
		$this->templates->public_bootstrap($data);
	}


}