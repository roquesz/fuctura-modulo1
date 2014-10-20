<?php
	include_once("conexao.php");
?>
<html>
    <head>
    	<title>Meu primeiro Hello World</title>
        <link href="css.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript">
            function excluir(id)
            {
                if( confirm('Deseja remover o usuário?') ){
                    location.href='excluir.php?id='+id;
                }
            }
        </script>
    </head>
    <body>
        <ul>
            <li> <a href="listagem.php">Listagem</a> </li>
            <li> <a href="cadastro.php">Cadastrar usuário</a> </li>
        </ul>