<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_Controller extends CI_Controller {

	/**
	 * 共通レイアウトで画面表示する
	 *
	 * @param string $view ビュー名
	 * @param string $content_data contentに表示するデータ
	 */
	protected function _render($view, $content_data = null)
	{
		// ヘッダー
		$data["header"] = $this->load->view('admin/layouts/header', NULL, true);

		// メニュー
		$data["menu"] = $this->load->view('admin/layouts/menu', NULL, true);

		// コンテンツ
		$data["content"] = $this->load->view('admin/'.$view, $content_data, true);
		
		// フッター
		$data["footer"] = $this->load->view('admin/layouts/footer', NULL, true);
		
		// サイドバー
		$data["side"] = $this->load->view('admin/layouts/side', NULL, true);
		
		// bodyクラス

		// ページごとに追加で読み込むcss
		$data['add_css'] = (isset($content_data['add_css'])) ? $content_data['add_css'] : NULL;
		// ページごとに追加で読み込むjs
		$data['add_js'] = (isset($content_data['add_js'])) ? $content_data['add_js'] : NULL;
		// ページごとのjs
		$page_js = '/assets/js/' . $this->router->fetch_class() . '.js';
		$data['page_js'] = (file_exists(realpath(__DIR__.'/../..'.$page_js))) ? '<script type="text/javascript" src="'.$page_js.'"></script>' : '';
		// 共通レイアウトで表示
		$this->load->view('admin/layouts/default', $data);
	}
}
