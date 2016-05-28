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
		$this->load->model('admin_user_model');
	}

	/**
	 * Index Page for this controller.
	 */
	public function index()
	{
		$view_data['users'] = $this->admin_user_model->get_all();
		$this->_render('user/index', $view_data);
	}
	
	public function create()
	{
		$this->_render('user/create');
	}
}
