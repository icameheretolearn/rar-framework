<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Orders extends MY_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('order_model', 'orders');
	}

	public function index() {
		$this->data['orders'] = $this->orders->get_all();
	}
}