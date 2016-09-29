<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Templates extends MX_Controller 
{

	function test()
	{
		$data = "";
		$this->public_jqm($data);
	}


	public function public_bootstrap($data)
	{
		$this->load->view('public_bootstrap', $data);
	}



	public function public_jqm($data)
	{
		$this->load->view('public_jqm', $data);
	}



	public function admin($data)
	{
		$this->load->view('admin', $data);
	}

}