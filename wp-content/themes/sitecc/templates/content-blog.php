<div class="conteudo blog">
  <div class="posts">
    <?php while (have_posts()) : the_post(); ?>
    <div class="post-unity">
      <div class="post-title">
        <h3><?php the_title(); ?></h3>      
      </div>
      <div class="post-resume">
        <?php the_excerpt(); ?> 
      </div>
      <div class="post-data">
        <span class="post-date">
        <?php  echo get_the_date(); ?>
        </span>
        <span class="post-category">
          <?php the_category(); ?>
        </span>
        <?php $comments_count = wp_count_comments();
          echo '<span class="post-coments">' . $comments_count->total_comments . " comentarios </span>";
        ?>
        <a class="post-readmore" href="<?php echo get_permalink($post->ID); ?>" >Leia mais</a> 
      </div>
    </div>  
    <?php endwhile; ?>
    <div class="pages-navegation">
      <span class="page-title-footer">Páginas</span>
      <?php pagination_funtion(); ?>
    </div>

  </div>
  <div class="nav-menu">
    <div class="nav-date">

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
</div>
