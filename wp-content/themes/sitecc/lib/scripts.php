<?php
/**
 * Enqueue scripts and stylesheets
 *
 * Enqueue stylesheets in the following order:
 * 1. /theme/assets/css/bootstrap.css
 * 2. /theme/assets/css/bootstrap-responsive.css
 * 3. /theme/assets/css/app.css
 * 4. /child-theme/style.css (if a child theme is activated)
 *
 * Enqueue scripts in the following order:
 * 1. jquery-1.9.1.min.js via Google CDN
 * 2. /theme/assets/js/vendor/modernizr-2.6.2.min.js
 * 3. /theme/assets/js/plugins.js (in footer)
 * 4. /theme/assets/js/main.js    (in footer)
 */
function roots_scripts() {
  wp_enqueue_style('roots_bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.css', false, null);
  wp_enqueue_style('nivo', get_template_directory_uri() . '/assets/css/nivo-slider.css', false, null);
  wp_enqueue_style('nivo-theme', get_template_directory_uri() . '/assets/css/themes/default.css', false, null);
  wp_enqueue_style('roots_app', get_template_directory_uri() . '/assets/css/app.css', false, null);
  wp_enqueue_style('sitecc_home', get_template_directory_uri() . '/assets/css/home.css', null, null);
  wp_enqueue_style('sitecc_noticia', get_template_directory_uri() . '/assets/css/noticia.css', null, null);
  wp_enqueue_style('sitecc_eventos', get_template_directory_uri() . '/assets/css/eventos.css', null, null);
  wp_enqueue_style('sitecc_formandos', get_template_directory_uri() . '/assets/css/formandos.css', null, null);
  wp_enqueue_style('content-page', get_template_directory_uri() . '/assets/css/pagestatic.css', null, null);
  wp_enqueue_style('sitecc_docentes', get_template_directory_uri() . '/assets/css/docentes.css', null, null);
   wp_enqueue_style('sitecc_empregos', get_template_directory_uri() . '/assets/css/empregos.css', null, null);
  wp_enqueue_style('sitecc_cp', get_template_directory_uri() . '/assets/css/cp.css', null, null);

  // Load style.css from child theme
  if (is_child_theme()) {
    wp_enqueue_style('roots_child', get_stylesheet_uri(), false, null);
  }

  // jQuery is loaded using the same method from HTML5 Boilerplate:
  // Grab Google CDN's latest jQuery with a protocol relative URL; fallback to local if offline
  // It's kept in the header instead of footer to avoid conflicts with plugins.
  if (!is_admin() && current_theme_supports('jquery-cdn')) {
    wp_deregister_script('jquery');
    wp_register_script('jquery', 'http://cdnjs.cloudflare.com/ajax/libs/jquery/1.9.1/jquery.min.js', false, null, false);
    add_filter('script_loader_src', 'roots_jquery_local_fallback', 10, 2);
  }

  if (is_single() && comments_open() && get_option('thread_comments')) {
    wp_enqueue_script('comment-reply');
  }
  
  wp_enqueue_script( "nivo-js",get_template_directory_uri() . '/assets/js/jquery.nivo.slider.pack.js', false, null, true);

  wp_register_script('modernizr', get_template_directory_uri() . '/assets/js/vendor/modernizr-2.6.2.min.js', false, null, false);
  wp_register_script('bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', false, null, true);
  wp_register_script('roots_main', get_template_directory_uri() . '/assets/js/main.js', false, null, true);
  wp_enqueue_script('jquery');
  wp_enqueue_script('modernizr');
  wp_enqueue_script('bootstrap');
  wp_enqueue_script('roots_main');

  
}
add_action('wp_enqueue_scripts', 'roots_scripts', 100);

// http://wordpress.stackexchange.com/a/12450
function roots_jquery_local_fallback($src, $handle) {
  static $add_jquery_fallback = false;

  if ($add_jquery_fallback) {
    echo '<script>window.jQuery || document.write(\'<script src="' . get_template_directory_uri() . '/assets/js/vendor/jquery-1.10.1.min.js"><\/script>\')</script>' . "\n";
    $add_jquery_fallback = false;
  }

  if ($handle === 'jquery') {
    $add_jquery_fallback = true;
  }

  return $src;
}
