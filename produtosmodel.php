<?php
    include('produtos.php');
    class ProdutosModel{
        public function getProdutos()
        {
            // Int�ncia da class utilizando __set
            $produto1 = new Produtos();
            $produto1->id = 1;
            $produto1->nome = 'Produto 1';
            $produto1->descricao = 'Descricao do produto 1';
            $produto1->valor = 10;
            
            // Inst�ncia da classe utilizando o contrutor
            $produto2 = new Produtos(2, 
                                    'Produto 2', 
                                    'Descri��o do Produto 2',
                                    45.65);
            
            return array($produto1, $produto2);
            
        }
        
    }

?>