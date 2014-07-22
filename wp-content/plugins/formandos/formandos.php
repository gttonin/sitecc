<?php

/**
 * Plugin Name: Formandos
*/

function change_default_title( $title ){
 
    $screen = get_current_screen();
 
    if ( 'formando' == $screen->post_type ){
        $title = 'Digite o nome do formando';
    }
 
    return $title;
}

function mostra_html_formandos($post)
{
	$ano = get_post_meta( $post->ID, "formandos_ano", true );
		
	$anoinicio = 2014;
	
	$anoatual = date('Y');
	

	echo '

<table class="form-table">
	<tbody>
		<tr>
			Ano de formação:
			<hr /> ';
			for($i = $anoatual;$i>=$anoinicio;$i=$i-1){
				if($i==$ano){
					echo "<input id='ano_".$i."' type='radio' name='formandos_ano' value='".$i."'>".$i."</input><br />";
				}
				else{
					echo '<input id="ano_'.$i.'" type="radio" name="formandos_ano" value="'.$i.'" >'.$i.'</input><br />';
				}
			}
			echo '
		</tr>
	</tbody>
</table>
<script>
	document.getElementById("ano_'.$ano.'").checked=true;
</script>
';

}



function formandos_inicializa_metabox()
{
	// add_meta_box( "metabox_info_formandos", 
	// 			  "Informações adicionais",
	// 			  "mostra_html_formandos",
	// 			  "formando",
	// 			  "advanced",
	// 			  "high");
}


function formandos_salva_dados($post_id)
{
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return;
	}

	if (!current_user_can('edit_post' )) {
		return;
	}

	$dadosPossiveis = array(
		"formandos_ano",
	);

	foreach ($dadosPossiveis as $campo) {

		if ( !isset($_POST[$campo]) ) {
			continue;
		}

		$dado = esc_attr( $_POST[$campo] );

		update_post_meta( $post_id, $campo, $dado );
	}
}


function formandos_inicializa()
{
	register_taxonomy(  
    	'ano_formacao',
	    'formando',
	    array(  
	      'hierarchical' => true,  
	      'label' => 'Ano de Formação',
	      'query_var' => true,
	      "labels" => array(
	      	"name" => "Anos de Formação",
	      	"singular_name" => "Ano de Formação",
	      	"add_new_item" => "Adicionar ano de formação",
	      	"parent_item" => ""
	      )
	    )
  );

	register_post_type ( "formando", array(
		'labels' => array(

      		'name'               =>  'Formandos',
			'singular_name'      =>  'Formando',
			'menu_name'          =>  'Formandos',
			'name_admin_bar'     =>  'Formando' ,
			'add_new'            =>  'Adicionar novo' ,
			'add_new_item'       =>  'Adicionar novo Formando' ,
			'new_item'           =>  'Novo Formando' ,
			'edit_item'          =>  'Editar Formando',
			'view_item'          =>  'Ver Formando',
			'all_items'          =>  'Listagem de Formandos' ,
			'search_items'       =>  'Buscar Formandos',
			'parent_item_colon'  =>  'Formando pai:',
			'not_found'          =>  'Nenhum Formando encontrado.',
			'not_found_in_trash' =>  'Nenhum Formando encontrado na lixeira.',

      	),
		"public" => true,
		"exclude_from_search" => false,
		"publicly_queryable" => true,
		"show_ui" => true,
		"menu_position" => 5,
		"menu_icon" => "dashicons-admin-users",
		"supports" => array( "title", "editor", "thumbnail" ),
		"has_archive"=> true,
		"taxonomies" => array("ano_formacao"),
		"rewrite" => array(
			"slug" => "formandos"
		)
	));

	add_action( 'save_post', "formandos_salva_dados" );
	add_filter( 'enter_title_here', 'change_default_title' );
}

add_action("init", "formandos_inicializa");
