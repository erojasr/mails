<?php
/**
 * Created by PhpStorm.
 * User: frm
 * Date: 7/5/15
 * Time: 7:22
 */

class LanguageLoader {

    function initialize(){
        $ci =& get_instance();

        $ci->load->helper('language');

        $user_lang = $ci->session->userdata('site_lang');

        if($user_lang){
            $ci->lang->load('user_interface', $user_lang);
        }
        else{
            $ci->lang->load('user_interface', 'spanish');
        }

    }

}