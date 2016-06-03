<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH . 'core/Admin_Controller.php');
/**
 * タグ管理
 * @author Ami
 *
 */
class Tag extends Admin_Controller {
	
	public function __construct() {
		parent::__construct();
		$this->load->model('tag_model');
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
					$data['segment'] = $data['tag_name'];
				}
				
				// DBインサート
				if($this->tag_model->insert($data))
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
		
		$view_data['tags'] = $this->tag_model->get_all();
		$this->_render('tag/index', $view_data);
	}

	/**
	 * record編集
	 * @param int $id
	 */
	public function edit($id)
	{
		if(!$view_data['user'] = $this->tag_model->get_by_id($id))
		{
			show_404();
		}
		// TODO
		$this->_render('tag/edit', $view_data);
	}
	
	/**
	 * record削除
	 * @param int $id
	 */
	public function delete($id)
	{
		// TODO
	}
}
