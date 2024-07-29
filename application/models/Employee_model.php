<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Employee_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_employees()
    {
        return $this->db->get('employee')->result();
    }

    public function count_all(){
        return $this->db->count_all('employee');
    }
}
?>