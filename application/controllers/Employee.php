<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Employee extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['employee_model', 'custom_model']);
    }

    public function index()
    {

        $data['title'] = "Datatable";
        // $data['employees'] = $this->employee_model->get_employees();
        $data['departments']=$this->employee_model->get_departments();
        $this->load->view('datatable', $data);

    }

    public function fetch_employees()
    {
        $post_data = $this->input->post();
        // echo $this->employee_model->make_query($post_data);
        // exit;

        // print_r($this->input->post());
        // exit;

        // ***** Selecting all data without serching and ordering *****
        //-------------------
        // $records = $this->employee_model->get_employees();
        // $data = array();

        // foreach ($records as $record) {
        //    array_push($data, $record);
        // }

        // // Convert each object to a JSON string
        // $json_strings = array_map(function($record) {
        //     return json_encode($record);
        // }, $records);

        // // Combine them into a single string with brackets
        // $combined_string = '[' . implode(', ', $json_strings) . ']';

        // $data = [
        //     'draw' => $this->input->post('draw'),
        //     'recordsTotal' => $this->employee_model->count_all(),
        //     'data' => $combined_string
        // ];

        // echo json_encode($data);

        // ***** Selecting data with serching and ordering and limitation with query. *****
        //-------------------

        // $start = $this->input->post()['start'];
        // $length = $this->input->post()['length'];

        // With ordering
        // $order_column = isset($this->input->post()['order'][0]['name'])?$this->input->post()['order'][0]['name']:"emp_no";
        // $order_direction = isset($this->input->post()['order'][0]['dir'])?$this->input->post()['order'][0]['dir']:"ASC";

        // $records = $this->custom_model->getRowsSorted('employee',[],[], $order_column,$order_direction,$limit=$this->input->post('length'));

        // With Searching and ordering
        // $search_query = $this->input->post()['search']['value'];
        // $query = "SELECT *
        //           FROM `employee`";
        // if ($search_query != '') {
        //     $query .= " WHERE `first_name` LIKE '%$search_query%' OR `last_name` LIKE '%$search_query%'";
        // }
        // $query .= " ORDER BY `$order_column` $order_direction LIMIT {$length} OFFSET {$start}";


        // $records = $this->custom_model->customQuery($query,true);

        // ***** Selecting data with serching and ordering and limitation with ci3 methods. *****
        //-------------------
        
        $records = $this->employee_model->get_datatable($post_data);
        $data = array();
        foreach ($records as $record) {
            $sub_arr = [];
            $sub_arr['emp_no'] = $record->emp_no;
            $sub_arr['birth_date'] = $record->birth_date;
            $sub_arr['first_name'] = $record->first_name;
            $sub_arr['last_name'] = $record->last_name;
            $sub_arr['birth_date'] = $record->birth_date;
            $sub_arr['dept_name'] = $record->dept_name;
            $sub_arr['gender'] = $record->gender;
            $sub_arr['hire_date'] = $record->hire_date;
            $sub_arr['action'] = "<button class='btn btn-outline-success me-3' data-id='$record->emp_no'>Edit</button><button class='btn btn-outline-danger' data-id='$record->emp_no'>Delete</button>";
            $data[] = $sub_arr;
        }
        // print_r($data);
        $output = [
            'draw' => $this->input->post('draw'),
            'recordsFiltered' => $this->employee_model->count_filtered($post_data),
            'recordsTotal' => $this->employee_model->count_all(),
            'data' => $data
        ];

        echo json_encode($output);
    }
}