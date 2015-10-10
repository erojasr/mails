<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class SnippetCategories extends MY_Controller{

    public function __construct(){
        parent::__construct();

        $this->load->library('form_validation');

        $this->load->model('admin/ModelCategories');
    }

    /**
     * Metodo para inicializar el panel de categorias
     *
     */
    public function index($subcategory = NULL){

        $vars['js_load'] = array(
            'jquery_form' => 'js/jquery.form.js',
            'tabledit' => 'apps/jquery-tabledit/jquery.tabledit.js',
            'categories' => 'js/admin/categories.js'
        );
        if($subcategory != NULL)
        {
            $cat_name = $this->ModelCategories->viewTitleCategory($subcategory);
            $vars['title'] = "Manage Subcategories";
            $vars['title_category'] = $cat_name[0]->category_name;
            $vars['sub_add'] = TRUE;
        }
        else
        {
            $vars['title'] = "Manage Categories";

            //$vars['list_categories'] = $this->ModelCategories->showCategoriesList();
        }


        $this->load->template('admin/admin_manage_snippet_categories', $vars);
    }



    public function load(){

        // se debe hacer un swith para manejar los varlores
        
        if($this->input->post('action') != '')
            $action = $this->input->post('action');
        else
            $action = '';
        switch($action){
            case 'edit':
                //echo json_encode('edit');
                $this->form_validation->set_rules('category_name','Category', 'trim|required|xss_clean');
                $this->form_validation->set_rules('status','Status', 'trim|required|xss_clean');

                if($this->form_validation->run() == TRUE)
                {
                    $data = array(
                        'id' => $this->input->post('id'),
                        'category_name' => $this->input->post('category_name'),
                        'status' => $this->input->post('status'),
                        'user' => $this->session->userdata('id')
                    );

                    $this->ModelCategories->updateCategories($data);

                    $params['msg'] = 'Se ha actualizo correctamente';
                    $params['success'] = true;
                }
                else
                {
                    $errors = array();
                    foreach ($this->input->post() as $key => $val) {
                        $errors[$key] = form_error($key);
                    }

                    $params['errors'] = array_filter($errors);
                    $params['success'] = false;
                }
                echo json_encode($params);
                break;
            case 'delete':
                $id = $this->input->post('id');
                //echo json_encode('retorno '.$id);

                // ya tenemos el id
                // verificar si ese id es padre o child
                // si es child delete
                // si es padre debemos verificar primero que no tengo childs asociados
                // si no tiene childs asociados delete de una
                // 
                
                //var_dump($this->ModelCategories->checkParentChilds($id));
                //exit;

                if($this->ModelCategories->checkParentChilds($id) == FALSE)
                {
                    // si no tiene hijos delete
                    if($this->ModelCategories->deleteCategory($id))
                    {
                        $params['msg'] = 'Se ha eliminado';
                        $params['success'] = true;
                    }
                }
                else
                {
                    // tiene hijos show error
                    $params['msg'] = 'No puedes eliminar esta categoria, porque tiene subcategorias';
                    $params['success'] = false;
                }
                
                echo json_encode($params);

                break;
            default:
                $cid = $this->input->get('cid');
                $categories = $this->ModelCategories->showCategoriesList($cid);
                echo json_encode($categories);
        }
        //$categories = $this->ModelCategories->showCategoriesList();
        //echo json_encode($categories);


    }


    public function store(){
        $this->form_validation->set_rules('category', 'Category', 'trim|required|xss_clean');

        if ($this->form_validation->run() == TRUE){

            // check cid change on category or subcategory
            $cid = ($this->input->post('cid') != '')?$this->input->post('cid'):'0';
            $data = array(
                'category' => $this->input->post('category'),
                'parent' => $cid,
                'user' => $this->session->userdata('id')
            );

            $this->ModelCategories->store($data);

            $params['msg'] = 'Se ha enviado un correo electronico con la infomación de su cuenta';
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