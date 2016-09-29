<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Store_Item_Sizes extends Admin_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_StoreItemSizes', 'model');
	}


	public function update($id)
	{
		$id && is_numeric($id) || redirect(static::ADMIN_NOTALLOWED_REDIRECT);

		// Fetching Existing options for this size
		$this->db->order_by("size");
		$this->data['sizes'] = $this->model->get_by(array('item_id' => $id));


		$this->data['headline'] = 'Update Item Sizes';
		$this->data['id'] = $id;

		$this->template('update', $this->data);
	}


	public function submit($id)
	{
		$id && is_numeric($id) || redirect(static::ADMIN_NOTALLOWED_REDIRECT);

		
		$submit = $this->input->post('submit');
		$size = trim($this->input->post('size', true));

		if ($submit == 'finished') {
			redirect('store_items/create/'. $id);
		} else if ($submit == 'submit') {
			// attempt an insert
			if ($size != '') {
				$data['item_id'] = $id;
				$data['size'] = $size;
				$this->model->save($data);

				$this->session->set_flashdata("success", "New Size option was successfully added");
			}
		}

		redirect("store_item_sizes/update/$id");
	}


	function delete($id)
	{
		$id && is_numeric($id) || redirect(static::ADMIN_NOTALLOWED_REDIRECT);

		// Fetch the specifice id 
		$item = $this->model->get($id);
		
		if (count($item)) {
			// delete it 
			$this->model->delete($id);
			$this->session->set_flashdata("success", "size deleted successfully");
			redirect("store_item_sizes/update/" . $item->item_id);
		}
	}

}