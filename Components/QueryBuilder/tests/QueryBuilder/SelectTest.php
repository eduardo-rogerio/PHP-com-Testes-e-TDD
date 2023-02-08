<?php

namespace CodeTests\QueryBuilder;

use Code\QueryBuilder\Select;

class SelectTest extends \PHPUnit\Framework\TestCase
{
    protected $select;

    protected function assertPreConditions(): void
    {
        $this->assertTrue(class_exists(Select::class));
    }

    protected function setUp(): void
    {
        $this->select = new Select('products');
    }

    public function testIfQueryBaseGenerateWithSuccess()
    {
        $query = $this->select->getSql('products');

        $this->assertEquals('SELECT * FROM products', $query);
    }

    public function testIfQueryIsGenerateWithWhereConditions()
    {
        $query = $this->select->where('name', '=', ':name');
        $this->assertEquals('SELECT * FROM products WHERE name = :name', $query->getSql());
    }

    public function testIfQueryAllowUsAddMoreConditionsInOurQueryWithWhere()
    {
        $query = $this->select->where('name', '=', ':name')
            ->where('price', '>=', ':price');
        $this->assertEquals('SELECT * FROM products WHERE name = :name AND price >= :price', $query->getSql());
    }
}