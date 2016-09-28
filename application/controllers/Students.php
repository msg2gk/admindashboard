<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Students extends CI_Controller {

    public function index() {
        $this->load->model('Students_model');
        $this->Students_model->_table_name = "class";
        $data['classlist'] = $this->Students_model->get_all_data();
        $this->load->view('admin/students/add_student', $data);
    }

    public function savestudent() {
        $this->load->model('Students_model');
        $data['students_name']=$this->input->post('student_name');
        $data['students_class_id']=$this->input->post('class_name');
        $this->Students_model->_table_name = "students";
        $this->Students_model->save($data);
        redirect('Students');
        
    }

}
