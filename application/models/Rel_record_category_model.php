<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rel_record_category_model extends MY_Model {
	
	public $record_id;
	public $category_id;
	public $deleted_flag;
	
	public function __construct()
	{
		// Call the CI_Model constructor
		parent::__construct();
	}
	
	/**
	 * 記事の関連カテゴリーを取得
	 * @param int $record_id
	 */
	public function get_rel_category($record_id)
	{
		$this->db
			->join('category', 'category.id = rel_record_category.category_id')
			->where('record_id', $record_id)
		;
		return $this->get_all();
	}
}