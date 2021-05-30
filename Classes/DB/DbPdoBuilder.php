<?php
namespace DB;

/**
 * Interface DbPdoBuilderInterface
 * @package DB
 */
interface DbPdoBuilderInterface
{
    /**
     * @param string $sql
     * @return DbPdoBuilderInterface
     */
    public function execute(string $sql): DbPdoBuilderInterface;

    /**
     * @return array
     */
    public function toArray(): array;

    /**
     * @return string
     */
    public function toJson(): string;
}

/**
 * Class DbPdoBuilder
 * @package DB
 */
class DbPdoBuilder implements DbPdoBuilderInterface
{
    /**
     * @var
     */
    protected $db;

    /**
     * Подключение к БД
     */
    protected function reset(): void
    {
        $this->db = new \stdClass();
        $dsn = sprintf( 'mysql:dbname=%s;port=%s;host=%s', _DB_NAME_, _DB_PORT_, _DB_SERVER_);
        $opt = [
            \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
            \PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        $db = new \PDO($dsn, _DB_USER_, _DB_PASSWD_, $opt);
        $this->db->pdo = $db;
    }


    /**
     * Выполнить SQL запрос
     * @param string $sql
     * @return DbPdoBuilderInterface
     */
    public function execute(string $sql): DbPdoBuilderInterface
    {
        $this->reset();
        $db = $this->db->pdo;
        $this->db->execute = $db->query($sql);
        return $this;
    }


    /**
     * Получить ответ  в виде массива
     * @return array
     */
    public function toArray(): array
    {
        return $this->db->execute->fetchAll(\PDO::FETCH_ASSOC);
    }

    /**
     * Получить ответ  в виде json строки
     * @return string
     */
    public function toJson(): string
    {
        return json_encode($this->db->execute->fetchAll(\PDO::FETCH_ASSOC), JSON_UNESCAPED_UNICODE);
    }
}