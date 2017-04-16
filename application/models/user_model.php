<?php if (!defined('BASEPATH')) exit ('No direct script access allowed');

class user_model extends CI_Model{
    public function getProfile($id){
        $query=$this->db->get('users');
        return $query->result();
    }
}