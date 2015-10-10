<?php
/**
 * Created by PhpStorm.
 * User: frm
 * Date: 7/5/15
 * Time: 7:33
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class LangSwitch extends CI_Controller{

    public function __construct(){
        parent::__construct();

        $this->load->helper('url');
    }

    public function switch_language($lang = ""){

        switch($lang){
            case 'en_US':
                $language = 'english';
                break;
            case 'es_CR':
                $language = 'spanish';
                break;
        }

        $default = ($language != "")? $language : "spanish";
        $this->session->set_userdata('site_lang', $default);

        //$uri = urlencode($this->uri->uri_string());

        $response['lang'] = $this->session->userdata('site_lang');
        $response['success'] = true;

        echo json_encode($response);
    }

}