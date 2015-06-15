<?php

require(APPPATH . '/libraries/REST_Controller.php');

class Greetings extends REST_Controller {

    function index() {
        if (!$this->get('q')) {
            $this->response(NULL, 400);
        }
		echo $this->get('q');
		
		if(strpos($q,"Hi!")!=false || strpos($q,"Hello")!=false)
			$data['response'] = "Hello, Kitty! Welcome to planet Earth!"
		else 
			$data['response'] = "invalid question";
		
        $this->response($data);
    }
}

