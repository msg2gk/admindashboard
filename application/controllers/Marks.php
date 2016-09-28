<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Marks extends CI_Controller {

    public function index() {
        $this->load->model('Marks_model');
        $this->Marks_model->_table_name = "students";
        $data['studentlist'] = $this->Marks_model->get_all_data();

        $this->load->view('admin/marks/add_marks', $data);
    }

    public function savemarks($studentid,$subject_id,$class_id) {
        $this->load->model('Marks_model');
        $data['marks_user_id']=$studentid;
        $data['marks_subject_id']=$subject_id;
        $data['marks_class_id']=$class_id;
        $data['marks_given_marks'] = $this->input->post('marks');
        $this->Marks_model->_table_name = "marks";
        $this->Marks_model->save($data);
        redirect('Marks');
    }
    
    public function getSubject(){
        $this->load->model('Marks_model');
        $studentid = $this->input->post('student_id');
        $this->Marks_model->_table_name = "students";
        $condition="students_id='$studentid'";
        $data['student_info']=$this->Marks_model->get_all_data($condition);
        
        $classid=$data['student_info']->students_class_id;
        $this->Marks_model->_table_name = "subjects";
        $condition2="subjects_class_id='$classid'";
        $data['subject_list']=$this->Marks_model->get_all_data_bulk($condition2);
        
        $this->load->view('admin/marks/add_marks_by_subject', $data);
//        print_r($data);
    }

}
