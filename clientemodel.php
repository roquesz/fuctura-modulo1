<?php
include("cliente.php");
class ClienteModel
{
    
    private $conn;
    public function __construct()
    {        
    }
    
    public function lista()
    {
        $cliente[] = new Cliente('Nome 1', 'endere�o 1', 'email', 'senha');
        $cliente[] = new Cliente('Nome 2', 'endere�o 2', 'email', 'senha');
        $cliente[] = new Cliente('Nome 3', 'endere�o 3', 'email', 'senha'); 
        return $cliente;
    }
    
}
?>