<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_StoreCategories extends MY_Model 
{
	protected $table_name = 'store_categories';
	protected $order_by = 'priority';
	public $rules = [
		[
			'field' => 'cat_title',
			'label' => 'Category Title',
			'rules' => 'trim|required',
		],
	];
}