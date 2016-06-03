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
		$this->load->model('rel_record_category_model');
		$this->load->model('rel_record_tag_model');
	}

	/**
	 * Index Page for this controller.
	 */
	public function index()
	{
		// レコードを公開日順に取得
		$this->record_model->db->order_by('published_at', 'DESC');
		$records = $this->record_model->get_all();
		
		// 関連テーブル取得
		foreach($records as &$record)
		{
			$record['categories'] = $this->rel_record_category_model->get_rel_category($record['id']);
			$record['tags'] = $this->rel_record_tag_model->get_rel_tag($record['id']);
		}
		
		$view_data['records'] = $records;
		$this->_render('record/index', $view_data);
	}
	
	/**
	 * 新規record作成
	 */
	public function create()
	{
		$this->load->model('category_model');
		$this->load->model('tag_model');
		
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
					$config['upload_path'] = Rec_Constant::RECORD_IMAGE_PATH;
					$config['allowed_types'] = 'gif|jpg|png';
					$this->load->library('upload', $config);
					// 画像アップロード
					if(!$this->upload->do_upload('image'))
					{
						$this->set_alert($this->upload->display_errors(), Rec_Constant::MSG_DANGER);
						$this->_render('record/create');
						exit(1);
					}
					else
					{
						// 画像名セット
						$data['image'] = $this->upload->data('file_name');
					}
				}
				
				if(empty($data['published_at']))
				{
					// 空の場合はDEFAULTを適用するためunset
					unset($data['published_at']);
				}
				
				// DBインサート
				if($record_id = $this->record_model->insert($data))
				{
					if(isset($data['categories']))
					{
						// 記事カテゴリーインサート
						foreach($data['categories'] as $category_id)
						{
							$cat_data = [
								'record_id' => $record_id,
								'category_id' => $category_id
							];
							$this->rel_record_category_model->insert($cat_data);
						}
					}
					
					if(isset($data['tags']))
					{
						// 記事タグインサート
						foreach($data['tags'] as $tag_id)
						{
							$tag_data = [
								'record_id' => $record_id,
								'tag_id' => $tag_id
							];
							$this->rel_record_tag_model->insert($tag_data);
						}
					}
					
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
		
		// カテゴリー取得
		$view_data['categories'] = $this->category_model->get_all();
		// タグ取得
		$view_data['tags'] = $this->tag_model->get_all();
		
		$this->_render('record/create', $view_data);
	}

	/**
	 * record編集
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
	 * record削除
	 * @param int $id
	 */
	public function delete($id)
	{
		// TODO
	}
}
