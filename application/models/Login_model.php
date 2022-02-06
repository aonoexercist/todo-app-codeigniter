<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Login_model extends CI_Model {
    private $table_name = "user";

    function login($email, $password)
    {
        $where_arr = array(
            'email' => $email
        );
        $this->db->where($where_arr);

        $query  = $this->db->get($this->table_name);
        $row = $query->row();

        if (password_verify($password,$row->password)) {
            return $query->row();
        } else {
            return false;
        }
    }

}

?>