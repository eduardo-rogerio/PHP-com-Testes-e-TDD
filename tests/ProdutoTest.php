<?php

namespace Code;

use PHPUnit\Framework\TestCase;

class ProdutoTest extends TestCase
{
    private $produto;

    public function setUp():void
    {
        $this->produto = new Produto();
    }

    public function  testSeONomeDoProdutoESetadoCorretamente()
    {
        $produto = $this->produto;
        $produto->setName('Produto 1');

        $this->assertEquals('Produto 1',$produto->getName(),'Não são iguais');
    }
    public function  testSeOPriceDoProdutoESetadoCorretamente()
    {
        $produto = $this->produto;
        $produto->setPrice('19.99');

        $this->assertEquals('19.99',$produto->getPrice(),'Não são iguais');
    }
    public function  testSeOSlugDoProdutoESetadoCorretamente()
    {
        $produto = $this->produto;
        $produto->setSlug('produto-1');

        $this->assertEquals('produto-1',$produto->getSlug(),'Não são iguais');
    }

}