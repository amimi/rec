<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH . 'core/Admin_Controller.php');
/**
 * ユーザー管理
 * @author Ami
 *
 */
class User extends Admin_Controller {
	
	public function __construct() {
		parent::__construct();
	}

	/**
	 * Index Page for this controller.
	 */
	public function index()
	{
		$this->load->model('admin_user_model');
		$this->admin_user->get_all();
		$this->_render('user');
	}
}
