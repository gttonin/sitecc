<?php $attachments = new Attachments( 'anexos' ); /* pass the instance name */ ?>
<?php if( $attachments->exist() ) : ?>
<div class="anexos">
  <h3>Anexos</h3>
  <ul class="clearfix">
    <?php while( $attachments->get() ) : ?>
      <li class="anexo clearfix">
        <img src="<?php echo get_site_url() ?>/assets/img/file.png" alt="Anexo" />
        
        <div class="anexo-descricao">
          <p><?php echo $attachments->field( 'titulo' ); ?></p>
          <p><a href="<?php echo $attachments->url(); ?>" class="download" target="_blank">Baixar anexo</a></p>
        </div>
      </li>
    <?php endwhile; ?>
  </ul>
</div>
<?php endif; ?>