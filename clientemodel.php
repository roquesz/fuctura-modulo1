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
        $cliente = new Cliente('Nome 1', 'endere�o pra constar', 'email', 'senha'); 
        return $arr;
    }
    
}

?>