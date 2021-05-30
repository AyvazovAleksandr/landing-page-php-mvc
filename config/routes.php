<?php
/**
 * Массив маршрутов
 */
define('_ROUTERS_',
    array(
        '' => '\Controllers\IndexController@viewHome@get',
        'comments' => array(
            'all' => '\Controllers\CommentsController@getAllComments@get',
            'add' => '\Controllers\CommentsController@addComment@post'
        )
    )
);