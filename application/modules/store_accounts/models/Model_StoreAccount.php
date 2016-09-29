<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_StoreAccount extends MY_Model 
{

	protected $table_name = 'store_accounts';

	protected $order_by = 'lastname';

	public $rules = [
		[
			'field' => 'firstname',
			'label' => 'First Name',
			'rules' => 'trim|required|min_length[3]'
		],
		[
			'field' => 'lastname',
			'label' => 'Last Name',
			'rules' => 'trim|required|min_length[3]'
		],
		[
			'field' => 'company',
			'label' => '',
			'rules' => 'trim|required|'
		],
		[
			'field' => 'company',
			'label' => 'Company Name',
			'rules' => 'trim'
		],
		[
			'field' => 'address1',
			'label' => 'Address 1',
			'rules' => 'trim|required'
		],
		[
			'field' => 'address2',
			'label' => 'Address 2',
			'rules' => 'trim'
		],
		[
			'field' => 'city',
			'label' => 'City',
			'rules' => 'trim|required'
		],
		[
			'field' => 'country',
			'label' => 'Country',
			'rules' => 'trim|required'
		],
			[
			'field' => 'postcode',
			'label' => 'Postcode',
			'rules' => 'trim|required'
		],
			[
			'field' => 'telnum',
			'label' => 'Telephone Number',
			'rules' => 'trim|required|min_length[7]'
		],
		[
			'field' => 'email',
			'label' => 'Email Address',
			'rules' => 'trim|required|valid_email'
		],
		[
			'field' => 'pword',
			'label' => 'Password',
			'rules' => 'required|min_length[6]',
		],
		[
			'field' => 'password_confirm',
			'label' => 'Password Confirmation',
			'rules' => 'required|matches[pword]',
		],
	];


}