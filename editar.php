<?php
	include("topo.php");
	$id = $_GET['id'];
	$sql = "SELECT * FROM usuarios WHERE id = $id";
	$dados = mysql_query($sql);
	$linha = mysql_fetch_assoc($dados);
?>

<form name="frm" method="post" action="alterar.php?id=<?php echo $id;?>">

	<label for="nome">Nome</label><br />
	<input type="text" id="nome" name="nome" value="<?php echo $linha['nome'];?>" maxlength="50" /><br /><br />

	<label for="login">Login</label><br />
	<input type="text" id="login" name="login" value="<?php echo $linha['login'];?>" maxlength="50" /><br /><br />

	<label for="email">Email</label><br />
	<input type="text" id="email" name="email" value="<?php echo $linha['email'];?>" maxlength="255" /><br /><br />

	<label for="senha">Senha</label><br />
	<input type="password" id="senha" name="senha" value="<?php echo $linha['senha'];?>" maxlenght="30" /><br /><br />

	<input type="submit" value="Alterar" />


</form>

<?php
	include("rodape.php");
?>