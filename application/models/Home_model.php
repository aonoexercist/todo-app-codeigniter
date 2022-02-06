<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Home_model extends CI_Model {
    private $table_name = "todo";

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
                'user_id' => array(
                    'type' => 'INT',
                    'unsigned' => TRUE,
                    'null' => TRUE,
                    'default' => NULL,
                    'auto_increment' => FALSE
                ),
                'title' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '100'
                ),
                'check' => array(
                    'type' => 'BOOL',
                    'default' => FALSE
                ),
                'date_created' => array(
                    'type' =>'DATETIME',
                ),
                '`date_modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()'
            );
            $this->dbforge->add_field($fields);
            $this->dbforge->add_key('id', TRUE);
            $this->dbforge->add_key('user_id');

            $this->dbforge->create_table($this->table_name);
        }
    }

    function create_data($data){
        $this->db->set('date_created', 'NOW()', FALSE);
        return $this->db->insert($this->table_name, $data);
    }

    function create_data_check($data){
        $whereArr = array(
            'title' => $data['title'],
        );
        $this->db->where($whereArr);
        $countRows = $this->db->get($this->table_name)->num_rows();

        if ($countRows > 0) {
        // not unique data
            return FALSE; // here I change TRUE to false.
        } else {
        // unique data
            return TRUE; // And here false to TRUE
        }
    }

    function read_data($user_id)
    {
        $where_arr = array(
            'user_id' => $user_id
        );
        $this->db->where($where_arr);

        return $this->db->get($this->table_name)->result_array();
    }

    function update_data($id, $data){
        return $update = ( $this->db->update($this->table_name, $data, array('id' => $id)) );
    }

    function delete_data($ids){
        $this->db->where_in('id', $ids);
        return $this->db->delete($this->table_name);
    }

}

?>