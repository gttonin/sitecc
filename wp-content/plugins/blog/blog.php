<?php
/**
 * Plugin Name: Cadastro Blog
 * Description: Plugin para cadastro e gerenciamento do Blog
 * Version: 1.0
 * Author: Gustavo Favero, Bruno Furtado
 */



function inicializa_plugin_blogs() {
	register_taxonomy(  
    	'categorias_blog',  //The name of the taxonomy. Name should be in slug form (must not contain capital letters or spaces). 
	    'post',        //post type name
	    array(  
	      'hierarchical' => true,  
	      'label' => 'Blog',  //Display name
	      'query_var' => true,
	      'rewrite' => array(
	        'slug' => 'Blog', // This controls the base slug that will display before each term
	        'with_front' => false // Don't display the category base before 
	      )
	    )  
   );

    $args = array(
		'public' => true,
		"menu_position" => 5,
		"menu_icon" => "dashicons-welcome-widgets-menus",
		"taxonomies" => array("categorias_blog"),
		"supports" => array( "title", "editor", "thumbnail" ),
		"has_archive"=> true,
		'labels'  => array(

      		'name'               =>  'Blog',
			'singular_name'      =>  'Blog',
			'menu_name'          =>  'Blog',
			'name_admin_bar'     =>  'Blog' ,
			'add_new'            =>  'Adicionar novo' ,
			'add_new_item'       =>  'Adicionar novo Post' ,
			'new_item'           =>  'Novo Post' ,
			'edit_item'          =>  'Editar Post',
			'view_item'          =>  'Ver Post',
			'all_items'          =>  'Listagem de Posts' ,
			'search_items'       =>  'Buscar Posts',
			'parent_item_colon'  =>  'Blog pai:',
			'not_found'          =>  'Nenhum Post encontrado.',
			'not_found_in_trash' =>  'Nenhum Post encontrado na lixeira.',

      	)
    );

    register_post_type( 'blog', $args ); // aqui sempre singular
    
}

add_action( 'init', 'inicializa_plugin_blogs' ); // gancho de inicialização -- inserindo nosso código no wordpress
