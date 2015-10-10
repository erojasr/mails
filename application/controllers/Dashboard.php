<?php
/**
 * Created by PhpStorm.
 * User: frm
 * Date: 5/5/15
 * Time: 13:56
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller{

    public function __construct(){
        parent::__construct();
    }

    public function index(){

        $vars['session'] = $this->session->userdata();
        $this->load->template('dashboard', $vars);
    }

}