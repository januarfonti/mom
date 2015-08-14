<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index()
	{
		redirect('admin/data_komoditas');
	}

	public function _example_output($output = null)
	{
		$this->load->view('example.php',$output);
	}

	public function data_komoditas()
	{
		$this->load->view('admin/data_komoditas');
	}

	public function data_user()
	{
			$crud = new grocery_CRUD();

			$crud->set_theme('datatables');
			$crud->set_table('tbl_user');
			$crud->set_subject('User');
			$crud->required_fields('username','password');
			$output = $crud->render();
			$this->_example_output($output);
	}
}