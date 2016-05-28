class MY_Loader extends CI_Loader {
    function __construct(){
        parent::__construct();
        if(defined('ADMIN') && ADMIN == TRUE)
        {
	        $this->header_path = APPPATH . "views/admin/header.php";
    	    $this->footer_path = APPPATH . "views/admin/footer.php";
        }
        else
        {
        	$this->header_path = APPPATH . "views/header.php";
        	$this->footer_path = APPPATH . "views/footer.php";
        }
    }
 
    public function set_header($view)
    {
        $this->header_path = APPPATH . "views/".$view.".php";
    }
 
    public function set_footer($view)
    {
        $this->footer_path = APPPATH . "views/".$view.".php";
    }
 
    public function view($view, $vars = array(), $return = FALSE)
    {
        $ci =& get_instance();
        $class = $ci->router->fetch_class(); // Get class
        $action = $ci->router->fetch_method(); // Get action
 
        $header =  $this->_ci_load(array('_ci_path' => $this->header_path, '_ci_view' => $view, '_ci_vars' => $this->_ci_object_to_array($vars), '_ci_return' => $return));
        $body =  $this->_ci_load(array('_ci_view' => $view, '_ci_vars' => $this->_ci_object_to_array($vars), '_ci_return' => $return));
        $footer =  $this->_ci_load(array('_ci_path' => $this->footer_path, '_ci_view' => $view, '_ci_vars' => $this->_ci_object_to_array($vars), '_ci_return' => $return));
        if($return) {
            return $body;
        }
    }
}