<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Store_Categories extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_StoreCategories', 'model');
	}

	function sort() 
	{
		$number = $this->input->post('number', true);
		for($i = 1; $i <= $number; $i++) {
			$update_id = $_POST['order'.$i];
			$data['priority'] = $i;
			$this->model->save(array('priority' => $data['priority']), $update_id);
		}
	}

	public function _draw_sortable_list($parent_cat_id)
	{
		$this->data['categories'] =  $this->model->get_by(array(
				'parent_cat_id' => $parent_cat_id
			));
		$this->load->view('sortable_list', $this->data);
	}

	public function manage()
	{
		$parent_cat_id = $this->uri->segment(3);
		if (!is_numeric($parent_cat_id)) {
			$parent_cat_id = 0;
		}

		$this->data['parent_cat_id'] = $parent_cat_id;

		$this->data['categories'] = $this->model->get_by(array(
				'parent_cat_id' => $parent_cat_id,
			));

		$this->data['sort_this'] = true;

		// load view
		$this->template('manage', $this->data);
	}

	public function create($id = null)
	{
		// Setting header <h1> title
		$this->data['headline'] = is_numeric($id) ? 'Update Category' : 'Add New Category';

			// Fetch category or set a new one 
		if ($id && is_numeric($id)) {
			$this->data['category'] = $this->model->get($id);
			count($this->data['category']) || redirect('store_categories/manage');
			$this->data['id'] = $id;		// Flag deopen on we can determins something in view
		} else if ($id == null) {
			$this->data['category'] = $this->model->get_new();
			$this->data['id'] = false;
		}

		$this->data['options'] = $this->get_dropdown_options($id);
		$this->data['num_dropdown_options'] = count($this->data['options']);

		// Setup the form
		$rules = $this->model->rules;
		$this->form_validation->set_rules($rules);


		// Process the form 
		if ($this->form_validation->run($this) == true) {
			$data = $this->model->array_from_post(array('cat_title', 'parent_cat_id'));
			$this->model->save($data, $id);
			$message = ($id == null) ? 'Category Added Successfully' : 'Category Updated Successfully';
			$this->session->set_flashdata('success', $message);
			redirect("store_categories/manage");
		}

		// Load template
		$this->template('create', $this->data);
	}


	public function _count_sub_cats($update_id)
	{
		// return the number of sucategories and this category
		$rows = $this->model->get_by(array(
				'parent_cat_id' => $update_id
			));
		return count($rows);
	}

	public function _get_parent_cat_title($parent_id)
	{
		if (! is_numeric($parent_id)) {
			return '-';
		}
		$cat = $this->model->get_by(array('id' => $parent_id), true);
		if ($cat) {
			return $cat->cat_title;
		}
		return '-';
	}

	/**
	 * Get parent for specific id to use in dropdown
	 */
	protected function get_dropdown_options($id)
	{
		if (! is_numeric($id)) {
			$id = 0;
		}
		// build an array of all parent category
		$this->db->where('parent_cat_id = 0');
		$this->db->where('id != ' . $id);
		$query = $this->db->get('store_categories');
		$options['0'] =  'Please select..';
		if ($query->result()) {
			foreach ($query->result() as $row) {
				$options[$row->id] = $row->cat_title;
			}
			return $options;
		}
		return false;
	}
}