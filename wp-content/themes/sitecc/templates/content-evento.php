<div class="conteudo row">
  <?php if (!have_posts()) : ?>
    <div class="alert alert-block fade in">
      <a class="close" data-dismiss="alert">&times;</a>
      <p><?php _e('Sorry, no results were found.', 'roots'); ?></p>
    </div>
  <?php endif; ?>

  <?php if (have_posts()):?>
    <div class="eventos">
    <?php while (have_posts()) : the_post(); ?>
      <div class='evento-listagem clearfix'>
        <header class="row">
          <?php if (has_post_thumbnail(get_the_ID())): ?>
          <div class="col-xs-12 col-sm-4 col-md-4  col-lg-4">
            <a class="" href="<?php  echo get_permalink(get_the_ID()); ?>">
              <?php the_post_thumbnail("medium",array('class'=>'imagem-capa'));?>
            </a>
          </div>
          <div class="col-xs-12 col-sm-8 col-md-8  col-lg-8">
          <?php else: ?>
          <div class="col-xs-12 col-sm-12 col-md-12  col-lg-12">
          <?php endif ?>
            <h3 class="entry-title">
              <a class="" href="<?php  echo get_permalink(get_the_ID()); ?>">
              <?php the_title(); ?> 
              </a>
            </h3>
            <div class="resumo">
              <?php the_excerpt(); ?>
            </div>
          </div>
        </header>
        <p>&nbsp;</p>
        <div class="clearfix">
            <p class="formato-data pull-left"><?php echo formata_data(get_the_date('U')); ?></p>
            <a class="pull-right ver-mais" href="<?php  echo get_permalink(get_the_ID()); ?>">Continue lendo &rarr;</a>
        </div>
      </div>
    <?php endwhile; ?>
    </div>
  <?php endif ?>

  <?php if ($wp_query->max_num_pages > 1) : ?>
    <nav id="post-nav">
      <ul class="pager">
        <?php if (get_next_posts_link()) : ?>
          <li class="previous"><?php next_posts_link("Notícias anteriores"); ?></li>
        <?php else: ?>
          <li class="previous disabled"><a>Notícias Anteriores</a></li>
        <?php endif; ?>
        <?php if (get_previous_posts_link()) : ?>
          <li class="next"><?php previous_posts_link("Próximas Notícias"); ?></li>
        <?php else: ?>
          <li class="next disabled"><a>Próximas Notícias</a></li>
        <?php endif; ?>
      </ul>
    </nav>
  <?php endif; ?>
</div>