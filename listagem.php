<?php
    include("topo.php");
    $sql = "SELECT * FROM usuarios";
    $dados = mysql_query($sql);
?>

    <table>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Login</th>
            <th>Email</th>
            <th>Ações</th>
        </tr>
        <?php
            while( $linha = mysql_fetch_assoc($dados) ){
        ?>
        <tr>
            <td><?php echo $linha['id'];?></td>
            <td><?php echo $linha['nome'];?></td>
            <td><?php echo $linha['login'];?></td>
            <td><?php echo $linha['email'];?></td>
            <td>
                <a href="editar.php?id=<?php echo $linha['id'];?>">Alterar</a>
                <a href="javascript:excluir(<?php echo $linha['id'];?>)">Excluir</a>
            </td>
        </tr>
        <?php
            }
        ?>

    </table>

<?php
    include("rodape.php");
?>
