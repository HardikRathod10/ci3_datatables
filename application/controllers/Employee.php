<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Employee extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('employee_model');
    }

    public function index()
    {
        $data['title'] = "Datatable";
        // $data['employees'] = $this->employee_model->get_employees();

        $this->load->view('datatable', $data);

    }

    public function fetch_employees()
    {
        // $fetched_data = $this->Employee->fetch_employees();

        $data = [
            'draw' => $this->input->post('draw'),
            'recordsTotal' => $this->employee_model->count_all(),
            'data' => $this->employee_model->get_employees()
        ];

        echo json_encode($data);
    }
}