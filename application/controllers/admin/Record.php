<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH . 'core/Admin_Controller.php');
/**
 * 投稿管理
 * @author Ami
 *
 */
class Record extends Admin_Controller {
	
	public function __construct() {
		parent::__construct();
		$this->load->model('record_model');
	}

	/**
	 * Index Page for this controller.
	 */
	public function index()
	{
		$view_data['records'] = $this->record_model->get_all();
		$this->_render('record/index', $view_data);
	}
	
	/**
	 * 新規投稿作成
	 */
	public function create()
	{
		if($this->input->post('submit'))
		{
			$this->load->library('form_validation');
			if($this->form_validation->run() == FALSE)
			{
				// バリデーションエラー
			}
			else
			{
				$data = $this->input->post();
				
				if(0 < $_FILES['image']['size'])
				{
					$config['upload_path']          = Rec_Constant::ADMIN_USER_IMAGE_PATH;
					$config['allowed_types']        = 'gif|jpg|png';
					$this->load->library('upload', $config);
					if(!$this->upload->do_upload('image'))
					{
						$error = array('error' => $this->upload->display_errors());
						$this->set_alert($error['error'], Rec_Constant::MSG_DANGER);
						$this->_render('record/create');
						exit();
					}
					else
					{
						$data['image'] = $this->upload->data('file_name');
					}
				}
				// DBインサート
				if($this->record_model->insert_admin_user($data))
				{
					// 成功
					$this->set_alert('create success.', Rec_Constant::MSG_INFO);
				}
				else 
				{
					// 失敗
					$this->set_alert('create failed.', Rec_Constant::MSG_DANGER);
				}
			}
		}
		
		$this->_render('record/create');
	}

	/**
	 * ユーザー編集
	 * @param int $id
	 */
	public function edit($id)
	{
		if(!$view_data['user'] = $this->admin_user_model->get_by_id($id))
		{
			show_404();
		}
		// TODO
		$this->_render('user/edit', $view_data);
	}
	
	/**
	 * ユーザー削除
	 * @param int $id
	 */
	public function delete($id)
	{
		// TODO
	}
}
