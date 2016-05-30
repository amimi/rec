<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 * @author Ami
 *
 */
class MY_Model extends CI_Model {
	
	protected $table;
	
	public function __construct()
	{
		parent::__construct();
		$this->table = str_replace('_model', '', get_called_class());
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
	 * IDを指定して1行取得する
	 * @param int $id
	 * @param string $field
	 */
	public function get_by_id($id, $field = 'id')
	{
		return $this->db->get_where($this->table, [$field => $id])->row_array();
	}
	
	/**
	 * insert
	 * @param array $data
	 * @return bool
	 */
	public function insert($data)
	{
		return $this->db->insert($this->table, $data);
	}
	
	/**
	 * update
	 * @param array $data
	 * @param int $id
	 * @param string $field
	 * @return bool
	 */
	public function update($data = [], $id, $field = 'id')
	{
		return $this->db->update($this->table, $data, [$field => $id]);
	}
}