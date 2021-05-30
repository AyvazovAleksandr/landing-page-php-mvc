<?php
namespace Routes;

/**
 * Class Request
 * @package Routes
 */
class Request
{
    /**
     * @var string
     */
    protected $method = ''; //Получаю метод GET|POST|PUT|DELETE
    /**
     * @var array
     */
    protected $request_uri = []; //Получаю массив GET параметров разделенных слешем
    /**
     * @var array
     */
    protected $request_params = []; //Получаю массив переменных HTTP-запроса

    /**
     * Request constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        header("Access-Control-Allow-Orgin: *");
        header("Access-Control-Allow-Methods: *");

        //Определяем есть ли параметры запроса
        if($_REQUEST) {
            $request_array = explode("?", $_SERVER['REQUEST_URI']);
            $this->request_uri =  explode('/', trim($request_array[0],'/'));
        } else {
            $this->request_uri = explode('/', trim($_SERVER['REQUEST_URI'],'/'));
        }
        $this->request_params = $_REQUEST;

        //Определение метода запроса
        $this->method = $_SERVER['REQUEST_METHOD'];
        if ($this->method == 'POST' && array_key_exists('HTTP_X_HTTP_METHOD', $_SERVER)) {
            if ($_SERVER['HTTP_X_HTTP_METHOD'] == 'DELETE') {
                $this->method = 'DELETE';
            } else if ($_SERVER['HTTP_X_HTTP_METHOD'] == 'PUT') {
                $this->method = 'PUT';
            } else {
                throw new \Exception("Unexpected Header");
            }
        }
    }
}