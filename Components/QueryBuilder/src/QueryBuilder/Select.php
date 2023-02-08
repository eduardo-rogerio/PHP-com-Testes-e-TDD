<?php

namespace Code\QueryBuilder;

class Select
{
    private $query;

    private $where;

    private $orderBy;

    private $limit;

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

    public function orderBy($field, $order)
    {
        $this->orderBy = ' ORDER BY ' . $field . ' ' . $order;

        return $this;
    }

    public function limit($skip, $take)
    {
        $this->limit = ' LIMIT ' . $skip . ', ' . $take;

        return $this;
    }

    public function getSql()
    {
        return $this->query . $this->where . $this->orderBy . $this->limit;
    }
}