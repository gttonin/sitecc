<?php
/*
Template Name: Pรกgina Inicial
*/

$orders = array("data", 'preco', 'tipo', 'contrato');

$args = array(
  'post_type' => "imovel",
  
);

$query = new WP_Query($args);

?>

<?php if (!$query->have_posts()) : ?>
  <div class="alert alert-block fade in">
    <a class="close" data-dismiss="alert">&times;</a>
    <p><?php _e('Sorry, no results were found.', 'roots'); ?></p>
  </div>
<?php else: ?>
  <div class=''>
<?php endif; ?>

<?php dynamic_sidebar('busca-imovel'); ?>

<?php $count = 0; while ($query->have_posts()) : $query->the_post(); $custom = get_post_custom( get_the_ID() ); ?>
  <?php

  $codigo = get_post_meta( get_the_ID(), 'codigo',true );
  $contrato = get_post_meta( get_the_ID(), 'tipo_contrato',true );
  $valor_venda = get_post_meta( get_the_ID(), 'valor_venda',true );
  $valor_aluguel = get_post_meta( get_the_ID(), 'valor_aluguel',true );

  $destaque = get_post_meta( get_the_ID(), 'destaque',true );

  $suites = get_post_meta( get_the_ID(), 'numero_suites',true );
  $quartos = get_post_meta( get_the_ID(), 'numero_quartos',true );
  $cozinhas = get_post_meta( get_the_ID(), 'numero_cozinhas',true );
  $bwc_social = get_post_meta( get_the_ID(), 'numero_bwc_social',true );
  $salas = get_post_meta( get_the_ID(), 'numero_salas',true );
  $vagas = get_post_meta( get_the_ID(), 'numero_vaga_garagem',true );

  $tipo = get_post_meta( get_the_ID(), 'tipo',true );
  $area_util = get_post_meta( get_the_ID(), 'area_util',true );
  $ter_area_util = get_post_meta( get_the_ID(), 'ter_area_util',true );

  $class = strtolower($GLOBALS['tipos_imovel'][$tipo]);

  ?>
  <article id="post-<?php the_ID(); ?>" class='imovel-listagem <?php echo $class ?>'>
    <?php if ($destaque): ?>
    <div class='corner-ribbon-destaque'>
      <div class='ribbon-wrapper'>
        <div class='ribbon-content'>Destaque</div>
      </div>
    </div>
    <?php endif ?>
    <header class='clearfix'>

      <div class='list-thumbnail'>
        <a href="<?php the_permalink(); ?>" class='permalink'>
          <?php if (has_post_thumbnail()): ?>
            <?php echo get_the_post_thumbnail(get_the_ID(), 'imovel'); ?>
          <?php else: ?>
          <?php
            $meta = get_post_meta( get_the_ID(), 'dsi_imagens', true );
            if (!empty($meta )) {
              echo wp_get_attachment_image($meta[0], 'imovel');
            } else {
              echo "<img src='" . get_template_directory_uri() . "/assets/img/sem_foto.png' alt='Sem Foto' />";
            }
          ?>
          <?php endif ?>
        </a>

      </div>
    </header>
    <h5><a href="<?php the_permalink(); ?>" class="imovel-titulo"><?php the_title(); ?></a></h5>
    <div class="clearfix">
      <footer class='pull-left'>
        <?php if ($custom['tipo_contrato'][0] == 1): ?>
          <?php if (isset($custom['valor_aluguel']) && !empty($custom['valor_aluguel'][0])): ?>
            <p class='imovel-valor'><small>R$</small> <?php echo $custom['valor_aluguel'][0] ?></p>
          <?php endif ?>
        <?php elseif ($custom['tipo_contrato'][0] == 2): ?>
          <?php if (isset($custom['valor_venda']) && !empty($custom['valor_venda'][0])): ?>
            <p class='imovel-valor'> <?php echo $custom['valor_venda'][0] ?></p>
          <?php endif ?>
        <?php else: ?>
          <p class='clearfix'>
          <?php if (isset($custom['valor_aluguel']) && !empty($custom['valor_aluguel'][0])): ?>
          <p class='muted pull-left'><em>Aluguel: </em></p>
          <div class='imovel-valor pull-left' style='margin-left: 10px'><small>R$ </small> <?php echo $custom['valor_aluguel'][0] ?></div>
          <?php endif ?>
          </p>
          <p class='clearfix'>
          <?php if (isset($custom['valor_venda']) && !empty($custom['valor_venda'][0])): ?>
            <p class='muted pull-left'><em>Venda:</em></p>
            <div class='imovel-valor pull-left' style='margin-left: 10px'><small>R$</small> <?php echo $custom['valor_venda'][0] ?></div>
          <?php endif ?>
          </p>
        <?php endif ?>
      </footer>
      <div class="imovel-botoes pull-right">
        <a href="#" title="Compartilhar no Facebook"
          onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink()); ?>', 'facebook-share-dialog', 'width=626,height=436'); return false;">
          <img src="<?php echo get_template_directory_uri() ?>/assets/img/fb.png" />
        </a>
        <a class="bt-fav" href="#" value="<?php echo $codigo ?>"><img src="<?php echo get_template_directory_uri() ?>/assets/img/bt-like.png" /></a>

      </div>
    </div>
  </article>
<?php endwhile; ?>
</div>
<?php
wp_reset_postdata();
?>