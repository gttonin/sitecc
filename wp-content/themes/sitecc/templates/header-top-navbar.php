<div class="navbar visible-phone navbar-static-top">
  <div class="navbar-inner">
    <div class="container">

      <!-- .btn-navbar is used as the toggle for collapsed navbar content -->
      <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <a class="brand" href="#">Menu</a>

      <div class="nav-collapse collapse">
        <?php
          if (has_nav_menu('primary_navigation')) :
            wp_nav_menu(array('theme_location' => 'primary_navigation', 'menu_class' => 'nav pull-right'));
          endif;
        ?>
      </div>

    </div>
  </div>
</div>

<div class="container corpo">

  <div class="header">
    <a href="<?php echo get_site_url() ?>" title="Ciência da Computação - UFFS">
      <img class="logo" src="<?php echo get_template_directory_uri() ?>/assets/img/logo_uffs_branca_pequena.png" />
    </a>

    <?php
      if (has_nav_menu('primary_navigation')) :
        wp_nav_menu(array('theme_location' => 'primary_navigation', 'menu_class' => 'nav header-menu hidden-phone'));
      endif;
    ?>
  </div>