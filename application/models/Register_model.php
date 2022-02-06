<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Register_model extends CI_Model {
    private $table_name = "user";

    // create table if not exist
    function check_table_if_exist(){
        if(!$this->db->table_exists($this->table_name)){
            $this->load->dbforge();

            $fields = array(
                'id' => array(
                    'type' => 'INT',
                    'constraint' => 11,
                    'unsigned' => TRUE,
                    'auto_increment' => TRUE
                ),
                'first_name' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '100'
                ),
                'middle_name' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '100'
                ),
                'last_name' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '100'
                ),
                'email' => array(
                    'type' => 'TEXT',
                ),
                'password' => array(
                    'type' => 'TEXT',
                ),
                'date_created' => array(
                    'type' =>'DATETIME',
                ),
                '`date_modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()'
            );
            $this->dbforge->add_field($fields);
            $this->dbforge->add_key('id', TRUE);

            $this->dbforge->create_table($this->table_name);
        }
    }

    function create_data($data){
        $this->db->set('date_created', 'NOW()', FALSE);
        return $this->db->insert($this->table_name, $data);
    }

}

?>