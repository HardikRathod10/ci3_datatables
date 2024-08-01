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
        $this->db->limit(30);
        return $this->db->get('employee')->result();
    }
    // Counting all records
    public function count_all()
    {
        return $this->db->count_all('employee');
    }
    // Method to count filtered records which will be passed at recordsFiltered option 
    public function count_filtered()
    {
        $this->make_query();
        return $this->db->get()->num_rows();
    }

    // Method to generate query
    public function make_query()
    {
        $this->db->select();
        $this->db->from('employee');
        // Adding like query
        if ($this->input->post()['search']['value'] != "" || $this->input->post()['gender'] != '') {
            // $like_arr = [
            //     'first_name' => $this->input->post()['search']['value'],
            //     'last_name' => $this->input->post()['search']['value'],
            //     'gender' => $this->input->post()['gender'],
            // ];
            $this->db->like('first_name',$this->input->post()['search']['value']);
            $this->db->or_like('last_name',$this->input->post()['search']['value']);
            $this->db->like('gender',$this->input->post()['gender']);
        }
    }

    // Method to built datatable
    public function get_datatable()
    {
        $this->make_query();
        $order_column = isset($this->input->post()['order'][0]['name']) ? $this->input->post()['order'][0]['name'] : "emp_no";
        $order_direction = isset($this->input->post()['order'][0]['dir']) ? $this->input->post()['order'][0]['dir'] : "ASC";
        $this->db->order_by($order_column, $order_direction);
        if ($this->input->post()['length'] != -1) {
            $this->db->limit($this->input->post()['length'], $this->input->post()['start']);
        }
        return $this->db->get()->result();
    }

}
?>