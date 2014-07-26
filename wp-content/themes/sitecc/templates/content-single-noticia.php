<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class(); ?>>
    <header class="row">
      <?php if (has_post_thumbnail(get_the_ID() )): ?>
      <div class="col-xs-12 col-sm-4 col-md-4  col-lg-4">
        <?php the_post_thumbnail("medium",array('class'=>'imagem-capa'));?>
      </div>
      <?php endif ?>
      <div class="col-xs-12 col-sm-8 col-md-8  col-lg-8">
        <h1 class="entry-title"><?php the_title(); ?></h1>
        <p class="formato-data"><?php echo formata_data(get_the_date('U')); ?></p>
      </div>
    </header>
    <div class="entry-content">
      <?php the_content(); ?>
    </div>

    <div class="anexos">
    <?php $attachments = new Attachments( 'anexos' ); /* pass the instance name */ ?>
    <?php if( $attachments->exist() ) : ?>
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
    <?php endif; ?>
    </div>

    <div class="comentarios">
      <?php echo disqus_embed("sitedecinciadacomputaouffs"); ?>
    </div>
  </article>
<?php endwhile; ?>
