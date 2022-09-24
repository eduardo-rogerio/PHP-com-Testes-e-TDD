<?php

namespace Code;

use PHPUnit\Framework\TestCase;

class CarrinhoTest extends TestCase
{
    //Manipula varios produtos
    //Visualizar Produtos
    //Total de produtos | Total compra

    public function testClasseCarrinhoExiste()
    {
        $classe = class_exists('\\Code\\Carrinho');

        $this->assertTrue($classe);
    }
}