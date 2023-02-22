<?php

namespace Code\QueryBuilder;

class Executor
{
    private $connection;

    private $query;

    public function __construct(\PDO $connection, $query = null)
    {
        $this->connection = $connection;
        $this->query = $query;
    }
}