<?php
/**
 * Created by PhpStorm.
 * User: frm
 * Date: 5/5/15
 * Time: 16:09
 */

class MY_Controller extends CI_Controller{

    private $publicas = array(
        "",
        "login/validate_user",
        "login/index",
        "login/logout_user"
    );

    public function __construct(){
        parent::__construct();

        $public_access = in_array($this->uri->uri_string(), $this->publicas);

        if(! $this->session->userdata('id') && ! $public_access){

            $uri = urlencode($this->uri->uri_string());
            redirect("login?r={$uri}", "redirect");
        }
    }

}