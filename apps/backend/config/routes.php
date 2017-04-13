<?php
use \NoahBuscher\Macaw\Macaw;

// The main entrance to the file
$entrance = "backend.php";

// Controller namespace
$namespace = "Backend\Controller\\";

// All routes array
$routes = array(
	'' 		=> "DefaultController@index",
	'hello' => "DefaultController@hello"
);

// Parsing the routing 
foreach($routes as $key=>$val){
	if(empty($key)){
		Macaw::get($entrance.$key, $namespace.$val);
	}else{
		Macaw::get("{$entrance}/{$key}", $namespace.$val);
	}
}

Macaw::get('(:all)', function($fu) {
  echo "No match is found routing : <font color='red'>$fu</font>";
});

Macaw::dispatch();