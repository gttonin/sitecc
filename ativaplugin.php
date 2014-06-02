<?php

require_once('wp-load.php' ); //not sure if this line is needed

require_once(  'wp-admin/includes/plugin.php');
require_once(  'wp-admin/includes/theme.php');

$plugins = array("eventos","docentes","noticias","empregos","formandos","blog","cp");

foreach ($plugins as $plugin){
  $plugin_path = 'wp-content/plugins/{$plugin}/{$plugin}.php';
  activate_plugin($plugin_path);
}

/**
 * Ativação de tema automático
 *
 * TODO: deve ser descomentado quando a estrutura de template for colocada
 */

// $tema = "sitecc";
// switch_theme($tema, $tema);