<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tag_model extends MY_Model {
	
	public $tag_name;
	public $segment;
	public $deleted_flag;
	
	public function __construct()
	{
		// Call the CI_Model constructor
		parent::__construct();
	}
}