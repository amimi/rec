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
	
	public function insert_admin_user()
	{
		$this->load->library('encrypt');
		
		$this->login_id = $this->input->post('login_id');
		$this->password = $this->encrypt->encode($this->input->post('password'));
		$this->admin_name = $this->input->post('admin_name');
		$this->image = $this->input->post('image');
		
		return $this->insert($this);
	}
}