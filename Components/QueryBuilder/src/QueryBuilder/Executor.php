<?php

namespace Code\QueryBuilder;

class Executor
{
    private $connection;

    private $query;
    private array $params = [];

    public function __construct(\PDO $connection, $query = null)
    {
        $this->connection = $connection;
        $this->query = $query;
    }

    public function setQuery($query)
    {
        $this->query = $query;
    }

    public function setParam($bind, $value)
    {
        $this->params[] = ['bind' => $bind, 'value' => $value];

        return $this;
    }

    public function execute()
    {
        $proccess = $this->connection->prepare($this->query->getSql());

        return 1;
    }
}