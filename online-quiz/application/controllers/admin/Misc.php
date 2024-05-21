<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require('Base_Controller.php');

class Misc extends Base_Controller {
	//constructor
	function __construct() {
        parent::__construct();
        $this->load->model('Base_model');
		
        if(! $this->isAdminLogin()) {
	        redirect ('admin/User');
	    }
    }

	
	public function quizResult()
	{
	    $data = array();
	    $query = "select CONCAT(users.first_name,' ', users.last_name) as full_name, quiz_details.quiz_name, quiz_details.counter, count(quiz_answer.question_id) as question_id , sum(quiz_answer.is_correct)as is_correct from users inner join quiz_answer on quiz_answer.user_id=users.user_id inner join quiz_details on quiz_details.quiz_id=quiz_answer.quiz_id  group by users.user_id";
		
	    $data['res'] = $this->Base_model->selectRecord($query);
	    $this->load->view('admin/result', $data);
	}



}
