<?php

class Weather extends CI_Controller {

    function index() {
		//echo "xx";
		
        if (isset($_GET['q'])) {

            $data = array();
            $q = $_GET['q'];
			//get city name here
			//$city = 'Chittagong';
			
			$lastSpace = strrpos($q,"in");
            $lastSpace=$lastSpace+2;
            $city=substr($q,$lastSpace, strpos($q, '?'));
			$city = trim($city, "?");
			
			//the query for weather
			
//			echo $city;
			
			$query = json_decode(
				file_get_contents("http://api.openweathermap.org/data/2.5/weather?q=$city")
				);
/*
			foreach ($query as $key => $value) { 
				echo "$key <br>";
				//if($key == 'clouds')
					//
				//echo "yes";
				/*
				if(is_array($value))
				{
					foreach ($value as $k => $v) { 
						echo "$k | $v <br />"; 
					}
				}
				
			}

			print_r($query);
	*/					
			if(strpos($q,"temperature")==true)
			{
				//echo "temp found";
				foreach ($query as $key => $value) 
				{ 
					//echo "$key <br>";
					if($key == 'main')
					{
						
						foreach ($value as $k => $v) 
						{ 
							//echo "$k | $v k<br />"; 
							if($k == 'temp')
							{
								$data['answer'] = "$v K";
							//	echo "$k | $v k<br />"; 
							}
						}	
					}
				
				}
			}
				
			
			else if(strpos($q,"humidity")==true)
			{
				//echo "humidity found";
				foreach ($query as $key => $value) 
				{ 
					//echo "$key <br>";
					if($key == 'main')
					{
						foreach ($value as $k => $v) 
						{ 
							//echo "$k | $v k<br />"; 
							if($k == 'humidity')
							{
								$data['answer'] = "$v";
								//echo "$k | $v <br />"; 
							}
								
						}	
					}
				
				}
			}
			
			else if(strpos($q,"Rain")==true)
			{
				//print_r($query);
				$data['answer'] = 'No';
				foreach ($query as $key => $value) 
				{ 
					if($key == "rain")	
						$data['answer'] = 'Yes';
				}
			}
			
			else if(strpos($q,"Clouds")==true)
			{
				$data['answer'] = 'No';
				foreach ($query as $key => $value) 
				{ 
					if($key == "clouds")	
						$data['answer'] = 'Yes';
				}
			}
			
			else if(strpos($q,"Clear")==true)
			{
				$data['answer'] = 'No';
				foreach ($query as $key => $value) 
				{ 
					if($key == "clear")	
						$data['answer'] = 'Yes';
				}
			}
			
			else $data['answer'] = 'Invalid Question';
						        
            $result = json_encode($data);
            echo $result;
			
        } else {
            echo show_404();
        }
    }
	
}