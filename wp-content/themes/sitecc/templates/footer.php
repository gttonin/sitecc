<?php wp_footer(); ?>

<div class="rodape">
	<a href="#menu" id="voltar-topo"></a>
	<div class="row-fluid clearfix">
		<div class="logos col-xs-12 col-sm-5 col-md-5 col-lg-5">
			<a href="http://uffs.edu.br">
				<img src="/assets/img/uffs.png"  class="img-rodape" />
			</a>
			<a href="http://www.sbc.org.br/">
				<img src="/assets/img/logo_sbc.png" class="img-rodape" />
			</a>	
		</div>
		
		<div>
			<div class="redes-sociais col-xs-12 col-sm-3 col-md-3 col-lg-3">
				<h3>Envie-nos um email</h3>
				<a href="mailto:duarte@uffs.edu.br">duarte@uffs.edu.br</a>
				<h3>Redes sociais</h3>

				<a href="http://www.twitter.com">
					<img src="/assets/img/iconmonstr-twitter-5-icon-32.png" class="img-rede-sc">
				</a>
			
				<a href="http://www.facebook.com">
					<img src="/assets/img/iconmonstr-facebook-5-icon-32.png" class="img-rede-sc">
				</a>

				<a href="http://plus.google.com">
					<img src="/assets/img/iconmonstr-google-plus-5-icon-32.png" class="img-rede-sc">
				</a>
				
			</div>
		</div>

		<div>
			<div class="form-contato col-xs-12 col-sm-4 col-md-4 col-lg-4">
				<h3>Entre em contato conosco</h3>
				<?php echo do_shortcode( '[contact-form-7 id="12" title="Formulário de contato 1"]' ); ?>
			</div>
		</div>
	</div>
</div>
