<?php

require(APPPATH . '/libraries/REST_Controller.php');

class Greetings extends REST_Controller {

    function index() {
        $this->response(array('name' => 'magi'));
    }

    function index_get() {
        if (!$this->get('q')) {
            $this->response(NULL, 400);
        }
		echo $this->get('q');
		
		
        
    }
}

