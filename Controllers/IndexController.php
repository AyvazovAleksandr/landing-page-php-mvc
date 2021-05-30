<?php
namespace Controllers;

use Http\Views;

/**
 * Class IndexController
 * @package Controllers
 */
class IndexController extends ControllerCore
{
    /**
     * Отображаем главную страницу
     */
    public function viewHome()
    {
       Views::show('home/home.php', ['name' => 'James']);
    }
}