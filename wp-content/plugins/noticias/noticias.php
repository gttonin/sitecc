<?php
/**
 * Plugin Name: Noticias
 * Description: Plugin para cadastro e gerenciamento das noticias do site
 * Version: 1.0
 * Author: Guilherme Bizzani, Gustavo Fávero, Mauricio André Cinelli, Silvana Trindade
 */

add_action("admin_enqueue_scripts","noticias_carrega_script");

function inicializa_plugin_noticias() {
  register_taxonomy(  
    'categorias_noticias',  //The name of the taxonomy. Name should be in slug form (must not contain capital letters or spaces). 
    'noticia',        //post type name
    array(  
      'hierarchical' => true,  
      'label' => 'Categorias',  //Display name
      'query_var' => true,
      'rewrite' => array(
        'slug' => 'categorias', // This controls the base slug that will display before each term
        'with_front' => false // Don't display the category base before 
      )
    )  
  );

  $args = array(
  	'public' => true,
  	"menu_position" => 5,
  	"taxonomies" => array("categorias_noticias"),
    'supports'=>array('title','editor','thumbnail'),
    'has_archive' => true,
  	'labels'  => array(
    	'name'               =>  'Notícias',
  		'singular_name'      =>  'Notícia',
  		'menu_name'          =>  'Notícias',
  		'name_admin_bar'     =>  'Notícia' ,
  		'add_new'            =>  'Adicionar nova' ,
  		'add_new_item'       =>  'Adicionar nova Notícia' ,
  		'new_item'           =>  'Nova Notícia' ,
  		'edit_item'          =>  'Editar Notícia',
  		'view_item'          =>  'Ver Notícia',
  		'all_items'          =>  'Listagem de Notícias' ,
  		'search_items'       =>  'Buscar Notícias',
  		'parent_item_colon'  =>  'Notícia pai:',
  		'not_found'          =>  'Nenhuma notícia encontrado.',
  		'not_found_in_trash' =>  'Nenhuma notícia encontrado na lixeira.',
    ),
    "rewrite" => array(
      "slug" => "noticias"
    )
  );

  register_post_type( 'noticia', $args ); // aqui sempre singular
    
}

// Add to the admin_init hook of your theme functions.php file
//add_meta_box('tagsdiv-post_tag', __('Page Tags'), 'post_tags_meta_box', 'page', 'side', 'low');

add_action( 'init', 'inicializa_plugin_noticias' ); // gancho de inicialização -- inserindo nosso código no wordpress




/**
 * Coloca scripts e estilos para serem carregados pelo Wordpress, como
 * uma fila.
 */
function noticias_carrega_script() {
	
	wp_enqueue_script( "noticias_scripts",plugins_url( "/js/scripts.js", __FILE__ ));
}








