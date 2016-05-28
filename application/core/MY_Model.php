<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Model extends CI_Model {
	
	protected $table;
	
	public function __construct()
	{
		parent::__construct();
		$this->table = rtrim(get_called_class(), '_model');
	}
	
	/**
	 * 全ての行を取得する
	 * @return array
	 */
	public function get_all()
	{
		return $this->db->get($this->table)->result_array();
	}
	
	/**
	 * インサート
	 * @param array $data
	 * @return bool
	 */
	public function insert($data)
	{
		return $this->db->insert($this->table, $data);
	}
}