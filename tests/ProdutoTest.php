<?php

namespace Code;

use PHPUnit\Framework\TestCase;

class ProdutoTest extends TestCase
{
    public function  testSeONomeDoProdutoESetadoCorretamente()
    {
        $produto = new Produto();
        $produto->setName('Produto 1');

        $this->assertEquals('Produto 1',$produto->getName(),'Não são iguais');
    }
    public function  testSeOPriceDoProdutoESetadoCorretamente()
    {
        $produto = new Produto();
        $produto->setPrice('19.99');

        $this->assertEquals('19.99',$produto->getPrice(),'Não são iguais');
    }
    public function  testSeOSlugDoProdutoESetadoCorretamente()
    {
        $produto = new Produto();
        $produto->setSlug('produto-1');

        $this->assertEquals('produto-1',$produto->getSlug(),'Não são iguais');
    }

}