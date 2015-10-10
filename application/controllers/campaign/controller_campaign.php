<?php  
defined('BASEPATH') OR exit('No direct script access allowed');

class controller_campaign extends MY_Controller{

    public function __construct(){
        parent::__construct();

        $this->load->library('form_validation');
        $this->load->model('campaign/model_campaign');
    }

    public function index(){

        $vars['session'] = $this->session->userdata();
        $vars['css_load'] = array(
        	'color-palette' => 'apps/bootstrap-colorpalette/css/bootstrap-colorpalette.css'
        );
        $vars['js_load'] = array(
            'jquery_form' => 'js/jquery.form.js',
            'color-palette' => 'apps/bootstrap-colorpalette/js/bootstrap-colorpalette.js',
            'config' => 'js/campaign/config.js'
        );

        $vars['campaigns'] = $this->model_campaign->show_all_campaigns();

        $this->load->template('campaign/view_campaign', $vars);
    }

    public function manage()
    {
    	$this->form_validation->set_rules('campaign', 'Campaign', 'trim|required|xss_clean');
    	$this->form_validation->set_rules('design', 'Design', 'trim|required|xss_clean');

        if ($this->form_validation->run() == TRUE){

            // check cid change on category or subcategory
            $id = ($this->input->post('id') != '')?$this->input->post('id'):'0';

            $design = '';
            switch ($this->input->post('design')) {
            	case '#5CB85C':
            		$design = 'green';
            		break;
            	case '#337AB7':
            		$design = 'primary';
            		break;
            	case '#F0AD4E':
            		$design = 'yellow';
            		break;
            	case '#D9534F':
            		$design = 'red';
            		break;
            	default:
            		$design = 'default';
            		break;
            }


            $data = array(
            	'id' => $id,
                'campaign' => $this->input->post('campaign'),
                'design' => $design,
                'user' => $this->session->userdata('id')
            );

            $this->model_campaign->data = $data;
            $id = $this->model_campaign->store_campaign();

            $params['msg'] = 'Se ha enviado un correo electronico con la infomación de su cuenta';
            $params['id'] = $id;
            $params['success'] = true;
        }
        else{

            $errors = array();

            foreach ($this->input->post() as $key => $val) {
                $errors[$key] = form_error($key);
            }

            $params['errors'] = array_filter($errors);
            $params['success'] = false;
        }

        echo json_encode($params);
    }

}
?>