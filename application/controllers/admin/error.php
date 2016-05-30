<?php
class Error extends Admin_Controller {
	public function __construct()
	{
		parent::__construct();
		echo 'called';
	}
	
	public function error_404()
	{
		$this->output->set_status_header('404');
		$this->_render('error/show_404');
	}
}