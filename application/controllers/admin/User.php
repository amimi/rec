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
		$this->load->library('form_validation');
		
		if($this->input->post('submit'))
		{
			if($this->form_validation->run() == FALSE)
			{
				// バリデーションエラー
			}
			else
			{
				// DBインサート
				if($this->admin_user_model->insert_admin_user())
				{
					// 成功
					echo 'create success!';
				}
				else 
				{
					// 失敗
					echo 'create failed.';
				}
			}
		}
		
		$this->_render('user/create');
	}
}
