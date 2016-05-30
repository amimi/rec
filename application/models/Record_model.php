<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Record_model extends MY_Model {
	
	public $image;
	public $comment;
	public $published_flag;
	public $deleted_flag;
	public $published_at;
	
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
	}

}