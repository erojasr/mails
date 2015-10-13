<?php  
defined('BASEPATH') OR exit('No direct script access allowed');

class Controller_user extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function user_profile()
	{
		$vars['session'] = $this->session->userdata();

		$vars['css_load'] = array(
            'css_style' => 'css/user/style.css'
        );

        $vars['top_js'] = array(
            'CDN' => '//cdn.ckeditor.com/4.5.4/basic/ckeditor.js'
        );

		$vars['js_load'] = array(
            'jquery_form' => 'js/jquery.form.js',
            'user_js' => 'js/user/profile.js'
        );

		$this->load->template('user/view_profile', $vars);

	}
}


?>