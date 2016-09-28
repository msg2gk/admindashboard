<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Subjects extends CI_Controller {

    public function index() {
        $this->load->model('Subjects_model');
        $this->Subjects_model->_table_name = "class";
        $data['classlist']=$this->Subjects_model->get_all_data();
        $this->load->view('admin/subjects/add_subject',$data);
    }

    public function savesubjects() {
        $this->load->model('Subjects_model');
        $data['subjects_class_id'] = $this->input->post('class_name');
        $data['subjects_name'] = $this->input->post('subject_name');
        $this->Subjects_model->_table_name = "subjects";
        $this->Subjects_model->save($data);
        redirect('Subjects');
    }

}
