<?php

namespace Code\QueryBuilder;

use PHPUnit\Framework\TestCase;

class ExecutorTest extends TestCase
{
    private static $conn;

    private static $executor;

    public static function setUpBeforeClass(): void
    {
        self::$conn = new \PDO('sqlite::memory');
        self::$conn->exec("
            CREATE TABLE IF NOT EXISTS 'products' (
                'id' INTEGER PRIMARY KEY,
                'name' TEXT,  
                'price' FLOAT,  
                'created_at' TIMESTAMP,  
                'updated_at' TIMESTAMP,  
            );
        ");

        self::$executor = new Executor(self::$conn);
    }

    public static function tearDownAfterClass(): void
    {
        self::$conn->exec('DROP TABLE products');
    }
}