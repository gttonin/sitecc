<?php
/*
Template Name: Resultado de Busca
*/

$term = esc_attr($_GET['termo']);
global $wp_query;

$wp_query = new WP_Query(array(
  "post_type" => array("noticia", "blog"),
  "post_status" => "publish",
  "s" => $term
));

?>

<h2>Resultados da busca por "<?php echo $term ?>"</h2>

<?php if ($wp_query->posts): ?>
	<div class="noticias">
  <?php foreach ($wp_query->posts as $resultado): setup_postdata($resultado); ?>
		<div class='noticia-listagem clearfix'>
      <header class="row">
        <?php if (has_post_thumbnail($resultado->ID)): ?>
        <div class="col-xs-12 col-sm-4 col-md-4  col-lg-4">
          <a class="" href="<?php  echo get_permalink($resultado->ID); ?>">
            <?php echo get_the_post_thumbnail($resultado->ID,"medium",array('class'=>'imagem-capa'));?>
          </a>
        </div>
        <div class="col-xs-12 col-sm-8 col-md-8  col-lg-8">
        <?php else: ?>
        <div class="col-xs-12 col-sm-12 col-md-12  col-lg-12">
        <?php endif ?>
          <h3 class="entry-title">
            <a class="" href="<?php  echo get_permalink($resultado->ID); ?>">
            <?php echo $resultado->post_title ?> 
            </a>
          </h3>
          <?php echo the_excerpt(); ?>
        </div>
      </header>
      <p>&nbsp;</p>
      <div class="clearfix">
          <p class="formato-data pull-left"><?php echo formata_data(get_the_date('U')); ?></p>
          <a class="pull-right ver-mais" href="<?php  echo get_permalink($resultado->ID); ?>">Continue lendo &rarr;</a>
      </div>
    </div>
  <?php endforeach ?>
  </div>
<?php else: ?>
  <h5 class="text-center">Nenhum resultado encontrado...</h5>
<?php endif ?>
<?php
wp_reset_postdata();
?>