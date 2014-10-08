<?php
phpinfo();
function concurso($nome, $idade)
{
    if($idade < 18){
        throw new Exception($nome." voc� precisa ter mais 
        de 18 anos para participar do concurso.<br />");
    }
    
    echo ("Parab�ns ".$nome." voc� est� participando do concurso!<br />");
}

try{
    concurso('Vin�cios', 25);
    concurso('Vitor', 14);
    concurso('Wagner', 19);
} catch(Exception $erro) {
    echo '<pre>';
    var_dump($erro);
    echo 'Aten��o: '.$erro->getMessage();
}

?>