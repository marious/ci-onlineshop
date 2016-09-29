<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Store_Item_Colors extends Admin_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_StoreItemColors', 'model');
	}


	public function update($id)
	{
		$id && is_numeric($id) || redirect(static::ADMIN_NOTALLOWED_REDIRECT);

		// Fetching Existing options for this color
		$this->db->order_by("color");
		$this->data['colors'] = $this->model->get_by(array('item_id' => $id));


		$this->data['headline'] = 'Update Item Colors';
		$this->data['id'] = $id;

		$this->template('update', $this->data);
	}


	public function submit($id)
	{
		$id && is_numeric($id) || redirect(static::ADMIN_NOTALLOWED_REDIRECT);

		
		$submit = $this->input->post('submit');
		$color = trim($this->input->post('color', true));

		if ($submit == 'finished') {
			redirect('store_items/create/'. $id);
		} else if ($submit == 'submit') {
			// attempt an insert
			if ($color != '') {
				$data['item_id'] = $id;
				$data['color'] = $color;
				$this->model->save($data);

				$this->session->set_flashdata("success", "New Color option was successfully added");
			}
		}

		redirect("store_item_colors/update/$id");
	}


	function delete($id)
	{
		$id && is_numeric($id) || redirect(static::ADMIN_NOTALLOWED_REDIRECT);

		// Fetch the specifice id 
		$item = $this->model->get($id);
		
		if (count($item)) {
			// delete it 
			$this->model->delete($id);
			$this->session->set_flashdata("success", "color deleted successfully");
			redirect("store_item_colors/update/" . $item->item_id);
		}
	}

}