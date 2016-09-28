<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Classes extends CI_Controller {

	public function index()
	{
		$this->load->view('admin/class/add_class');
	}
        
        public function saveclass($id=NULL){
            $this->load->model('Classes_model');
            $data['class_name']=$this->input->post('classname');
            $this->Classes_model->_table_name="class";
            $this->Classes_model->save($data);
            redirect('Classes');
        }
}
