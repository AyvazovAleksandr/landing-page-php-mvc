<?php
namespace Routes;

/**
 * Class Route
 * @package Routes
 */
class Route extends Request
{

    /**
     * Своя реализация маршрутизации
     * работает с файлом маршрутов config/routes.php
     * @return array
     */
    public function run() {
        $request_uri = $this->request_uri;
        $method = $this->method;
        $routers = _ROUTERS_;
        //Проверяем на совпадение маршрута
        foreach ($request_uri as $key => $request) {
            if(is_array($routers)) {
                if(!empty($routers[$request])) {
                    $routers = $routers[$request];
                    if($request == end($request_uri)) {
                        $controller_function = explode('@',$routers);
                        if($controller_function === null) {
                            $results = array(
                                'code' => 404,
                                'status' => 'Not Found',
                                'method' => $method,
                                'request_params' => $this->request_params
                            );
                            break;
                        }
                        if(mb_strtolower($method) == ($controller_function[2])) {
                            //Когда совпадение найдено и метод совпадает, получаем Контроллер, функцию и параметры
                            $results = array(
                                'code' => 200,
                                'status' => 'OK',
                                'controller' => $controller_function[0],
                                'function' => $controller_function[1],
                                'method' => $method,
                                'request_params' => $this->request_params
                            );
                        } else {
                            $results = array(
                                'code' => 400,
                                'status' => 'Bad Request',
                                'controller' => $controller_function[0],
                                'function' => $controller_function[1],
                                'method' => $method,
                                'request_params' => $this->request_params
                            );
                        }
                        break;
                    }
                    continue;
                } else {
                    $results = array(
                        'code' => 404,
                        'status' => 'Not Found',
                        'method' => $method,
                        'request_params' => $this->request_params
                    );
                    break;
                }
            } else {
                $results = array(
                    'code' => 404,
                    'status' => 'Not Found',
                    'method' => $method,
                    'request_params' => $this->request_params
                );
                break;
            }

        }
        return $results;
    }
}