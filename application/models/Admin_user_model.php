<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_user_model extends MY_Model {
	
	public $login_id;
	public $password;
	public $admin_name;
	public $image;
	
	public function __construct()
	{
		// Call the CI_Model constructor
		parent::__construct();
	}
	
	/**
	 * 最終ログイン日時を更新
	 * @param int $id
	 */
	public function update_last_logined_at($id)
	{
		$this->db->set('last_logined_at', 'NOW()', FALSE);
		$this->update(NULL, $id);
	}
}