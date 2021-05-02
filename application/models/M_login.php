<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_Login extends CI_Model {
public function get_data($username,$password) {
    $this->db->select('*');
    $this->db->from('user');
    $this->db->WHERE('username',$username);
    $this->db->WHERE('password',$password);
    $query = $this->db->get();
    return $query->result();

}
}
