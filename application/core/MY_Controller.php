<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	protected $data;
	protected $defaults;
	protected $view;
	protected $layout;

	function __construct() {
		parent::__construct();

		// Load all site settings
		$settings = $this->settings->get_settings();
		if (array_key_exists('site_name', $settings) === FALSE OR empty($settings['site_name'])) {
			$settings['site_name'] = SYSTEM_NAME;
		}

		// Wrapper and view data
		$this->data = array(
			'meta_title' => $settings['site_name'],
			'meta_desc' => 'A framework based off codeigniter for quick development',
			'meta_keywords' => 'framework, crud, cms',
			'meta_robot' => 'index, follow',
			'meta_copyright' => 'Rarbuilt '.date('Y'),
			'meta_engine' => 'Rarbuilt Framework',
			'meta_revision' => 'v1.0',
			'meta_author' => 'Rarbuilt.com',
			'css_import' => array(),
			'js_import'  => array(),
			'body_class' => ''
		);
	}

	/**
	 * Remap the CI request, running the method
	 * and loading the view
	 */
	public function _remap($method, $arguments) {
		if (method_exists($this, $method)) {
			call_user_func_array(array($this, $method), array_slice($this->uri->rsegments, 2));
		} else {
			show_404(strtolower(get_class($this)).'/'.$method);
		}
		$this->_load_view();
	}

	/**
	 * Load a view into a layout based on
	 * controller and method name
	 */
	private function _load_view() {
		// Back out if we've explicitly set the view to FALSE
		if ($this->view === FALSE) return;

		// Get or automatically set the view and layout name
		$view = ($this->view !== null) ? $this->view . '.php' : $this->router->directory . $this->router->class . '/' . $this->router->method . '.php';

		if ($this->uri->segment(1) == 'admin')
		{
			 $layout = ($this->layout !== null) ? $this->layout . '.php' : 'layouts/v1/admin.php';
	 	}
		else
		{
			 $layout = ($this->layout !== null) ? $this->layout . '.php' : 'layouts/v1/app.php';
		}

		// Load the view into the data
		$this->data['yield'] = $this->load->view($view, $this->data, TRUE);
		if(file_exists(APPPATH .  'views/' .  str_replace('.php', '.js.php', $view))) {
			$this->data['yieldjs'] = $this->load->view(str_replace('.php', '.js.php', $view), $this->data, TRUE);
		} else {
			$this->data['yieldjs'] = '';
		}
		$this->data['vdata'] = $this->data;
		// Display the layout with the view
		$this->load->view($layout, $this->data);
	}

	/**
	 * Check the group of the current user and make sure
	 * they have access to the controller being requested
	 */
	private function _check_permissions() {
		$this->load->library('user_agent');
		$this->load->model('group_model', 'group');

		$orig_destination = $this->uri->uri_string();
		
		if (logged_in()) {
			$user = $this->ion_auth->get_user();
			$user_group = $user->group;
		} else {
			$user_group = 'guest';
		}
		
		$permissions = json_decode($this->group->get_by('name', $user_group)->permissions);
		
		if ( ! isset($permissions->{$this->router->class})) {
			flashmsg('You do not have the correct permissions to view that.', 'danger');
			if(!logged_in()) {
				flashmsg('You need to login or sign up to Sutracamp to access that page', 'info');
			}
            return redirect('auth/login?destination=' . $orig_destination);
		}
	}

	/**
	 * Generate a CSRF nonce key and value to verify deletion requests
	 * for security purposes
	 */
	function _get_csrf_nonce() {
		$this->load->helper('string');
		$key = random_string('alnum', 8);
		$value = random_string('alnum', 20);
		$this->session->set_flashdata('csrfkey', $key);
		$this->session->set_flashdata('csrfvalue', $value);

		return array($key => $value);
	}

	/**
	 * Check to make sure the CSRF nonce given was valid
	 */
	function _valid_csrf_nonce() {
		if ($this->input->post($this->session->flashdata('csrfkey')) !== FALSE && $this->input->post($this->session->flashdata('csrfkey')) == $this->session->flashdata('csrfvalue')) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

}