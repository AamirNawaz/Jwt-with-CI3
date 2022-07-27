<?php

class AuthModel extends CI_Model{

    function check_login($email,$password){

        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('email',$email);
        $this->db->where('password',$password);
        $this->db->where('status',0);
        
        $query = $this->db->get();

        if($query->num_rows()>0){
            return $query->result_array();
        }else{
            return false;
        }
    }


    function signup($data){
        $this->db->insert('user',$data);
        return $this->db->insert_id();
    }

    function getRoles(){
        $this->db->select('*');
        $this->db->from('role');
        $query = $this->db->get();

        return $query->result_array();
    }

    function getUsers(){
        $this->db->select('*');
        $this->db->from('user');
        $query = $this->db->get();

        return $query->result_array();
    }

}