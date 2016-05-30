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
	 * ユーザー新規作成
	 */
	public function insert_admin_user($data)
	{
		$this->load->library('encrypt');
		
		$this->login_id = $data['login_id'];
		$this->password = $this->encrypt->encode($data['password']);
		$this->admin_name = $data['admin_name'];
		$this->image = $data['image'];
		
		return $this->insert($this);
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