<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Store_accounts extends Admin_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_StoreAccount', 'model');
	}

	function manage()
	{
		// Fetch items from database
		$this->data['accounts'] = $this->model->get();

		// load view
		$this->template('manage', $this->data);
	}

	public function create($id = null)
	{
		// Setting header <h1> title
		$this->data['headline'] = is_numeric($id) ? 'Update Account Details' : 'Add New Account';

		// Fetch Store account or set a new one 
		if ($id && is_numeric($id)) {
			$this->data['account'] = $this->model->get($id);
			count($this->data['account']) || redirect('store_accounts/manage');
			$this->data['id'] = $id;		// Flag deopen on we can determins something in view
		} else if ($id == null) {
			$this->data['account'] = $this->model->get_new();
			$this->data['id'] = false;
		}

		// Setup the form
		$rules = $this->model->rules;
		$this->form_validation->set_rules($rules);
		// Process the form 
		if ($this->form_validation->run($this) == true) {
			$data = $this->model->array_from_post(array(
					'firstname', 'lastname', 'email', 'company', 'address1',
					'address2', 'city', 'country', 'postcode', 'telnum',
				));
			if (! $id) {
				$data['pword'] = password_hash($this->input->post('pword'), PASSWORD_DEFAULT);
			}
			$this->model->save($data, $id);
			$message = ($id == null) ? 'Account Added Successfully' : 'Account Updated Successfully';
			$this->session->set_flashdata('success', $message);
			redirect("store_accounts/manage");
		}

		// Load template
		$this->template('create', $this->data);
	}

	public function update_pword($id)
	{
		$id && is_numeric($id) || redirect(static::ADMIN_NOTALLOWED_REDIRECT);
		// Get the account that own this pword 
		$account = $this->model->get($id);
		count($account) || show_404();
		$this->data['headline'] = 'Update Account Password';
		$this->data['id'] = $id;

		// process the form submission 
		$this->form_validation->set_rules('pword', 'Password', 'required|min_length[7]|max_length[35]');
		$this->form_validation->set_rules('confirm_pword', 'Password Confirmation', 'required|matches[pword]');
		if ($this->form_validation->run() == true) {
			$pword = password_hash($this->input->post('pword'));
			// update the account pword 
			$this->model->save(array('pword' => $pword), $id);
			$this->session->set_flashdata("success", "Account Password Updated Succcessfully");
			redirect("store_accounts/edit/$id");
		}

		// load the view 
		$this->template('update_pword', $this->data);
	}


	function delete_account($id)
	{
		$id && is_numeric($id) || redirect(static::ADMIN_NOTALLOWED_REDIRECT);
		// Get the account that own this pword 
		$account = $this->model->get($id);
		count($account) || show_404();
		// Delete the account 
		$this->model->delete($id);
		$this->session->set_flashdata("success", "Account Deleted Succcessfully");
		redirect('store_accounts/manage');
	}
}