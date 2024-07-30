<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Employee extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['employee_model','custom_model']);
    }

    public function index()
    {
        
        $data['title'] = "Datatable";
        $data['employees'] = $this->employee_model->get_employees();

        $this->load->view('datatable', $data);

    }

    public function fetch_employees()
    {
        // print_r($this->input->post());
        // exit;
        // $records = $this->employee_model->get_employees();
        // $data = array();
        
        // foreach ($records as $record) {
        //    array_push($data, $record);
        // }
        // print_r($data);
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

        $records = $this->custom_model->getRows('employee');
        
        foreach ($records as $record) {
            $sub_arr = [];
            $sub_arr['emp_no']=$record->emp_no;
            $sub_arr['birth_date']=$record->birth_date;
            $sub_arr['first_name']=$record->first_name;
            $sub_arr['last_name']=$record->last_name;
            $sub_arr['gender']=$record->gender;
            $sub_arr['hire_date']=$record->hire_date;
            $data[]=$sub_arr;
        }
        // print_r($data);
        $output = [
            'draw'=>$this->input->post('draw'),
            'recordsTotal'=>$this->custom_model->getTotalCount('employee'),
            'data'=>$data
        ];

        echo json_encode($output);
    }
}