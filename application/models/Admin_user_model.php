<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_user_model extends MY_Model {
	
	public $login_id;
	public $password;
	public $admin_name;
	
	public function __construct()
	{
		// Call the CI_Model constructor
		parent::__construct();
	}
}