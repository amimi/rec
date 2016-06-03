<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rel_record_tag_model extends MY_Model {
	
	public $record_id;
	public $tag_id;
	public $deleted_flag;
	
	public function __construct()
	{
		// Call the CI_Model constructor
		parent::__construct();
	}
	
	/**
	 * 記事の関連タグを取得
	 * @param int $record_id
	 */
	public function get_rel_tag($record_id)
	{
		$this->db
			->join('tag', 'tag.id = rel_record_tag.tag_id')
			->where('record_id', $record_id)
		;
		return $this->get_all();
	}
}