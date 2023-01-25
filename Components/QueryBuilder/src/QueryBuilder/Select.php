<?php

namespace Code\QueryBuilder;

class Select
{
    private $query;

    public function __construct($table)
    {
        $this->query = 'SELECT * FROM ' . $table;
    }

    public function where($field, $operator)
    {
        $this->query .= ' WHERE ' . $field . ' ' . $operator . ' :' . $field;

        return $this;
    }

    public function getSql()
    {
        return $this->query;
    }
}