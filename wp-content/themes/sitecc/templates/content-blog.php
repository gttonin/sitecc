<div class="conteudo blog row">
  <div class="posts  col-xs-12 col-sm-8 col-md-8 col-lg-9">
    <?php while (have_posts()) : the_post(); ?>
    <div class="post">
      <div class="post-title">
        <h3>
          <a href="<?php echo get_permalink($post->ID); ?>" title="<?php echo get_the_title() ?>">
            <?php the_title(); ?>
          </a>
        </h3>
      </div>
      <div class="post-resume">
        <?php the_excerpt(); ?> 
      </div>
      <div class="row">
        <span class="col-xs-12 col-sm-12 col-md-3 col-lg-3 data">
          <?php echo formata_data(get_the_date('U')); ?>
        </span>
        <span class="post-category col-xs-12 col-sm-12 col-md-3 col-lg-3">
          <?php the_category(); ?>
        </span>
        <span class="post-comments col-xs-12 col-sm-12 col-md-3 col-lg-3">
          <span class="contador-comentarios" data-url="<?php echo get_permalink($post->ID); ?>">0</span> comentários</a>
        </span>
        <div class="text-right col-xs-12 col-sm-12 col-md-3 col-lg-3">
          <a class="post-readmore" href="<?php echo get_permalink($post->ID); ?>" >Leia mais</a> 
        </div>
      </div>
    </div>  
    <?php endwhile; ?>
  </div>

  <?php include "blog_lateral.php"; ?>
</div>

<?php if ($wp_query->max_num_pages > 1) : ?>
  <nav id="post-nav" class="hidden">
    <ul class="pager">
      <?php if (get_next_posts_link()) : ?>
        <li class="previous"><?php next_posts_link("Posts anteriores"); ?></li>
      <?php else: ?>
        <li class="previous disabled"><a>Posts Anteriores</a></li>
      <?php endif; ?>
      <?php if (get_previous_posts_link()) : ?>
        <li class="next"><?php previous_posts_link("Próximos Posts"); ?></li>
      <?php else: ?>
        <li class="next disabled"><a>Próximos Posts</a></li>
      <?php endif; ?>
    </ul>
  </nav>
<?php endif; ?>