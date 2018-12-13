<?php 

// function __autoload($class)
// {
// 	$class = strtolower($class);
// 	$path = "includes/{$class}.php";
// 	if (file_exists($path)) {
// 		require_once($path);
// 	}
// 	else{
// 		die("{$class}.php Dose not Exist :(");
// 	}
// }

function classAutoLoader($class){
	$class = strtolower($class);
	$path = "includes/{$class}.php";
	if (is_file($path) && !class_exists($class)) {
		include $path;
	}

}

spl_autoload_register('classAutoLoader');

function redirect($location)
{
	header("Location: {$location}");
}

?>