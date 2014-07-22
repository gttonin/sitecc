<div class = 'formandos'>
<div class="conteudo container-fluid formandos">
<?php if (!have_posts()) : ?>
  <div class="alert alert-block fade in">
    <a class="close" data-dismiss="alert">&times;</a>
    <p><?php _e('Sorry, no results were found.', 'roots'); ?></p>
  </div>
<?php endif; ?>

<?php if (have_posts()):?>
  <div class="formando">
  <?php while (have_posts()) : the_post(); ?>

    <div class='formando clearfix'>
      <div class='formando_nome'>
        <h3><?php echo the_title( null, null, false ) ?></h3>
      </div>

      <div class = 'formando_imagem'>
      <?php
        /*Seto a class do thumbnail manualmente pelo $att, porque antes não estava fazendo diferenca.*/
        $att = array('class' => 'formando_imagem');

        echo get_the_post_thumbnail($page->ID, 'thumbnail',$att);
        ?>
        </div>
        <div class='formando_contato'>
        <?php
        $ano = get_post_meta( get_the_ID(), 'formandos_ano', true );
        
        if ($ano) {
          echo "<p>Ano: <strong>{$ano}</strong></p>";
        }

      ?>
      </div>
      </div>
    </div>
  <?php endwhile; ?>
  </div>
<?php endif ?>
</div>
</div>