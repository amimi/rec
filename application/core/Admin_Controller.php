<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_Controller extends CI_Controller {
	
	/**
	 * @var $admin_user_model
	 */
	var $admin_user_model;
	
	public function __construct()
	{
		parent::__construct();
		
		// ログインチェック
		if($this->router->fetch_class() != 'login' && !$this->is_logged_in())
		{
			redirect('/admin/login');
		}
		
		$this->config->load('rec');
	}
	
	public function is_logged_in()
	{
		return $this->session->login_user['login_status'] == Rec_Constant::LOGIN_STATUS_ACTIVE;
	}

	/**
	 * 共通レイアウトで画面表示する
	 *
	 * @param string $view ビュー名
	 * @param string $content_data contentに表示するデータ
	 */
	protected function _render($view, $content_data = null)
	{
		$data['rec'] = $this->config->item('rec');
		
		$content_data['login_user'] = $this->session->login_user;
		$content_data['body_class'] = $this->router->fetch_class().'-'.$this->router->fetch_method();
		$content_data['rec'] = $data['rec'];
		
		// ヘッダー
		$data["header"] = $this->load->view('admin/layouts/header', $content_data, true);

		// メニュー
		$data["menu"] = $this->load->view('admin/layouts/menu', $content_data, true);

		// アラートメッセージの取得
		$content_data['alert_message'] = $this->get_alert();
		// コンテンツ
		$data["content"] = $this->load->view('admin/'.$view, $content_data, true);
		
		// フッター
		$data["footer"] = $this->load->view('admin/layouts/footer', NULL, true);
		
		// サイドバー
		$data["side"] = $this->load->view('admin/layouts/side', NULL, true);
		
		// ページごとに追加で読み込むcss
		$data['add_css'] = (isset($content_data['add_css'])) ? $content_data['add_css'] : NULL;
		// ページごとに追加で読み込むjs
		$data['add_js'] = (isset($content_data['add_js'])) ? $content_data['add_js'] : NULL;
		// ページごとのjs
		$page_js = '/assets/dist/js/pages/' . $this->router->fetch_class() . '.js';
		$data['page_js'] = (file_exists(realpath(__DIR__.'/../..'.$page_js))) ? $page_js : NULL;
		
		// 共通レイアウトで表示
		$this->load->view('admin/layouts/default', $data);
	}
	
	/**
	 * フラッシュメッセージをセットする
	 * @param string $message
	 * @param string $type
	 */
	public function set_alert($message, $type = Rec_Constant::MSG_INFO)
	{
		$this->session->set_flashdata('alert_message', ['message' => $message, 'type' => $type]);
	}
	
	/**
	 * フラッシュメッセージを取得する
	 * @return string
	 */
	public function get_alert()
	{
		if($alert = $this->session->flashdata('alert_message'))
		{
			switch ($alert['type'])
			{
				case Rec_Constant::MSG_DANGER:
					$icon = 'fa-ban';
					break;
				case Rec_Constant::MSG_INFO:
					$icon = 'fa-info';
					break;
				case Rec_Constant::MSG_SUCCESS:
					$icon = 'fa-check';
					break;
				case Rec_Constant::MSG_WARNING:
					$icon = 'fa-warning';
					break;
				default:
					$icon = '';
			}
			$html = '<div class="alert alert-'.$alert['type'].' alert-dismissible">
								<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                <h4><i class="icon fa '.$icon.'"></i>' . $alert['type'] . '</h4>
                <p>'.$alert['message'].'</p>
             </div>';
			return $html;
		}
		return '';
	}
}
