<form method="POST">
	<h4>Recuperar Senha Adm</h4>
	<label>Insira o email cadastrado</label>
	<input type="email" name="email" class="form-control" required>
	<code>Insira o email cadastrado para receber um link para trocar a senha por email.</code><br><br><br>

	<input type="submit" value="Enviar dados para o email" class="btn btn-outline-success btn-lg btn-block">
	<input type="hidden" name="env" value="form">
	<br><br>
	<p> Módulo adaptado de Thiago Sales <a href="http://tutoriaiseinformatica.com/blog/">http://tutoriaiseinformatica.com/blog/</a></p>
</form>
<?php echo verifica_dados($con);?>