<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 * @author Ami
 *
 */
class MY_Model extends CI_Model {
	
	protected $table;
	
	protected $columns;
	
	public function __construct()
	{
		parent::__construct();
		$this->table = str_replace('_model', '', mb_strtolower(get_called_class()));
	}
	
	/**
	 * 全ての行を取得する
	 * @param bool $except_delete
	 * @return array
	 */
	public function get_all($except_delete = TRUE)
	{
		if($except_delete)
		{
			$this->db->where("$this->table.deleted_flag", FALSE);
		}
		return $this->db->get($this->table)->result_array();
	}
	
	/**
	 * IDを指定して1行取得する
	 * @param int $id
	 * @param string $field
	 * @param bool $except_delete
	 */
	public function get_by_id($id, $field = 'id', $except_delete = TRUE)
	{
		if($except_delete)
		{
			$this->db->where('deleted_flag', FALSE);
		}
		return $this->db->get_where($this->table, [$field => $id])->row_array();
	}
	
	/**
	 * insert
	 * @param array $data
	 * @return int | FALSE 
	 */
	public function insert($data)
	{
		foreach ($data as $key => $val)
		{
			if(property_exists(get_called_class(), $key))
			{
				$this->columns[$key] = $val;
			}
		}
		
		if($this->db->insert($this->table, $this->columns))
		{
				return $this->db->insert_id();
		}
		return FALSE;
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