<?php

namespace CodeTests\QueryBuilder\Query;

use Code\QueryBuilder\Query\Select;

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

    public function testIfQueryIsGenerateWithOrderBy()
    {
        $query = $this->select->orderBy('name', 'DESC');

        $this->assertEquals(
            'SELECT * FROM products ORDER BY name DESC',
            $query->getSql()
        );
    }

    public function testIfQueryIsGeneratedWithLimit()
    {
        $query = $this->select->limit(0, 30);
        $this->assertEquals('SELECT * FROM products LIMIT 0, 30', $query->getSql());
    }

    public function testIfQueryIsGenerateWithJoinsConditions()
    {
        $query = $this->select->join('INNER JOIN', 'colors', 'colors.product_id', '=', 'products.id');

        $this->assertEquals(
            'SELECT * FROM products INNER JOIN colors ON colors.product_id = products.id', $query->getSql()
        );
    }

    public function testIfQueryWithSelectedFieldsIsGenerateWithSuccess()
    {
        $query = $this->select->select('name', 'price');

        $this->assertEquals('SELECT name, price FROM products', $query->getSql());
    }

    public function testIfSelectQueryIsGeneratedWithMoreJoinsClausele()
    {
        $sql = "SELECT name, price, created_at FROM products INNER JOIN colors ON colors.product_id = products.id AND colors.test_id = products.test_id LEFT JOIN categories ON categories.id = products.category_id WHERE id = :id";

        $query = $this->select->where('id', '=', ':id')
            ->join('INNER JOIN', 'colors', 'colors.product_id', '=', 'products.id')
            ->join('INNER JOIN', 'colors', 'colors.test_id', '=', 'products.test_id', 'AND')
            ->join('LEFT JOIN', 'categories', 'categories.id', '=', 'products.category_id')
            ->select('name', 'price', 'created_at');

        $this->assertEquals($sql, $query->getSql());
    }
}