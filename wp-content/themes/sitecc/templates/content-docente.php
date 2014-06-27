<div class="conteudo container-fluid docentes">
<?php if (!have_posts()) : ?>
  <div class="alert alert-block fade in">
    <a class="close" data-dismiss="alert">&times;</a>
    <p><?php _e('Sorry, no results were found.', 'roots'); ?></p>
  </div>
<?php endif; ?>

<?php if (have_posts()):?>
  <div class="docentes">
  <?php while (have_posts()) : the_post(); ?>
    <p>sdgjs</p>
    <div class='docente clearfix'>
      
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