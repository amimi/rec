<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 画面出力
 * @param string $str
 * @param bool $escape
 */
function out($str, $escape = TRUE)
{
	// エスケープ処理
	if($escape)
	{
		$str = html_escape($str);
	}

	echo $str;
}

/**
 * 画面出力（テキスト）
 * @param string $str
 */
function out_text($str)
{
	echo nl2br($str);
}

/**
 * 円表示にして出力
 * @param int $int
 */
function out_yen($str, $return = FALSE)
{
	if(empty($str))
	{
		$str = 'なし';
	}
	if(is_numeric($str) )
	{
		$str = number_format($str) . '円';
	}

	if($return)
	{
		return $str;
	}
	out($str);
}

/**
 * 円記号表示にして出力
 * @param string $str
 */
function out_yen_sign($str, $return = FALSE)
{
	if(empty($str))
	{
		$str = 'なし';
	}
	if(is_numeric($str) )
	{
		$str = '¥'.number_format($str);
	}

	if($return)
	{
		return $str;
	}
	out($str);
}

/**
 * 6桁の数字を[yyyy年mm月]形式にして出力
 * @param int $date
 */
function out_nengetsu($ym, $return = FALSE)
{
	$format = 'Ym';
	if($date = DateTime::createFromFormat($format, $ym))
	{
		$str = $date->format('Y年m月');
		if($return)
		{
			return $str;
		}
		out($str);
	}
}

/**
 * 6桁の数字から現在との年月差を出力する
 * @param int $date
 */
function out_built_years($ym, $return = FALSE)
{
	$str = out_nengetsu($ym, TRUE);
	$str .= ' (築';
	$format = 'Ym';
	if($date = DateTime::createFromFormat($format, $ym))
	{
		$now = new DateTime();
		$interval = $now->diff($date);
		$str .= $interval->format('%y年%mヶ月');
		$str .= ')';
		if($return)
		{
			return $str;
		}
		out($str);
	}
}

/**
 * 駐車場フラグから駐車場あり|なしの文字列を出力する
 * @param unknown $parking_flag
 */
function out_parking($parking_flag, $return = FALSE)
{
	$str = '駐車場';
	if($parking_flag)
	{
		$str .= 'あり';
	}
	else
	{
		$str .= 'なし';
	}

	if($return)
	{
		return $str;
	}
	out($str);
}

/**
 * 請求ステータスに応じて値を出力する
 *
 * @param int $status 請求情報のステータス
 * @param mixin $data 未確定時に表示する値
 * @param mixin $finalized 確定時に表示する値
 * @param bool $return 戻り値として出力する値を返すかどうか
 */
function out_for_billing_status($status, $data, $finalized, $return = FALSE)
{
	$str = NULL;

	if (MY_constant::BILLING_STATUS_UNSETTLED === (int)$status)
	{
		$str = $data;
	}
	if (MY_constant::BILLING_STATUS_SETTLED === (int)$status)
	{
		$str = $finalized;
	}

	if ($return)
	{
		return $str;
	}
	out($str);
}

/**
 * 管理者画像のパスを返す
 * @param string $str
 * @return string
 */
function admin_image($str)
{
	$protocol = is_https() ? 'https' : 'http';
	
	if(empty($str))
	{
		return site_url('/assets/img/staff_nophoto.png', $protocol);
	}
	return site_url(Rec_Constant::ADMIN_USER_IMAGE_PATH . $str, $protocol);
}

/**
 * グループ画像のパスを返す
 * @param string $str
 * @return string
 */
function group_image($str)
{
	$protocol = is_https() ? 'https' : 'http';
	
	if(empty($str))
	{
		return site_url('/assets/img/icon_defaultgroup.png', $protocol);
	}
	return site_url('/img/uploaded/groups/' . $str, $protocol);
}

/**
 * 物件画像のパスを返す
 * @param string $str
 * @return string
 */
function estate_image($branch_id, $str)
{
	$protocol = is_https() ? 'https' : 'http';
	
	if(empty($str) || empty($branch_id))
	{
		return site_url('/assets/img/no_image.png', $protocol);
	}

	//リクエストしてみる
	$url = site_url('/img/uploaded/estates/' . $branch_id . '/' . $str);
	$header = @get_headers($url);
	
	if (!preg_match('/^HTTP\/\S*\s200\s/i', $header[0]))
	{
		// 画像が存在しない場合
 		return site_url('/assets/img/no_image.png', $protocol);
	}
	return site_url('/img/uploaded/estates/' . $branch_id . '/' . $str, $protocol);
}

/**
 * お客様画像のパスを返す
 * @param string|int $str
 * @return string
 */
function customer_image($str)
{
	if(empty($str))
	{
		return '';
	}
	
	$protocol = is_https() ? 'https' : 'http';
	
	if(is_numeric($str))
	{
		$CI = &get_instance();
		$CI->load->model('customer_icon_master_model');
		$image = $CI->customer_icon_master_model->get_key_value()[$str];
		return site_url('/assets/img/customer_icons/' . $image, $protocol);
	}
	return site_url('/img/uploaded/customers/' . $str, $protocol);
}

/**
 * チャットメッセージの画像パスを返す
 * @param string $str
 * @return string
 */
function chats_image($str)
{
	if(empty($str))
	{
		return '';
	}
	
	$protocol = is_https() ? 'https' : 'http';
	
	return site_url('/img/uploaded/chats/' . $str, $protocol);
}

/**
 * メニューリンクを作成
 * @param string $url
 * @return boolean
 */
function anchor_menu($url, $title)
{
	$CI = &get_instance();
	$current = $CI->router->fetch_class();

	// URLを分割
	$parse_url = explode('/', $url);
	$controller = $parse_url[1];
	$method = $parse_url[2];

	// メニューリンクの場合のみ、アイコンのクラス名を設定
	$class = ($method == 'init') ? $controller : '';

	$attr = '';
	if($class == $current)
	{
		$attr = 'class="on"';
	}
	return '<a href="'.$url.'" '.$attr.'><span class="icon_'.$class.'"></span>' . $title . '</a>';
}

/**
 * ソートアイコン作成して返す
 * @param string $key
 * @param array $sort
 */
function sort_icon($key, $sort)
{
	if($key == $sort['key'])
	{
		if($sort['order'] == 'asc')
		{
			$html = '<span class="on">▲</span><span>▼</span>';
		}
		elseif($sort['order'] == 'desc')
		{
			$html = '<span>▲</span><span class="on">▼</span>';
		}
	}
	else
	{
		$html = '<span>▲</span><span>▼</span>';
	}
	return $html;
}

/**
 * ページングの件数を表示する
 * @param int $total 総件数
 * @param int $cur_page 現在のページ数
 * @param int $per_page 1ページあたりの表示件数
 *
 */
function pagination_count($total, $cur_page, $per_page)
{
	if(! $cur_page)
	{
		// ページングしない場合
		
		// 表示範囲の最初
		$from = 1;
		// 表示範囲の最後
		$to = $total;
	}
	else
	{
		// ページングする場合
		
		// 表示範囲の最初
		$from = ($cur_page - 1) * $per_page + 1;
		// 表示範囲の最後
		$to = $per_page * $cur_page >= $total ? $total : $cur_page * $per_page;
	}

	// 整形して出力
	out($from.'〜'.$to.'件を表示 / '.$total.'件');
}

/**
 * 店舗アカウントでログイン中かどうか
 * @return bool
 */
function is_logged_in_tenpo()
{
	$CI = &get_instance();
	$login_staff = $CI->auth->get_login_staff();
	if($login_staff['authority_level'] == MY_constant::AUTH_LEVEL_TENPO)
	{
		return TRUE;
	}
	return FALSE;
}

/**
 * 統括アカウントでログイン中かどうか
 */
function is_logged_in_toukatsu()
{
	$CI = &get_instance();
	$login_staff = $CI->auth->get_login_staff();
	if($login_staff['authority_level'] == MY_constant::AUTH_LEVEL_TOUKATSU)
	{
		return TRUE;
	}
	return FALSE;
}

/**
 * 管理メニューのクラスを返す
 * @param string $class
 * @return string
 */
function admin_menu_class($class)
{
	$CI = &get_instance();
	return $class == $CI->router->fetch_class() ? 'active' : ''; 
}

/**
 * エラークラスを返す
 * @param string $field
 * @return string
 */
function has_error($field = '')
{
	if (FALSE === ($OBJ =& _get_validation_object()))
	{
		return '';
	}
	$error_array = $OBJ->error_array();
	return array_key_exists($field, $error_array) ? 'has-error' : '';
}

/**
 * 英数字を半角に変換する
 * @param string $str
 * @return string
 */
function to_hankaku($str)
{
	return mb_convert_kana($str, 'a');
}

/**
 * 小数点以下を指定の桁数で切り捨てる
 * @param number $arg
 * @param int $digit
 * @return number
 */
function cutoff_decimal($arg, $digit)
{
	$i = pow(10, $digit);
	return (floor($arg * $i)) / $i;
}

/**
 * 未入力と0以外は1に変換する
 * @param string $str
 * @return int
 */
function to_flag($str)
{
	if(!$str)
	{
		return 0;
	}
	return 1;
}

function formatting_prefecture($str)
{
	$pref_to = ['東京'];
	$pref_dou = ['北海'];
	$pref_hu = ['京都','大阪'];
	$pref_ken = ['青森','岩手','宮城','秋田','山形','福島','茨城','栃木','群馬','埼玉','千葉','神奈川','新潟','富山','石川','福井','山梨','長野','岐阜','静岡','愛知','三重','滋賀','兵庫','奈良','和歌山','鳥取','島根','岡山','広島','山口','徳島','香川','愛媛','高知','福岡','佐賀','長崎','熊本','大分','宮崎','鹿児島','沖縄'];
	if(in_array($str, $pref_to))
	{
		return $str.'都';
	}
	if(in_array($str, $pref_dou))
	{
		return $str.'道';
	}
	if(in_array($str, $pref_hu))
	{
		return $str.'府';
	}
	if(in_array($str, $pref_ken))
	{
		return $str.'県';
	}
	return $str;
}

/**
 * デバッグ用出力
 * @param unknown $expression
 */
function pre_var_dump($expression)
{
	echo '<pre>';
	var_dump($expression);
	echo '</pre>';
}

/**
 * Error Logging Interface
 *
 * We use this as a simple mechanism to access the logging
 * class and send messages to be logged.
 *
 * @param	string	the error level: 'error', 'debug' or 'info'
 * @param	string	the error message
 * @return	void
 */
function debug($message)
{
	static $_log;

	if ($_log === NULL)
	{
		// references cannot be directly assigned to static variables, so we use an array
		$_log[0] =& load_class('Log', 'core');
	}

	if(is_array($message))
	{
		$message = print_r($message, TRUE);
	}
	$_log[0]->write_log('debug', $message);
}