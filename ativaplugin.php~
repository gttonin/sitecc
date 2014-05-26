<?php

require_once('wp-load.php' ); //not sure if this line is needed

require_once(  'wp-admin/includes/plugin.php');
$plugins = array("eventos","docentes","noticias","empregos","formandos");
foreach ($plugins as $plugin){
  $plugin_path = 'wp-content/plugins/{$plugin}.php';
  activate_plugin($plugin_path);
}