<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require('Base_Controller.php');

class Update_quiz extends Base_Controller 
{
	//constructor
	function __construct() {
        parent::__construct();
        $this->load->model('Employee_model');
         $this->load->model('Base_model');
         if(! $this->isAdminLogin()) {
	        redirect ('admin/User');
	    }
    }
    
public function update_quiz()
    {
        $data = array();
        $id = $this->uri->segment(3);
        if($this->input->server('REQUEST_METHOD')=='POST')
        {
            $name = $this->input->post('quiz',true);
            $duration = $this->input->post('duration', true);
            $start_date = date('Y-m-d', strtotime($this->input->post('q_s_d', true)));
            $end_date = date('Y-m-d', strtotime($this->input->post('q_e_d', true)));
            $show_it = intval($this->input->post('show_quiz', true));
       if($this->Base_model->updateRecord('quiz_details', array('quiz_name'=> $name, 'quiz_duration'=> $duration, 'start_date'=> $start_date, 'end_date'=> $end_date, 'show_it'=> $show_it), array('quiz_id'=> $id)))
       {
           $data['error_msg'] = $this->config->item('success_quiz_update');
          
       }
       else
       {
           $data['error_msg'] = $this->config->item('error_quiz_update');
       }
        
        }
        
       $query = "select * from quiz_details where quiz_id = '$id'";
       $data['quiz'] = $this->Base_model->selectRecord($query);
       $this->load->view('admin/edit-quiz', $data);
    }
    
    public function update_question()
    {
        $data = array();
        $id = $this->uri->segment(3);
        if($this->input->server('REQUEST_METHOD')=='POST')
        {
            $question = $this->input->post('question',true);
            $option1 = $this->input->post('option_1', true);
            $option2 = $this->input->post('option_2', true);
            $option3 = $this->input->post('option_3', true);
            $option4 = $this->input->post('option_4', true);
            $answer = $this->input->post('answer', true);
         
            
       if($this->Base_model->updateRecord('quiz_questions', array('question'=> $question, 'option1'=> $option1, 'option2'=> $option2, 'option3'=> $option3, 'option4'=> $option4 , 'answer'=> $answer ), array('id'=> $id)))
       {
           $data['error_msg'] = $this->config->item('success_question_update');
          
       }
       else
       {
           $data['error_msg'] = $this->config->item('error_question_update');
       }
        
    }
        
       $query = "select * from quiz_questions where id = '$id'";
       $data['question'] = $this->Base_model->selectRecord($query);
       $this->load->view('admin/edit-quiz-question', $data);
    } 
    
}
