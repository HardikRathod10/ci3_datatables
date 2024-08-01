<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Employee_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    // Method to get all employees
    public function get_employees()
    {
        $this->db->limit(30);
        return $this->db->get('employee')->result();
    }
    // Method to get all departments
    public function get_departments()
    {
        return $this->db->get('department')->result();
    }
    // Counting all records
    public function count_all()
    {
        return $this->db->count_all('employee');
    }
    // Method to count filtered records which will be passed at recordsFiltered option 
    public function count_filtered($post_data)
    {
        $this->make_query($post_data);
        return $this->db->get()->num_rows();
    }

    // Method to generate query
    public function make_query($post_data)
    {
        $this->db->select('employee.*, department.dept_name as dept_name');
        $this->db->from('employee');
        $this->db->join('dept_emp', 'employee.emp_no = dept_emp.emp_no');
        $this->db->join('department', 'dept_emp.dept_no=department.dept_no');
        // Adding like query
        if ($post_data['search']['value'] != "") {
            $this->db->or_like('first_name', $post_data['search']['value']);
            $this->db->or_like('last_name', $post_data['search']['value']);
        }
        // Filtering employees based on gender
        if (!empty($post_data['gender'])) {
            $this->db->where('gender', $post_data['gender']);
        }
        // Filtering employees between specified birth dates
        if (!empty($post_data['sdate']) && !empty($post_data['edate'])) {
            $this->db->where("birth_date BETWEEN '{$post_data['sdate']}' AND '{$post_data['edate']}'");
        }
        if (!empty($post_data['order'][0]['name']) && !empty($post_data['order'][0]['dir'])) {
            $this->db->order_by($post_data['order'][0]['name'], $post_data['order'][0]['dir']);
        }
        else{
            $this->db->order_by('emp_no', 'asc');
        }
    }

    // Method to built datatable
    public function get_datatable($post_data)
    {
        $this->make_query($post_data);
        if ($post_data['length'] != -1) {
            $this->db->limit($post_data['length'], $post_data['start']);
        }
        return $this->db->get()->result();
    }
}
?>