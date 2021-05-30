<?php

namespace Models;

use \DB\MysqlBuilder;
use \DB\DbPdoBuilder;

/**
 * Class Comment
 * @package Models
 */
class Comment
{
    /**
     * Название таблицы в БД
     */
    const TABLE_NAME = 'comments';
    /**
     * Название поля с уникальным индексов
     */
    const ID_FIELD_NAME = 'id';
    /**
     * Поля которые используются в Таблице
     */
    const FIELDS = ["id", "user_name", "email", "date_add", "title", "comment"];

    /**
     * Comment constructor.
     */
    public function __construct()
    {

    }


    /**
     * Получае все комментарии
     * @return array
     */
    public static function all()
    {
        $mysqlBuilder = new MysqlBuilder();
        $db = new DbPdoBuilder();
        $sql = $mysqlBuilder
            ->select(self::TABLE_NAME, self::FIELDS)
            ->getSQL();
        return $db->execute($sql)->toArray();
    }


    /**
     * Ищем комментарий по id
     * @param int $id
     * @return array
     */
    public static function find(int $id)
    {
        $mysqlBuilder = new MysqlBuilder();
        $db = new DbPdoBuilder();
        $sql = $mysqlBuilder
            ->select(self::TABLE_NAME, self::FIELDS)
            ->where("id", "=", $id)
            ->getSQL();
        return $db->execute($sql)->toArray();
    }


    /**
     * Добавить новый комментарий
     * @param array $values
     * @return array
     */
    public static function create(array $values)
    {
        $mysqlBuilder = new MysqlBuilder();
        $db = new DbPdoBuilder();
        $sql = $mysqlBuilder
            ->insert(self::TABLE_NAME, $values)
            ->getSQL();
        return $db->execute($sql)->toArray();
    }

}