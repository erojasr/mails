<?php

class User_model extends CI_Model{

    public function __construct(){
        parent::__construct();
    }


    /**
     * Check the user access credentials (login access).
     *
     * @param $email user email
     * @param $pwd user password
     * @return bool
     */
    public function user_login_account($email, $pwd){

        $hash = password_hash($pwd, PASSWORD_DEFAULT);

        $sql = 'SELECT
            u.id,
            u.access,
            concat(u.name," ",u.lastname) AS username,
            u.email,
            u.password
            FROM
            users AS u
            WHERE
            u.email = ?
            AND u.is_active = 1
            LIMIT 1';

        $query = $this->db->query($sql, array($this->db->escape_str($email)));

        if($query->num_rows() > 0){
            $user = $query->row();


            if( password_verify($pwd, $user->password) ){

                unset($user->password);
                $this->session->set_userdata($user);
                $response = true;

            }
            else{
                $response = false;
            }

        }
        else{
            $response = false;
        }

        return $response;


    }

    public function new_account($data = array()){

        $password = password_hash($data['password'], PASSWORD_DEFAULT);

        $date = DateTime::createFromFormat('d/m/Y', $data['born']);


        $params = array(
            'access' => 3, // level access always guest user
            'name' => $this->db->escape_str($data['name']),
            'lastname' => $this->db->escape_str($data['lastname']),
            'email' => $this->db->escape_str($data['email']),
            'phone' => $this->db->escape_str($data['phone']),
            'date_born' => $this->db->escape_str($date->format('Y-m-d')),
            'password' => $password,
            'is_active' => 1, // user always is active
            'date_created' => date('Y-m-d H:i:s')
        );

        $this->db->insert('users', $params);

    }

    public function user_exist($email){

        $sql = "SELECT email FROM users WHERE email = ? LIMIT 1";
        $query = $this->db->query($sql, array($this->db->escape_str($email)));

        if($query->num_rows() > 0) {
            return TRUE;
        }
        else{
            return FALSE;
        }
    }

}

?>