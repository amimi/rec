<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH . 'core/Admin_Controller.php');

class Welcome extends Admin_Controller {

	/**
	 * Index Page for this controller.
	 */
	public function index()
	{
		$this->load->view('admin/index');
	}
}
