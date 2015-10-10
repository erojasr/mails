<?php  
defined('BASEPATH') OR exit('No direct script access allowed');

class controller_template extends MY_Controller{

    public function __construct(){
        parent::__construct();
    }

    public function index(){

        $vars['session'] = $this->session->userdata();

        $this->load->template('templates/view_template', $vars);
    }

    public function manage($params = ""){

    	$vars['session'] = $this->session->userdata();

        $vars['top_js'] = array(
            'jquery_form' => 'js/jquery.form.js',
            'CDN' => '//cdn.ckeditor.com/4.5.3/full/ckeditor.js'
        );
        $this->load->template('templates/view_template_manage', $vars);

    }

}
?>