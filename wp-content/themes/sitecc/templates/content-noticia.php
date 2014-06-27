<div class="conteudo container-fluid pgempreendimentos">
<?php if (!have_posts()) : ?>
  <div class="alert alert-block fade in">
    <a class="close" data-dismiss="alert">&times;</a>
    <p><?php _e('Sorry, no results were found.', 'roots'); ?></p>
  </div>
<?php endif; ?>

<?php if (have_posts()):?>
  <div class="corretores">
  <?php while (have_posts()) : the_post(); ?>
    <p>sdgjs</p>
    <div class='corretor clearfix'>
      
      <h3><?php echo the_title( null, null, false ) ?></h3>

      <?php
        $telefone = get_post_meta( get_the_ID(), 'telefone', true );
        $email = get_post_meta( get_the_ID(), 'email', true );
        $creci = get_post_meta( get_the_ID(), 'creci', true );

        if ($creci) {
          echo "<p>CRECI: <strong>{$creci}</strong></p>";
        }

        if ($telefone) {
          echo "<p>Telefone: <strong>{$telefone}</strong></p>";
        }

        if ($email) {
          echo "<p>Email: <a href=\"mailto:{$email}\">{$email}</a></p>";
        }
      ?>
    </div>
  <?php endwhile; ?>
  </div>
<?php endif ?>
</div>

<?php if ($wp_query->max_num_pages > 1) : ?>
  <nav id="post-nav">
    <ul class="pager">
      <?php if (get_next_posts_link()) : ?>
        <li class="previous"><?php next_posts_link("Empreendimentos anteriores"); ?></li>
      <?php else: ?>
        <li class="previous disabled"><a>Empreendimentos Anteriores</a></li>
      <?php endif; ?>
      <?php if (get_previous_posts_link()) : ?>
        <li class="next"><?php previous_posts_link("Próximos Empreendimentos"); ?></li>
      <?php else: ?>
        <li class="next disabled"><a>Próximos Empreendimentos</a></li>
      <?php endif; ?>
    </ul>
  </nav>
<?php endif; ?>