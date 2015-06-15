<?php

class Qa extends CI_Controller {

    function index() {
        if (($_GET['q'])) {

            $data = array();
			$data['answer'] = 'Your majesty! Jon Snow knows nothing! So do I!';
            $q = $_GET['q'];
			$q = urlencode($q);
			$sparql = json_decode(
				file_get_contents("http://quepy.machinalis.com/engine/get_query?question=$q"),false
				);
			
			$dbquery = $sparql->queries[0]->query;
			
			if($dbquery!=null)
			{
				$target = $sparql->queries[0]->target;
				$target = trim($target,"?");
				
				$dbquery = urlencode($dbquery);
				
				$answer = json_decode(
					file_get_contents("http://dbpedia.org/sparql?query=$dbquery&format=json",false)
					);
					$xml = "xml:lang";
					if(sizeof($answer->results->bindings)!=0)
					{
						for($i=0;$i<sizeof($answer->results->bindings);$i++)
						{
							if($answer->results->bindings[$i]->$target->$xml=='en')
							{
								$data['answer'] = $answer->results->bindings[$i]->$target->value;
							}
						}
					}
				
			}
			$result = json_encode($data);
			echo $result;
				
        } else {
            echo show_404();
        }
    }

}