<?php
/**
 * Plugin Name: Cadastro Clube Programação
 * Description: Plugin para cadastro e gerenciamento do Clube Programação
 * Version: 1.0
 * Author: Gustavo Favero, Bruno Furtado
 */

function inicializa_plugin_cps() {
	register_taxonomy(  
    'clube_categoria',  //The name of the taxonomy. Name should be in slug form (must not contain capital letters or spaces). 
    'clube-de-programacao',        //post type name
    array(  
      'hierarchical' => true,  
      'label' => 'Categoria Clube de Programação',  //Display name
      'query_var' => true,
      'rewrite' => array(
        'slug' => 'categoria-clube-programacao', // This controls the base slug that will display before each term
        'with_front' => false // Don't display the category base before 
      )
    )  
  );

  $args = array(
		'public' => true,
		"menu_position" => 5,
		"menu_icon" => "dashicons-lightbulb",
		"taxonomies" => array("clube_categoria"),
		"supports" => array( "title", "editor", "thumbnail" ),
		"has_archive"=> true,
		'labels'  => array(

      'name'               =>  'Clube Programação',
			'singular_name'      =>  'Clube Programação',
			'menu_name'          =>  'Clube Programação',
			'name_admin_bar'     =>  'Post do Clube Programação' ,
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

    register_post_type( 'clube-de-programacao', $args ); // aqui sempre singular
}

add_action( 'init', 'inicializa_plugin_cps' ); // gancho de inicialização -- inserindo nosso código no wordpress









