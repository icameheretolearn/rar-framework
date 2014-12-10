<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Transactions extends MY_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('transaction_model', 'transactions');
	}

	public function index() {
		$this->data['transactions'] = $this->transactions->get_all();
	}

}