<?php
/**
 * Class MY_Loader
 *
 * Template views
 *
 */
class MY_Loader extends CI_Loader {

    public $content;
    public $menu;

    public function __construct()
    {
        parent::__construct();
        
    }

    /**
     * Prepare the template
     *
     * @param $template is the view we need to display
     * @param array $vars params to add in the view
     * @param bool $return
     * @return object|string
     */
    public function template($template, $vars = array(), $return = FALSE)
    {
        $vars['title'] = (isset($vars['title']))?$vars['title']:"CodeIgniter APP";

        // check the user session
        $CI =& get_instance();
        $CI->load->model('admin/Model_categories');
        $vars['lang'] = $CI->session->userdata('site_lang');


        if($CI->session->userdata('id') != NULL){
            $vars['is_logged'] = true;
            //$vars['menu'] = $CI->Model_categories->makeMenu();
            $vars['sidebar'] = $this->view('default/sidebar', $vars, true);
        }
        else{
            $vars['is_logged'] = false;
        }
        $vars['access'] = $CI->session->userdata('access');
        $vars['user'] = $CI->session->userdata('username');


        ob_start();
        $this->view('default/header', $vars, $return);
        $this->view($template, $vars, $return);
        $this->view('default/footer', $vars, $return);
        $this->content = ob_get_contents();

        if ($return)
        {
            return $this->content;
        }
    }

}