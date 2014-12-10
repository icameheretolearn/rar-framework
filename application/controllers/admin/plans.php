<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Plans extends MY_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('plan_model', 'plans');
		$this->_load_stripe();
	}

	public function index() {
		$this->data['plans'] = $this->plans->get_all();
	}

	public function create() {
		$this->data['import_js'][] = base_url('public/js/jquery.inputmask.min.js');
		$this->form_validation->set_rules('name', 'Name', 'required|trim|xss_clean');
		$this->form_validation->set_rules('description', 'Description', 'trim|xss_clean');
		$this->form_validation->set_rules('features', 'Features', 'required|trim|xss_clean');
		
		if ($this->form_validation->run() === TRUE) {
			$this->input->unset_post('submit');
			$this->input->set_post('permalink', slugify($this->input->post('name')));
			$this->input->set_post('amount', to_pennies($this->input->post('amount')));
			$this->input->set_post('created_on', time());
			$this->input->set_post('last_updated', time());
			$data = $this->input->post();
			if ($plan_id = $this->plans->insert($data)) {
				if($data['interval'] != 'hourly' && $data['interval'] != 'lumpsum') {
					// create plan in stripe
					try {
						$stripe_plan = Stripe_Plan::create(array(
						  'amount' => $data['amount'],
						  'interval' => $data['interval'],
						  'name' => $data['name'],
						  'currency' => 'usd',
						  'id' => $data['permalink'],
						  'statement_description' => strtoupper($data['name'])
					  	));
					  	// update plan in system with stripe id
					  	$this->plans->update($plan_id, array('stripe_id' => $stripe_plan->id));
				  	} catch(Stripe_InvalidRequestError $e) {
						$body = $e->getJsonBody();
						$err  = $body['error'];
						flashmsg($err['message'], 'danger');
						return;
					}
				}
				flashmsg('New plan created!', 'success');
				return redirect('admin/plans');	
			} else {
				flashmsg(validation_errors(), 'danger');
			}
		}
		$this->data['meta_title'] = 'Create Plan';
	}

	public function edit($uuid = NULL) {
		$this->data['import_js'][] = base_url('public/js/jquery.inputmask.min.js');
		$plan = $this->data['plan'] = $this->plans->get_by('uuid', $uuid);
		if (empty($uuid) || empty($plan)) {
			flashmsg('No plan found', 'error');
			redirect('admin/plans');
		}
		
		$this->form_validation->set_rules('name', 'Name', 'required|trim|xss_clean');
		$this->form_validation->set_rules('description', 'Description', 'trim|xss_clean');
		$this->form_validation->set_rules('features', 'Features', 'required|trim|xss_clean');
		
		if ($this->form_validation->run() === TRUE) {
			$this->input->unset_post('submit');
			$this->input->set_post('amount', to_pennies($this->input->post('amount')));
			$this->input->set_post('permalink', slugify($this->input->post('name')));
			$this->input->set_post('last_updated', time());
			$data = $this->input->post();
			if ($this->plans->update($plan->id, $data)) {
				flashmsg('Plan saved', 'success');
				redirect('admin/plans');
			} else {
				flashmsg(validation_errors(), 'danger');
			}
		}
		$this->data['meta_title'] = 'Edit Plan';
	}

	public function delete($uuid = NULL) {
		$plan = $this->data['plan'] = $this->plans->get_by('uuid', $uuid);

		if (empty($uuid) || empty($plan)) {
			flashmsg('No plan found', 'error');
			redirect('admin/plans');
		}

		$this->form_validation->set_rules('confirm', 'Confirmation', 'required');
		$this->form_validation->set_rules('uuid', 'Plan UUID', 'required');

		if ($this->form_validation->run() === TRUE) {
			if ($this->input->post('confirm') == 'yes') {
				if ($this->plans->update($plan->id, array('deleted' => 1))) {
					flashmsg('Plan deleted successfully', 'success');
					redirect('admin/plans');
				} else {
					flashmsg(validation_errors(), 'danger');
				}
			} else {
				redirect('admin/plans');
			}
		}
		$this->data['meta_title'] = 'Delete Plan';
	}
}