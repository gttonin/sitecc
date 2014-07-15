<div class="ativo">
<?php while (have_posts()) : the_post(); ?>
<?php the_content(); ?>
<?php wp_link_pages(array('before' => '<nav class="pagination">', 'after' => '</nav>')); ?>
<?php endwhile; ?>
</div>


<div class="sub-menu-page">
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
 
 
// Somewhere in your template
echo '<h3 class="tittle">';
echo empty( $post->post_parent ) ? get_the_title( $post->ID ) : get_the_title( $post->post_parent );
echo '</h3>';

echo '<ul>';
 
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
      $args = array(
        'parent' => 0
      );
    }
  }
  
  $args = array_merge($base_args, $args);
  
  $pages = get_pages($args);
  
  foreach ($pages as $page) {
 
    echo '<li><a href="' . get_permalink($page->ID) . '">' . $page->post_title . '</a></li>';
 
  }
 
echo '</ul>'; 
?>
</div>
