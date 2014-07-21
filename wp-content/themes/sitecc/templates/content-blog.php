<div class="conteudo blog">
  <div class="posts">
    <?php while (have_posts()) : the_post(); ?>
    <div class="post-unity">
      <div class="post-title">
        <h3><?php the_title() ?></h3>      
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
        <a class="post-readmore" href="<?php get_permalink(); ?>" >Leia mais</a> 
      </div>
    </div>  
    <?php endwhile; ?>
  </div>
  <div class="nav-menu">
    <div class="nav-date">

    </div>
    <div class="nav-category">
    <?php
      $args = array(
          'type'                     => 'post',
          'child_of'                 => 0,
          'parent'                   => '',
          'orderby'                  => 'name',
          'order'                    => 'ASC',
          'hide_empty'               => 1,
          'hierarchical'             => 1,
          'exclude'                  => '',
          'include'                  => '',
          'number'                   => '',
          'taxonomy'                 => 'category',
          'pad_counts'               => false 

        ); 
       $categories = get_categories( $args); 

       ?> 
      <?php dynamic_sidebar('menu-noticias' ); ?>
    </div>
  </div>
</div>
