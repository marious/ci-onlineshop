<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cart extends Admin_Controller 
{

	public function __construct()
	{
		parent::__construct();
	}


	public function _draw_add_to_cart($item_id)
	{
		$this->data['item_id'] = $item_id;
		$color_options = [];
		$submitted_color = $this->input->post('submitted_color', true);
	
		if (!$submitted_color) {
			$color_options[] = "Select...";
		}
		$this->data['submitted_color'] = $submitted_color;

		// Fetch the color options for this item 
		$query = $this->db->get_where('store_item_colors', "item_id = $item_id");
	
		foreach ($query->result() as $row) {
			$color_options[$row->id] = $row->color;
		}
		$this->data['color_options'] = $color_options;
		$this->data['num_colors'] = count($color_options);



		$submitted_size = $this->input->post('submitted_size', true);
		$size_options = [];	
		if (!$submitted_size) {
			$size_options[] = "Select...";
		}
		$this->data['submitted_size'] = $submitted_size;


			// Fetch the size options for this item 
		$query = $this->db->get_where('store_item_sizes', "item_id = $item_id");
		foreach ($query->result() as $row) {
			$size_options[$row->id] = $row->size;
		}
		$this->data['size_options'] = $size_options;
		$this->data['num_sizes'] = count($size_options);




		$this->load->view('add_to_cart', $this->data);
	}

}