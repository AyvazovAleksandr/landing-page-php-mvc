<?php
namespace DB;

/**
 * Interface SqlBuilderInterface
 * @package DB
 */
interface SqlBuilderInterface
{
    /**
     * @param string $table
     * @param array $fields
     * @return SqlBuilderInterface
     */
    public function select(string $table, array $fields): SqlBuilderInterface;

    /**
     * @param string $table
     * @param array $fields
     * @return SqlBuilderInterface
     */
    public function insert(string $table, array $fields): SqlBuilderInterface;

    /**
     * @param string $table
     * @param array $fields
     * @return SqlBuilderInterface
     */
    public function update(string $table, array $fields): SqlBuilderInterface;

    /**
     * @param string $field
     * @param string $operator
     * @param string $value
     * @return SqlBuilderInterface
     */
    public function where(string $field, string $operator = '=', string $value): SqlBuilderInterface;

    /**
     * @param int $start
     * @param int $offset
     * @return SqlBuilderInterface
     */
    public function limit(int $start, int $offset): SqlBuilderInterface;

    /**
     * @return string
     */
    public function getSQL(): string;
}


/**
 * Class MysqlBuilder
 * @package DB
 */
class MysqlBuilder implements SqlBuilderInterface
{
    /**
     * @var
     */
    protected $query;

    /**
     *
     */
    protected function reset(): void
    {
        $this->query = new \stdClass();
    }


    /**
     * Базовый запрос SELECT
     * @param string $table
     * @param array $fields
     * @return SqlBuilderInterface
     */
    public function select(string $table, array $fields): SqlBuilderInterface
    {
        $this->reset();
        $this->query->base = "SELECT " . implode(", ", $fields) . " FROM " . $table;
        $this->query->type = 'select';
        return $this;
    }


    /**
     * Базовый запрос INSERT
     * @param string $table
     * @param array $values
     * @return SqlBuilderInterface
     */
    public function insert(string $table, array $values): SqlBuilderInterface {
        $this->reset();
        $columns = array_keys($values);
        $sql_values = "";
        foreach ($values as $value) {
            if($value == end($values)) {
                $sql_values .= "'$value'";
            } else {
                $sql_values .= "'$value',";
            }
        }
        $this->query->base = "INSERT INTO " . $table . "(" . implode(", ", $columns) . ") VALUES (" . $sql_values . ")";
        $this->query->type = 'insert';
        return $this;
    }


    /**
     * Базовый запрос UPDATE
     * @param string $table
     * @param array $fields
     * @return SqlBuilderInterface
     */
    public function update(string $table, array $fields): SqlBuilderInterface
    {
        $this->reset();
        $cal_fun_fields = function ($key, $value) {
            if ( (empty($key)) || (empty($value))  ) {
                throw new \Exception("Incorrect WHERE array");
            }
            return ("$key = '$value'");
        };
        $this->query->base = "UPDATE " . $table . " SET " . implode(", ", array_map($cal_fun_fields, array_keys($fields), array_values($fields)));
        $this->query->type = 'update';
        return $this;
    }


    /**
     * Базовый запрос DELETE
     * @param string $table
     * @return SqlBuilderInterface
     */
    public function delete(string $table): SqlBuilderInterface
    {
        $this->reset();
        $this->query->base = "DELETE " . $table;
        $this->query->type = 'delete';
        return $this;
    }


    /**
     * Устанавливаем WHERE для SQL запроса
     * @param string $field
     * @param string $operator
     * @param string $value
     * @return SqlBuilderInterface
     * @throws \Exception
     */
    public function where(string $field, string $operator = '=', string $value): SqlBuilderInterface
    {
        if (!in_array($this->query->type, ['select', 'update', 'delete'])) {
            throw new \Exception("WHERE can only be added to SELECT, UPDATE OR DELETE");
        }
        $this->query->where[] = "$field $operator '$value'";

        return $this;
    }


    /**
     * Устанавливаем LIMIT для SQL запроса
     * @param int $start
     * @param int $offset
     * @return SqlBuilderInterface
     * @throws \Exception
     */
    public function limit(int $start, int $offset): SqlBuilderInterface
    {
        if (!in_array($this->query->type, ['select'])) {
            throw new \Exception("LIMIT can only be added to SELECT");
        }
        $this->query->limit = " LIMIT " . $start . ", " . $offset;

        return $this;
    }


    /**
     * Получаем SQL запрос
     * @return string
     */
    public function getSQL(): string
    {
        $query = $this->query;
        $sql = $query->base;
        if (!empty($query->where)) {
            $sql .= " WHERE " . implode(' AND ', $query->where);
        }
        if (isset($query->limit)) {
            $sql .= $query->limit;
        }
        $sql .= ";";
        return $sql;
    }
}