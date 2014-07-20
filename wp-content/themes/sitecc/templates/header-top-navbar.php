<?php 
if (is_front_page()):
  $args = array(
    'posts_per_page'   => 5,
    'offset'           => 0,
    'category'         => '',
    'orderby'          => 'post_date',
    'order'            => 'DESC',
    'include'          => '',
    'exclude'          => '',
    'meta_key'         => '',
    'meta_value'       => '',
    'post_type'        => 'noticia',
    'post_mime_type'   => '',
    'post_parent'      => '',
    'post_status'      => 'publish',
    'suppress_filters' => true ); 

  $posts_array = get_posts( $args );
  if ($posts_array): 
    $temPeloMenosUmaImagem = false;
    
    foreach ($posts_array as $post):
      if (has_post_thumbnail($post->ID )) { 
        $temPeloMenosUmaImagem = true; 
      }
    endforeach;
  endif;
endif;
?>

<div class="menu-padrao <?php echo is_front_page() && $temPeloMenosUmaImagem ? "desloca" : ""; ?>" id='menu'>
  <div class="">
    <nav class="navbar navbar-default" role="navigation">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo get_site_url(); ?>"><img src="/assets/img/logo_cc.png"></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
           <?php
              if (has_nav_menu('primary_navigation')) :
                wp_nav_menu(array('theme_location' => 'primary_navigation', 'menu_class' => 'nav navbar-nav'));
              endif;
            ?>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>

    <?php if (is_front_page() && $posts_array && $temPeloMenosUmaImagem): ?> 
    <div class="slider-wrapper theme-default">
      <div class="ribbon"></div>
      <div id="slider" class="nivoSlider">
        <?php foreach ($posts_array as $post): ?>
          <?php if (!has_post_thumbnail($post->ID )) { continue; } ?>
          <?php $src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ) , 'full');?>
          <img src="<?php echo $src[0]; ?>" alt="<?php echo $post->post_title; ?>" title="<?php echo $post->post_title; ?>" data-transition="slideInLeft">
        <?php endforeach ?>
      </div>
    </div>
    <?php endif ?>
  </div>
</div>