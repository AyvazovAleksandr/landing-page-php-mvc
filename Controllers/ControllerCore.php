<?php
namespace Controllers;

use Http\Views;

/**
 * Class ControllerCore
 * @package Controllers
 */
class ControllerCore
{


    /**
     * Возвращаем json строку и устанавливаем статус ответа в заголовок
     * @param array $data
     * @param int $status
     * @param string $flags
     * @return false|string
     */
    protected function response(array  $data, $status = 500, $flags = "JSON_UNESCAPED_UNICODE") {
        header("HTTP/1.1 " . $status . " " . $this->requestStatus($status));
        return json_encode($data, $flags);
    }


    /**
     * Возвращаем статус по коду
     * @param string $code
     * @return mixed
     */
    private function requestStatus(string $code) {
        $status = array(
            200 => 'OK',
            404 => 'Not Found',
            405 => 'Method Not Allowed',
            500 => 'Internal Server Error',
        );
        return ($status[$code])?$status[$code]:$status[500];
    }
}