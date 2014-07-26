<div class="row">
<?php while (have_posts()) : the_post(); ?>
  <article class="col-xs-12 col-sm-12 col-md-8 col-lg-9">
    <header>
      <h1 class="entry-title"><?php the_title(); ?></h1>
    </header>
    <div class="entry-content">
      <?php the_content(); ?>
    </div>
    <div class="comentarios">
      <?php echo disqus_embed("sitedecinciadacomputaouffs"); ?>
    </div>
  </article>
<?php endwhile; ?>
  <?php include "blog_lateral.php" ?>
</div>