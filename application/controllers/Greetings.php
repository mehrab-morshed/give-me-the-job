<?php

require(APPPATH . '/libraries/REST_Controller.php');

class Greetings extends REST_Controller {

    function index() {
        $this->response(array('name' => 'magi'));
    }

    function answer_get() {
        if (!$this->get('q')) {
            $this->response(NULL, 400);
        }
		echo $this->get('q');
		//$q = rawurldecode($q);
		//$this->response($q);
        //$this->db->where('employee_id', $this->get('id'));
		
        
    }
}

