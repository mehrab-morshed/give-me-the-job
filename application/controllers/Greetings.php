<?php

//require(APPPATH . '/libraries/REST_Controller.php');

class Greetings extends CI_Controller {

    function index() {
		if(isset($_GET["q"])){
		
			//if (!$this->get('q')) {
		//		$this->response(NULL, 400);
		//	}
			echo $_GET["q"];
			$q = $_GET["q"];
			if(strpos($q,"Hi!")!==false || strpos($q,"Hello")!==false)
				$data['answer'] = "Hello, Kitty! Welcome to planet Earth!";
			else 
				$data['answer'] = "invalid question";
			
			$this->response($data);
    }
	else echo "please give a question";
}

