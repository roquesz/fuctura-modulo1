<?php
    define('SITE', 'http://www.facebook.com/');
?>
<html>
    <head>
    	<title>Meu primeiro Hello World</title>
        <link href="css.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <img src="img/foto.png" width="10" /><br />
        <?php
            echo 'Hello World';
        ?>
        <br />
        <?php
            $array = array(10, /*true, */"Meu Texto");
            /*
            var_dump($array);
            echo '<br />';
            */
            print_r($array); //Comentário
            //abaixo
            $_nome_1;
        ?>
        <br />
        
        <?php
            // include do arquivo inclusao.php
            include 'inclusao.php';
        ?>
        <div class="nome">
        <?php
            $nome = "Roque Junior";
            echo "Meu nome é " . $nome . " Novo texto " . 10;
            $nome = 10;
            echo '<br />'.$nome.'<br />';
            echo 10 + $nome;
        ?>
        </div>
        <br />
        asdasd
        asd
        asd
        a
        
        <div id="rodape">
        Este é o rodapé
        </div>
    </body>
</html>