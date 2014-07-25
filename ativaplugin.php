<?php

$baseDir = $_SERVER['OPENSHIFT_REPO_DIR'];

require_once( $baseDir . 'wp-load.php' ); //not sure if this line is needed

require_once( $baseDir . 'wp-admin/includes/plugin.php');
require_once( $baseDir . 'wp-admin/includes/theme.php');

$plugins = array("eventos","docentes","noticias","oportunidades","formandos","blog","clube-de-programacao");

foreach ($plugins as $plugin){
  $plugin_path = $baseDir . "wp-content/plugins/{$plugin}/{$plugin}.php";
  activate_plugin($plugin_path);
}

/**
 * Ativação de tema automático
 */

$tema = "sitecc";
switch_theme($tema, $tema);