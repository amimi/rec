<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH . 'core/Admin_Controller.php');
/**
 * カテゴリー管理
 * @author Ami
 *
 */
class Category extends Admin_Controller {
	
	public function __construct() {
		parent::__construct();
		$this->load->model('category_model');
	}

	/**
	 * Index Page for this controller.
	 */
	public function index()
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
				
				if(empty($data['segment']))
				{
					// デフォルト
					$data['segment'] = $data['category_name'];
				}
				
				// DBインサート
				if($this->category_model->insert($data))
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
		
		$view_data['categories'] = $this->category_model->get_all();
		$this->_render('category/index', $view_data);
	}
	
	/**
	 * category編集
	 * @param int $id
	 */
	public function edit($id)
	{
		if(!$view_data['user'] = $this->category_model->get_by_id($id))
		{
			show_404();
		}
		// TODO
		$this->_render('user/edit', $view_data);
	}
	
	/**
	 * category削除
	 * @param int $id
	 */
	public function delete($id)
	{
		// TODO
		log_message();
	}
}
