<?php while (have_posts()) : the_post(); ?>
  <article class="formando-single">
    <header class="row">
      <?php if (has_post_thumbnail(get_the_ID() )): ?>
      <div class="col-xs-12 col-sm-4 col-md-4  col-lg-4">
        <?php
        $url = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) );

        echo "<div class='imagem-capa' style='background-image: url(" . $url . ");'></div>";
        ?>
      </div>
      <?php endif ?>
      <div class="col-xs-12 col-sm-8 col-md-8  col-lg-8">
        <h1 class="entry-title"><?php the_title(); ?></h1>
        <div class="entry-content">
          <?php the_content(); ?>
        </div>
      </div>
    </header>
  </article>
<?php endwhile; ?>
