<?php get_template_part('templates/head'); ?>
<body <?php body_class(); ?>>

  <div class="wrap" role="document">
    <?php
      //do_action('get_header');
      if (current_theme_supports('bootstrap-top-navbar')) {
        get_template_part('templates/header-top-navbar');
      } else {
        get_template_part('templates/header');
      }
    ?>
    <div class="content container conteudo-pagina clearfix">
      <div class="main" role="main">
        <?php include roots_template_path(); ?>
      </div>
    </div>

    <?php get_template_part('templates/footer'); ?>

</body>
</html>
