<?php
/**
 * Plugin Name: Noticias
 * Description: Plugin para cadastro e gerenciamento das noticias do site
 * Version: 1.0
 * Author: Guilherme Bizzani, Gustavo Fávero, Mauricio André Cinelli, Silvana Trindade
 */

add_action("admin_enqueue_scripts","noticias_carrega_script");




function inicializa_plugin_noticias() {
    $args = array(
		'public' => true,
		"menu_position" => 5,
		"taxonomies" => array("category"),
		'labels'  => array(

      		'name'               =>  'Noticias',
			'singular_name'      =>  'Noticia',
			'menu_name'          =>  'Noticias',
			'name_admin_bar'     =>  'Noticia' ,
			'add_new'            =>  'Adicionar nova' ,
			'add_new_item'       =>  'Adicionar nova Noticia' ,
			'new_item'           =>  'Nova Noticia' ,
			'edit_item'          =>  'Editar Noticia',
			'view_item'          =>  'Ver Noticia',
			'all_items'          =>  'Listagem de Noticias' ,
			'search_items'       =>  'Buscar Noticias',
			'parent_item_colon'  =>  'Noticia pai:',
			'not_found'          =>  'Nenhuma noticia encontrado.',
			'not_found_in_trash' =>  'Nenhuma noticia encontrado na lixeira.',

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








