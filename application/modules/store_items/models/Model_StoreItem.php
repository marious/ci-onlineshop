<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_StoreItem extends MY_Model 
{
	protected $table_name = 'store_items';

	protected $order_by = 'item_title';


	public $rules = [
		'item_title' => [
			'label' => 'Item Title',
			'field' => 'item_title',
			'rules' => 'trim|required|min_length[3]|max_length[240]|callback__unique_title',
		],
		'item_url' => [
			'label' => 'Item Url',
			'field' => 'item_url',
			'rules' => 'trim|required|url_title|callback__unique_url',
		],
		'item_price' => [
			'label' => 'Item Price',
			'field' => 'item_price',
			'rules' => 'trim|required|numeric',
		],
		'was_price' => [
			'label' => 'Was Price',
			'field' => 'was_price',
			'rules' => 'trim|numeric',
		],
		'is_active' => [
			'label' => 'Is Active',
			'field' => 'is_active',
			'rules' => 'trim|required|in_list[0,1]',
		],
		'item_description' => [
			'label' => 'Item Description',
			'field' => 'item_description',
			'rules' => 'trim|required'
		],
	];





}