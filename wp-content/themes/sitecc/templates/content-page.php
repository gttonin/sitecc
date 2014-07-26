    <?php

    // Your functions.php content
     
    function has_children() {
      global $post;
      
      $pages = get_pages('child_of=' . $post->ID);
      
      return count($pages);
    }
     
    function is_top_level() {
      global $post, $wpdb;
      
      $current_page = $wpdb->get_var("SELECT post_parent FROM $wpdb->posts WHERE ID = " . $post->ID);
      
      return $current_page;
    }
     
      $base_args = array(
        'hierarchical' => 0
      );
     
      if (has_children()) {
        $args = array(
          'child_of' => $post->ID,
          'parent' => $post->ID
        );
      } else {
        if (is_top_level()) {
          $args = array(
            'child_of' => $post->post_parent,
            'parent' => $post->post_parent
          );
        } else {
          $args = false;
        }
      }
?>
<div class="page-static row">
  <div class="col-xs-12 col-sm-12 <?php echo $args ? "col-md-9 col-lg-9" : "col-md-12 col-lg-12" ?>">
    <div class="conteudo">
      <?php if (have_posts()) : ?>
      <?php the_post(); ?>
      
        <?php the_content(); ?>
      
      <?php $my_query = new WP_Query('category_name=portfolio'); ?>
        <?php while ($my_query->have_posts()) : $my_query->the_post(); ?>   
      <?php endwhile; ?>

      <?php else : ?>
        <h2>Nada Encontrado</h2>
      <?php endif; ?>
    </div>

    <?php include "anexos.php"; ?>
  </div>
<?php
if ($args) {
  echo '<div class="hidden-xs hidden-sm col-md-3 col-lg-3">
    <div class="sub-menu-page">';

    echo '<h3 class="tittle">';
    echo empty( $post->post_parent ) ? get_the_title( $post->ID ) : get_the_title( $post->post_parent );
    echo '</h3>';

    echo '<ul>';

  $args = array_merge($base_args, $args);
  
  $pages = get_pages($args);
  
  foreach ($pages as $page) {
    $active = $wp_query->queried_object->ID == $page->ID;

    echo '<li class="' . ($active ? "active" : "") . '"><a href="' . get_permalink($page->ID) . '">' . $page->post_title . '</a></li>';
 
  }
 
  echo '</ul></div></div>'; 
}
?>
</div>

