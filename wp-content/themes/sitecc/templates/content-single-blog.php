<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class(); ?>>
    <header>
      <h1 class="entry-title"><?php the_title(); ?></h1>
    </header>
    <div class="entry-content">
      <?php the_content(); ?>
    </div>
    <div class="nav-menu">
    <div class="nav-date">
      <h3>Posts Recentes</h3>
      <ul>
      </ul>
    </div>
    <div class="nav-category">
      <h3>Categorias</h3>
      <ul>
        <?php
        $categorias = get_terms(array("categorias_blog"));
        foreach ($categorias as $categoria) {
          echo "<li><a href='" . get_term_link($categoria) . "'> $categoria->name</a></li>";
        }
        ?>
      </ul>
    </div>
  </div>
    <footer>
      <?php wp_link_pages(array('before' => '<nav class="page-nav"><p>' . __('Pages:', 'roots'), 'after' => '</p></nav>')); ?>
      <?php the_tags('<ul class="entry-tags"><li>','</li><li>','</li></ul>'); ?>
    </footer>
  </article>
<?php endwhile; ?>
