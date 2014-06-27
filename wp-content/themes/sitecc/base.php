<?php get_template_part('templates/head'); ?>
<body <?php body_class(); ?>>

  <div class="wrap container" role="document">
    <?php
      do_action('get_header');
      if (current_theme_supports('bootstrap-top-navbar')) {
        get_template_part('templates/header-top-navbar');
      } else {
        get_template_part('templates/header');
      }
    ?>

    <?php if (is_front_page()): ?>
    <div class='banner-container hidden-phone'>
      <img class="banner-top underlay" src="<?php echo get_template_directory_uri() ?>/assets/img/banner-top.png" />

      <?php
        $banners = new WP_Query(array(
          "post_type" => "banner",
          "orderby"   => "rand",
          "post_status" => "publish"
        ));
      ?>

      <?php if ($banners->found_posts): ?>
        <div id="carousel-img-topo" class="carousel slide">
          <ol class="carousel-indicators">
            <?php for($i = 0; $i < $banners->found_posts; $i++): ?>
            <li data-target="#carousel-img-topo" data-slide-to="<?php echo $i ?>" <?php echo $i === 0 ? "class=\"active\"" : "" ?>></li>
            <?php endfor; ?>
          </ol>
          <!-- Carousel items -->
          <div class="carousel-inner">
            <?php for($i = 0; $i < $banners->found_posts; $i++): ?>
            <?php
              $id = get_post_meta($banners->posts[$i]->ID, "imagem_do_banner", true);
              if (!$id)
                continue;

              $attrs = wp_get_attachment_image_src($id, "banner");
              $link = get_post_meta($banners->posts[$i]->ID, "link", true);
            ?>
            <div class="<?php echo $i === 0 ? "active" : "" ?> item">
              <a href="<?php echo $link ? $link : "javascript:void(0)" ?>">
                <img src="<?php echo $attrs[0] ?>" alt="<?php echo $banners->posts[$i]->post_title ?>" />
              </a>
            </div>
            <?php endfor; ?>

          </div>
          <!-- Carousel nav -->
          <a class="carousel-control left" href="#carousel-img-topo" data-slide="prev">&lsaquo;</a>
          <a class="carousel-control right" href="#carousel-img-topo" data-slide="next">&rsaquo;</a>
        </div>
      <?php else: ?>
      <img class="banner" src="<?php echo get_site_url() ?>/assets/img/banner1.png" />
      <?php endif ?>

      <img class="banner-bottom underlay" src="<?php echo get_template_directory_uri() ?>/assets/img/banner-bottom.png" />
    </div>
    <?php else: ?>
      <img class="header-banner-top underlay span12" src="<?php echo get_site_url() ?>/assets/img/banner-top.png" />
    <?php endif ?>

    <div class="content conteudo-pagina <?php echo !is_front_page() ? "no-banner" : "home" ?> clearfix">
      <div class="main" role="main">

        <?php if (roots_display_search()): ?>
          <?php dynamic_sidebar("busca-area") ?>
        <?php endif ?>

        <?php include roots_template_path(); ?>
      </div>
    </div>

    <?php get_template_part('templates/footer'); ?>

</body>
</html>
