<?php require_once('header.php'); ?>

<div class="conteudo-pagina no-banner">
	
	<h3 class="titulo-pagina">Contato</h3>

	<form class="form-horizontal">
		<div class="control-group">
			<div class="control-label"><label for="nome">Seu nome:</label></div>
			<div class="controls"><input class="input-xlarge" type="text" id="nome" name="nome" /></div>
		</div>
		<div class="control-group">
			<div class="control-label"><label for="email">Seu e-mail:</label></div>
			<div class="controls"><input class="input-xlarge" type="email" id="email" name="email" /></div>
		</div>
		<div class="control-group">
			<div class="control-label"><label for="fone">Seu telefone:</label></div>
			<div class="controls"><input class="input-xlarge" type="text" id="fone" name="fone" /></div>
		</div>
		<div class="control-group">
			<div class="control-label"><label for="assunto">Assunto:</label></div>
			<div class="controls"><input class="input-xlarge" type="text" id="assunto" name="assunto" /></div>
		</div>
		<div class="control-group">
			<div class="control-label"><label for="mensagem">Sua Mensagem:</label></div>
			<div class="controls"><textarea class="input-xlarge" name="mensagem" id="mensagem" rows="8" cols="8"></textarea></div>
		</div>

		<div class="control-group">
			<div class="form-actions">
				<button action="submit" class="btn btn-primary">Enviar</button>
			</div>
		</div>
	</form>

	<div class="pgimoveis-secao">
		<h4 id="localizacao" class="header-secao">Localização</h4>
		<div class="row-fluid">
			<div class="span6">
				<adress>
					R. Teófilo Tavares, nº 55<br />
		            Jardins - Chapecó - SC <br />
	        	</adress>
			</div>
			<div class="span6">
				<p>E-mail: contato@lunardiimoveis.com.br</p>
				<p>Telefone: (xx) xxxx-xxxx</p>
			</div>
		</div>
		<div class="maps-localizacao-imovel">
			MAPS
		</div>
	</div>

</div>

<?php require_once('footer.php'); ?>