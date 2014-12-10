<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends MY_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('user_model', 'users');
	}

	public function index() {
		$this->data['users'] = $this->users->get_all();
	}

	public function create() {
		$this->form_validation->set_rules('username', 'Username', 'required|trim|xss_clean|alpha_dash|callback__username_check');
        $this->form_validation->set_rules('email', 'Email Address', 'required|trim|valid_email|callback__email_check');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]|trim|xss_clean');
        $this->form_validation->set_rules('password_confirm', 'Password Confirmation', 'required|trim|xss_clean');

        if ($this->form_validation->run() == TRUE) {
            $username = strtolower($this->input->post('username'));
            $email = strtolower($this->input->post('email'));
            $password = $this->input->post('password');
            $additional_data = array(
            	'first_name' => $this->input->post('first_name'),
            	'last_name' => $this->input->post('last_name'),
            	'phone' => $this->input->post('phone')
        	);
        }
        
        if ($this->form_validation->run() == TRUE && $this->ion_auth->register($username, $password, $email, $additional_data)) {
        	flashmsg('User created successfully', 'success');
            return redirect('admin/users');
        } else {
            flashmsg(validation_errors(), 'danger');
        }

        $this->data['meta_title'] = 'Create New User';
	}

	public function edit($uuid = null) {
		$user = $this->data['user'] = $this->users->get_by('uuid', $uuid);
		if(!$user || !$uuid) {
			flashmsg('Could not perform operation', 'danger');
			return redirect('admin/users');
		}
		$this->form_validation->set_rules('username', 'Username', 'required|trim|xss_clean|alpha_dash|callback__username_check');
        $this->form_validation->set_rules('email', 'Email Address', 'required|trim|valid_email|callback__email_check');
        if(!empty($_POST['password'])) {
        	$this->form_validation->set_rules('password', 'Password', 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]|trim|xss_clean');
        	$this->form_validation->set_rules('password_confirm', 'Password Confirmation', 'required|trim|xss_clean');
        }

        if ($this->form_validation->run() == TRUE) {
            $data = array(
            	'username' => strtolower($this->input->post('username')),
            	'email' => strtolower($this->input->post('email')),
            	'first_name' => $this->input->post('first_name'),
            	'last_name' => $this->input->post('last_name'),
            	'phone' => $this->input->post('phone')
        	);
        	if(!empty($_POST['password'])) {
        		$data['password'] = $this->input->post('password');
    		}
        }
        
        if ($this->form_validation->run() == TRUE && $this->ion_auth->update($user->id, $data)) {
        	flashmsg('User saved successfully', 'success');
            return redirect('admin/users');
        } else {
            flashmsg(validation_errors(), 'danger');
        }

        $this->data['meta_title'] = 'Edit User';
	}

	public function delete($uuid = null) {
		$user = $this->data['user'] = $this->users->get_by('uuid', $uuid);
		if(!$user || !$uuid) {
			flashmsg('Could not perform operation', 'danger');
			return redirect('admin/users');
		}
		
		$this->form_validation->set_rules('confirm', 'confirmation', 'required');
		$this->form_validation->set_rules('uuid', 'user UUID', 'required');

		if ($this->form_validation->run() === TRUE) {
			// Do we really want to delete?
			if ($this->input->post('confirm') == 'yes' && $this->input->post('uuid') == $user->uuid) {
				// Do we have the right userlevel?
				if (logged_in() && is_admin()) {
					$this->ion_auth->delete_user($user->id);
					// Redirect them back to the admin page
					flashmsg('User deleted successfully', 'success');
					return redirect('admin/users');
				} else {
					flashmsg('You are not authorized to delete this resource', 'danger');
				}
			} else {
				flashmsg('No action made', 'info');
				return redirect('admin/users');
			}
		}
		$this->data['meta_title'] = 'Delete User';
	}

}