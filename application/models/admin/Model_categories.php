<?php


class Model_categories extends CI_Model{

    public function __construct(){
        parent::__construct();
    }

    public function store($data){

        $params = array(
            'category_name' => $this->db->escape_str($data['category']),
            'is_active' => 1,
            'parent' => $this->db->escape_str($data['parent']),
            'date_created' => date('Y-m-d H:i:s'),
            'inserted_by' => $data['user'],
            'last_modification' => date('Y-m-d H:i:s'),
            'modificated_by' => $data['user']
        );

        $this->db->insert('snippet_categories', $params);

    }

    public function updateCategories($data)
    {
        $status = 'Activo';
        if($data['status'] == 2)
            $status = 'Inactivo';

        $params = array(
            'category_name' => $this->db->escape_str($data['category_name']),
            'is_active' => $this->db->escape_str($data['status']),
            'last_modification' => date('Y-m-d H:i:s'),
            'modificated_by' => $data['user']
        );

        $this->db->where('id', $data['id']);
        $this->db->update('snippet_categories', $params);
    }

    public function showCategoriesList($cid = FALSE){

        if($cid == FALSE)
            $cid = 0;

        $sql = "SELECT id, category_name,
                CASE
                    WHEN is_active = 0 THEN 'Inactivo'
                    WHEN is_active = 1 THEN 'Activo'
                END AS 'status'
                FROM 
                    snippet_categories
                WHERE
                    parent = ?";

        $query = $this->db->query($sql, array($cid));

        if($query->num_rows() > 0){
            $categories = $query->result();
            $response = $categories;
        }
        else{
            $response = false;
        }

        return $response;
    }

    public function viewTitleCategory($category)
    {
        $sql = "CALL ADM_CAT_VIEW_CATEGORY_NAME(".$this->db->escape_str($category).")";
        $query = $this->db->query($sql);

        $response = FALSE;
        if($query->num_rows() > 0)
        {
            $cat_name = $query->result();
            $response = $cat_name;
        }

        return $response;
    }

    /**
     * When the admin create new category, we need to return the new record
     * and insert in the editable with json without refresh
     */
    public function returnLastInsertRow(){

    }

    /**
     * Show the childs associated on parent
     * @return [type] [description]
     */
    public function checkParentChilds($category)
    {
        try{
            $id = $this->db->escape_str($category);
            $sql = "SELECT COUNT(*) AS total
                    FROM 
                        snippet_categories 
                    WHERE 
                    parent = ".$id;
            $query = $this->db->query($sql);
            $response = FALSE;

            if($query->row(0)->total > 0)
            {
                $response = TRUE;
            }

            return $response;
        }
        catch(Exception $e){
            log_message('error', 'Error get parent childs');
        }
    }

    public function deleteCategory($category)
    {
        try{
            $id = $this->db->escape_str($category);
            $sql = "DELETE FROM snippet_categories WHERE id=".$id;

            $response = FALSE;
            if($this->db->query($sql))
            {
                $response = TRUE;
            }

            return $response;
        }
        catch(Exception $e)
        {
            log_message('error', $e->getMessage());
        }
    }

    /**
     * Metodo para obtener el menu de los snippets
     * @return [type] [description]
     */
    public function makeMenu()
    {
        try{
            $sql = "CALL CAT_VIEW_MENU()";
            $response = FALSE;

            $query = $this->db->query($sql);

            if($query->num_rows() > 0)
            {
                $response = $this->createMenu($query->result_array());
            }
        //log_message('error', print_r($response), true);
        return $response;
        }
        catch(Exception $e)
        {
            log_message('error', $e->getMessage());
        }
    }

    public function createMenu($menu,$parent="", $indent="")
    {

        $return = array();
        foreach($menu as $key => $val) 
        {
            if($val["parent"] == $parent) {
                $return[] = $indent.$val["categories"];
                $return = array_merge($return, createMenu($array, $val["categories"], $indent."&nbsp;&nbsp;&nbsp;"));
            }
        }
            var_dump($return);
            exit;
        return $return;
    }

}