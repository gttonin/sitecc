<div class = 'docentes'>
<div class="conteudo container-fluid docentes">
<?php if (!have_posts()) : ?>
  <div class="alert alert-block fade in">
    <a class="close" data-dismiss="alert">&times;</a>
    <p><?php _e('Sorry, no results were found.', 'roots'); ?></p>
  </div>
<?php endif; ?>

<?php if (have_posts()):?>
  <div class="docente">
  <?php while (have_posts()) : the_post(); ?>

    <div class='docente clearfix'>
      
      <h3><?php echo the_title( null, null, false ) ?></h3>


      <div class = 'docente_imagem'>
      <?php

        echo get_the_post_thumbnail($page->ID, 'thumbnail');

        $cargo = get_post_meta( get_the_ID(), 'docentes_cargo', true );
        $email = get_post_meta( get_the_ID(), 'docentes_email', true );
        $site = get_post_meta( get_the_ID(), 'docentes_website', true );
        $lattes = get_post_meta( get_the_ID(), 'docentes_lattes', true );
        $especialidade = get_post_meta( get_the_ID(), 'docentes_especialidade', true );
        ?>
        </div>
        <div class = 'docente_contato'>

        <?php
        if ($cargo) {
          echo "<p>cargo: <strong>{$cargo}</strong></p>";
        }

        if ($email) {
          echo "<p>Email: <a href=\"mailto:{$email}\">{$email}</a></p>";
        }

        if ($site) {
          echo "<p>Lattes: <a href=\"$site\">{$email}</a></p>";
        }

        if ($lattes) {
          echo "<p>Lattes: <a href=\"$lattes\">{$lattes}</a></p>";
        }

        if ($especialidade) {
          echo "<p>Especialidade: <strong>{$especialidade}</strong></p>";
        }
        ?>
          </div>

          <div class = 'docente_resumo'>
        <?php

        echo "<p>".the_excerpt() ." </p>";

      ?>
      </div>
    </div>
  <?php endwhile; ?>
  </div>
<?php endif ?>
</div>
</div>