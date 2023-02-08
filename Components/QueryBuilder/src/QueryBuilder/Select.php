<?php

namespace Code\QueryBuilder;

class Select
{
    private $query;

    private $where;

    public function __construct($table)
    {
        $this->query = 'SELECT * FROM ' . $table;
    }

    public function where($field, $operator, $bind = null, $concat = 'AND')
    {
        $bind = is_null($bind) ? ':' . $field : $bind;

        if (! $this->where) {
            $this->where .= ' WHERE ' . $field . ' ' . $operator . ' ' . $bind;
        } else {
            $this->where .= ' ' . $concat . ' ' . $field . ' ' . $operator . ' ' . $bind;
        }

        return $this;
    }

    public function getSql()
    {
        return $this->query . $this->where;
    }
}