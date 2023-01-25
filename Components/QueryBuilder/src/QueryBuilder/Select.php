<?php

namespace Code\QueryBuilder;

class Select
{
    private $query;

    public function __construct($table)
    {
        $this->query = 'SELECT * FROM ' . $table;
    }

    public function getSql()
    {
        return $this->query;
    }
}