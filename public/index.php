<?php
use Http\Views;

require_once '../vendor/autoload.php';

$request = new \Routes\Route;
$parameters = $request->run();

if($parameters['code'] == 200) {
    $controller = new $parameters['controller'];
    $function_name = $parameters['function'];
    $controller->$function_name($parameters['request_params']);
} elseif ($parameters['code'] == 404) {
    echo '404';
} elseif ($parameters['code'] == 400) {
    echo '400';
} else {
    echo '500';
}
