<div class="menu-padrao <?php echo is_front_page() ? "desloca" : ""; ?>">
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
          <a class="navbar-brand" href="#"><img src="/assets/img/logo_cc.png"></a>
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

    <?php if (is_front_page()): ?> 
    <div class="slider-wrapper theme-default">
      <div class="ribbon"></div>
      <div id="slider" class="nivoSlider">
        <img src="/assets/img/nemo.jpg" alt="" data-transition="slideInLeft" />
        <img src="/assets/img/toystory.jpg" alt="" title="This is an example of a caption" data-transition="slideInLeft"/>
        <img src="/assets/img/walle.jpg" alt="" data-transition="slideInLeft"/>
      </div>
      <div id="htmlcaption" class="nivo-html-caption">
        <strong>This</strong> is an example of a <em>HTML</em> caption with <a href="#">a link</a>.
      </div>
    </div>
    <?php endif ?>
  </div>
</div>