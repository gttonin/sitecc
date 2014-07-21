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
  </article>
<?php endwhile; ?>
