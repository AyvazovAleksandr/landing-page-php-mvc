<?php
namespace Http;

/**
 * Class Views
 * @package Http
 */
class Views
{

    /**
     * Подключаем файл шаблона
     * @param string $template
     * @param array $values
     */
    public static function show(string $template, array $values = array()) {
        $path = dirname(dirname(dirname(__FILE__))) .'/Views/' . $template;
        require_once ($path);
    }
}