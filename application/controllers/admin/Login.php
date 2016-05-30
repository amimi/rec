<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH . 'core/Admin_Controller.php');
/**
 * ログイン
 * @author Ami
 *
 */
class Login extends Admin_Controller {
	
	public function __construct() {
		parent::__construct();
		$this->load->model('admin_user_model');
	}

	/**
	 * Index Page for this controller.
	 */
	public function index()
	{
		$view_data = [];
		if($this->input->post('submit'))
		{
			$this->load->library('form_validation');
			if($this->form_validation == FALSE)
			{
				// バリデーションエラー
				echo 'valid error';
			}
			else
			{
				$view_data['users'] = $this->admin_user_model->get_all();
				if(!$user = $this->admin_user_model->get_by_id($this->input->post('login_id'), 'login_id'))
				{
					// login id が存在しない
					echo 'no user';
				}
				else
				{
					$this->load->library('encrypt');
					if($this->input->post('password') != $this->encrypt->decode($user['password']))
					{
						// password 不正
						echo 'invalid pass';
					}
					else 
					{
						//　ログイン成功
						$login_user = [
							'login_status' => Rec_Constant::LOGIN_STATUS_ACTIVE,
							'name' => $user['admin_name'],
							'image' => $user['image']
						];
						// セッションにユーザー情報を格納
						$this->session->set_userdata('login_user', $login_user);
						// 最終ログイン日時を更新
						$this->admin_user_model->update_last_logined_at($user['id']);
						redirect('/admin');
					}
				}
			}
		}
		$this->load->view('admin/login', $view_data);
	}
	
	/**
	 * ログアウト
	 */
	public function logout()
	{
		$this->session->unset_userdata('login_user');
		redirect('/admin/login');
	}
}
