<?php
/**
 * Plugin Name: Cadastro Clube Programação
 * Description: Plugin para cadastro e gerenciamento do Clube Programação
 * Version: 1.0
 * Author: Gustavo Favero, Bruno Furtado
 */



function inicializa_plugin_cps() {
    $args = array(
		'public' => true,
		"menu_position" => 5,
		"menu_icon" => "dashicons-lightbulb",
		"taxonomies" => array("category"),
		"supports" => array( "title", "editor", "thumbnail" ),
		'labels'  => array(

      		'name'               =>  'Clube Programação',
			'singular_name'      =>  'Clube Programação',
			'menu_name'          =>  'Clube Programação',
			'name_admin_bar'     =>  'Clube Programação' ,
			'add_new'            =>  'Adicionar novo' ,
			'add_new_item'       =>  'Adicionar novo Post' ,
			'new_item'           =>  'Novo Post' ,
			'edit_item'          =>  'Editar Post',
			'view_item'          =>  'Ver Post',
			'all_items'          =>  'Listagem de Posts' ,
			'search_items'       =>  'Buscar Posts',
			'parent_item_colon'  =>  'Clube Programação pai:',
			'not_found'          =>  'Nenhum Post encontrado.',
			'not_found_in_trash' =>  'Nenhum Post encontrado na lixeira.',

      	)
    );

    register_post_type( 'cp', $args ); // aqui sempre singular
    
}

add_action( 'init', 'inicializa_plugin_cps' ); // gancho de inicialização -- inserindo nosso código no wordpress









