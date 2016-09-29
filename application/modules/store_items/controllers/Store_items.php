<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Store_Items extends Admin_Controller 
{

	const BIG_PIC_PATH = './assets/big_pics/';
	const SMALL_PIC_PATH = './assets/small_pics/';


	public function __construct()
	{
		parent::__construct();
		// load the model
		$this->load->model('Model_StoreItem', 'model');
		$this->data['view_module'] = 'store_items';		// our module name for loading template

	}

	public function view($id)
	{
		$id && is_numeric($id) || show_404();
		$item = $this->model->get($id);
		count($item) || show_404();
		$this->data['id'] = $id;
		$this->data['item'] = $item;
		$this->publicTemplate('view', $this->data);
	}




	function manage()
	{
		// Fetch items from database
		$this->data['items'] = $this->model->get();

		// load view
		$this->template('manage', $this->data);
	}


	public function create($id = null)
	{
		// Setting header <h1> title
		$this->data['headline'] = is_numeric($id) ? 'Update Item Details' : 'Add New Item';

		// Fetch Store item or set a new one 
		if ($id && is_numeric($id)) {
			$this->data['item'] = $this->model->get($id);
			count($this->data['item']) || redirect('store_items/manage');
			$this->data['id'] = $id;		// Flag deopen on we can determins something in view
		} else if ($id == null) {
			$this->data['item'] = $this->model->get_new();
			$this->data['id'] = false;
		}

		// Setup the form
		$rules = $this->model->rules;
		$this->form_validation->set_rules($rules);

		// Process the form 
		if ($this->form_validation->run($this) == true) {
			$data = $this->model->array_from_post(array('item_title', 'item_description', 'item_price',
					'was_price', 'item_url', 'is_active'));
			$this->model->save($data, $id);
			$message = ($id == null) ? 'Item Added Successfully' : 'Item Updated Successfully';
			$this->session->set_flashdata('success', $message);
			redirect("store_items/manage");
		}


		// Load template
		$this->template('create', $this->data);
	}

	// delete the whole item 
	public function deleteConf($id) 
	{
		$id && is_numeric($id) || redirect(static::ADMIN_NOTALLOWED_REDIRECT);
		$this->data['headline'] = 'Delete Item';
		$this->data['id'] = $id;
		$this->template('deleteconf', $this->data);
	}	


	public function delete($id)
	{
		$id && is_numeric($id) || redirect(static::ADMIN_NOTALLOWED_REDIRECT);
		if (isset($_POST['delete']) && $_POST['delete'] == 'Delete') {
			// delete item 
			$this->model->delete($id);
			$this->session->set_flashdata('success', 'Item Deleted Successfully');
			redirect('store_items/manage');
		}
	}


	public function upload_image($id)
	{
		$id && is_numeric($id) || redirect(static::ADMIN_NOTALLOWED_REDIRECT);

		$this->data['headline'] = 'Upload Image';
		$this->data['id'] = $id;

		// load view
		$this->template('upload_image', $this->data);
	}



	public function do_upload($id)
	{
		$id && is_numeric($id) || redirect(static::ADMIN_NOTALLOWED_REDIRECT);

		$this->data['id'] = $id;

		// $this->load->view('upload_form', array('error' => ' ' ));

		  $config['upload_path']          =  "./assets/big_pics";
          $config['allowed_types']        = 'gif|jpg|png';
          $config['max_size']             = 4096;
          $config['max_width']            = 1024;
          $config['max_height']           = 768;

		  $this->load->library('upload');
          $this->upload->initialize($config);


          if ( ! $this->upload->do_upload('photo'))
          {
               $error = array('error' => $this->upload->display_errors());
       
               $this->session->set_flashdata("error", $error);	// set error in flash messages 
               redirect("store_items/upload_image/$id");		// redirect to upload image page
          }
          else
          {
          		// upload was successfully

                $data = array('upload_data' => $this->upload->data());

                $upload_data = $data['upload_data'];
                $file_name = $upload_data['file_name']; 
                $this->generate_thumbnail($file_name);

                // Store the name of the file in the database 
                $this->model->save(array(
                	 	'big_pic' => $file_name,
                	 	'small_pic' => $file_name,
                	), $id);

                $this->data['headline'] = 'Uploaded Successfully';
                $this->data['data'] = $data;
                $this->template('upload_success', $this->data);

          }
	}



	public function delete_image($id)
	{
	   $id && is_numeric($id) || redirect(static::ADMIN_NOTALLOWED_REDIRECT);

		$item = $this->model->get($id);

		count($item) || redirect(static::ADMIN_NOTALLOWED_REDIRECT);

		$big_pic_path =  self::BIG_PIC_PATH . $item->big_pic;
		$small_pic_path = self::SMALL_PIC_PATH . $item->small_pic;

		// attempt to remove images
		if (file_exists($big_pic_path)) {
			unlink($big_pic_path);
		} 

		if (file_exists($small_pic_path)) {
			unlink($small_pic_path);
		}

		// update the database
		$this->model->save(array(
				'big_pic' => '',
				'small_pic' => '',
			), $id);

		$this->session->set_flashdata("success", "Image Deleted Successfully");
		redirect("store_items/edit/$id");

	}



	private function generate_thumbnail($filename)
	{
		$config['image_library'] = 'gd2';
		$config['source_image'] = self::BIG_PIC_PATH . $filename;
		$config['new_image'] =  self::SMALL_PIC_PATH . $filename;
		$config['maintain_ratio'] = TRUE;
		$config['width']         = 200;
		$config['height']       = 200;

		$this->load->library('image_lib', $config);

		$this->image_lib->resize();
	}



	public function _unique_title($str)
	{
		// Don't validate if title already exists 
		// Unless it's title for current item 

		$id = $this->uri->segment(3);

		$this->db->where('item_title', $this->input->post('item_title'));

		!$id || $this->db->where('id !=', $id);

		$item = $this->model->get();

		if (count($item)) {
			$this->form_validation->set_message('_unique_title', '%s should be unique');
			return false;
		}

		return true;
	}



	public function _unique_url($str)
	{
		// Don't validate if url already exists 
		// unlss it's url for current item 
		$id = $this->uri->segment(3);

		$this->db->where('item_url', url_title($this->input->post('item_url')));

		!$id || $this->db->where('id !=', $id);

		$item = $this->model->get();

		if (count($item)) {
			$this->form_validation->set_message('_unique_url', '%s should be unique');
			return false;
		}

		return true;
	}

	

}