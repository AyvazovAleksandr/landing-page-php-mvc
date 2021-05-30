<?php
namespace Controllers;

use \Models\Comment;

/**
 * Class CommentsController
 * @package Controllers
 */
class CommentsController extends ControllerCore
{


    /**
     * Выводим все комментарии из базы
     * @param array $parameters
     */
    public function getAllComments(array $parameters = array())
    {
        $comments = Comment::all();
        $response_array = array();
        $html = "";
        if ($comments) {
            foreach ($comments as $value) {
                $title = $value['title'];
                $email = $value['email'];
                $user_name = $value['user_name'];
                $comment = $value['comment'];
                $html .= "<li class=\"media\">
                            <img class=\"mr-3 avatar\" src=\"/img/avatar-default.png\" alt=\"Generic placeholder image\">
                            <div class=\"media-body\">
                                <h5 class=\"mt-0 mb-1\">$title</h5>
                                $comment
                                <p><span>$user_name</span> <span>$email</span></p>
                            </div>
                        </li>";
            }
            $response_array = array(
                "status" => "success",
                "html" => $html
            );
            echo parent::response($response_array, 200, JSON_UNESCAPED_UNICODE);
        } else {
            $response_array = array(
                "status" => "error"
            );
            echo parent::response($response_array, 500, JSON_UNESCAPED_UNICODE);
        }
    }


    /**
     * Добавляем новый комментарий
     * @param array $parameters
     */
    public function addComment(array $parameters = array())
    {

        $user_name = trim($parameters['user_name']);
        $email = trim($parameters['email']);
        $date_add = date("Y-m-d H:i:s");
        $title = trim($parameters['title']);
        $comment = trim($parameters['comment']);

        //Проводим валидацию данных
        if ((empty($user_name)) || (empty($email)) || (empty($title)) || (empty($comment)) || (filter_var($email, FILTER_VALIDATE_EMAIL) === false)) {
            $response_array = array(
                "status" => "error"
            );
            echo parent::response($response_array, 500, JSON_UNESCAPED_UNICODE);
            die;
        }

        $html = "<li class=\"media\">
            <img class=\"mr-3 avatar\" src=\"/img/avatar-default.png\" alt=\"Generic placeholder image\">
            <div class=\"media-body\">
                <h5 class=\"mt-0 mb-1\">$title</h5>
                $comment
                <p><span>$user_name</span> <span>$email</span></p>
            </div>
        </li>";
        $new_comment = array(
            "user_name" => $user_name,
            "email" => $email,
            "date_add" => $date_add,
            "title" => $title,
            "comment"  => $comment
        );

        $results = Comment::create($new_comment);
        if(is_array($results)) {
            //При успешном добавлении
            $response_array = array(
                "status" => "success",
                "html" => $html
            );
            echo parent::response($response_array, 200, JSON_UNESCAPED_UNICODE);
        } else {
            $response_array = array(
                "status" => "error"
            );
            echo parent::response($response_array, 500, JSON_UNESCAPED_UNICODE);
        }
    }
}