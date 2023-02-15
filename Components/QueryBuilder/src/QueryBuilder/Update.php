<?php

namespace Code\QueryBuilder;

class Update
{
    public function __construct(string $table, array $fields = [], array $conditions = [], $logicOperator = ' AND ')
    {
        $this->sql = 'UPDATE ' . $table . ' SET ' . implode(', :', $fields) . ' WHERE ';

        $where = '';

        foreach ($conditions as $key => $c) {
            $where .= $where ? $logicOperator . $key . ' = ' . $c : $key . ' = ' . $c;
        }

        $this->sql .= $where;
    }

    public function getSql()
    {
        return $this->sql;
    }
}