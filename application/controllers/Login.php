<?php  

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        // load user model
        $this->load->model('User_model');

        $this->load->helper('captcha');
        $this->load->library('form_validation');
    }

    public function index()
    {
	    $vars['css_load'] = array(
	        'login_style' => 'css/login.css'
	    );

        $vars['js_load'] = array(
            'jquery_form' => 'js/jquery.form.js',
            'jquery_login' => 'js/login.js'
        );

        // generate captcha
        $captcha = $this->do_captcha_generator();
        $vars['image'] = $captcha['image'];
        /* Store the captcha value (or 'word') in a session to retrieve later */
        $this->session->set_userdata(array('captchaWord'=>$captcha['word'], 'image'=> $captcha['time'].'.jpg'));

        $this->load->template('login', $vars);
    }

    public function validate_user(){

        // set inputs rules
        $this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');

        // change message validation json response
        $this->form_validation->set_message('required', 1);

        // validate if the data is correct
        if($this->form_validation->run() == FALSE){
            $params = array(
                'success' => 0,
                'msg' => 'Los datos son incorrectos'
            );

            echo json_encode($params);
        }
        else{

            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $valid_user = $this->User_model->user_login_account($email, $password);

            if($valid_user){
                //need add last login
                //need add redirection uri

                $params = array(
                    'success' => 1,
                    'redirect' => 'dashboard',
                    'msg' => 'Ha iniciado sesión correctament...'
                );

                echo json_encode($params);
            }
            else{

                $params = array(
                    'success' => 0,
                    'msg' => 'Los datos son incorrectos'
                );

                echo json_encode($params);
            }

        }


    }

    /**
     * function to create a new user from register information
     */
    public function create_new_user(){

        $this->form_validation->set_rules('name', 'Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('lastname', 'Lastname', 'trim|required|xss_clean');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean|valid_email|callback_validate_user_exist');
        $this->form_validation->set_rules('telephone', 'Telephone', 'trim|required|xss_clean');
        $this->form_validation->set_rules('born', 'Born', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
        $this->form_validation->set_rules('repassword', 'Repassword', 'trim|required|xss_clean|matches[password]');
        $this->form_validation->set_rules('code', 'Code', 'callback_validate_captcha');

        $this->form_validation->set_message('matches', 'La contraseña no es igual');

        if ($this->form_validation->run() == TRUE){

            if(file_exists(BASEPATH."../assets/images/".$this->session->userdata('image')))
                unlink(BASEPATH."../assets/images/".$this->session->userdata('image'));

            $this->session->unset_userdata('captchaWord');
            $this->session->unset_userdata('image');

            $data = array(
                'name' => $this->input->post('name'),
                'lastname' => $this->input->post('lastname'),
                'email' => $this->input->post('email'),
                'phone' => $this->input->post('telephone'),
                'born' => $this->input->post('born'),
                'password' => $this->input->post('password'),
            );

            $this->User_model->new_account($data);

            $params['redirect'] = base_url().'login#login';
            $params['user'] = $this->input->post('name').' '.$this->input->post('lastname');
            $params['msg'] = 'Se ha enviado un correo electronico con la infomación de su cuenta';
            $params['success'] = true;

        }
        else{

            $errors = array();

            foreach ($this->input->post() as $key => $val) {
                $errors[$key] = form_error($key);
            }

            $captcha = $this->do_captcha_generator();
            $params['image'] = $captcha['image'];

            /* Store the captcha value (or 'word') in a session to retrieve later */
            $this->session->set_userdata(array('captchaWord'=>$captcha['word'], 'image'=> $captcha['time'].'jpg'));

            $params['errors'] = array_filter($errors);
            $params['success'] = false;
        }

        echo json_encode($params);

    }

    public function do_captcha_generator(){

        /* Setup vals to pass into the create_captcha function */
        $params = array(
            'img_path' => 'assets/images/',
            'img_url' => base_url().'assets/images/',
            'img_width'     => '138',
            'img_height' => 34,
            'font_size' => 24,
            'word_length' => 5,
            'colors' => array(
                'background' => array(255, 255, 255),
                'border' => array(255, 255, 255),
                'text' => array(0, 0, 0),
                'grid' => array(255, 255, 255)
            ),
            'pool' => '23456789abcdefghjkmnpqrstuvwxyz',
        );

        /* Generate the captcha */
        $captcha = create_captcha($params);

        return $captcha;

    }

    public function validate_captcha(){

        if($this->input->post('code') != $this->session->userdata('captchaWord')){
            $this->form_validation->set_message('validate_captcha', 'Codigo incorrecto');
            return false;
        }
        else{
            return true;
        }

    }

    public function validate_user_exist()
    {

        $user = $this->User_model->user_exist($this->input->post('email'));

        if ($user) {
            $this->form_validation->set_message('validate_user_exist', 'Ya existe una cuenta con este correo.');
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }

    public function logout_user(){
        $this->session->sess_destroy();
        redirect('/', 'refresh');
    }
}

?>