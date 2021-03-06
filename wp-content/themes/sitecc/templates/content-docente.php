<div class = ''>
<div class="conteudo container-fluid ">
<?php if (!have_posts()) : ?>
  <div class="alert alert-block fade in">
    <a class="close" data-dismiss="alert">&times;</a>
    <p><?php _e('Sorry, no results were found.', 'roots'); ?></p>
  </div>
<?php endif; ?>

<?php if (have_posts()):?>
  <div class="docentes">
  <?php while (have_posts()) : the_post(); ?>

    <div class='docente clearfix'>
      <div class='docente_nome'>
        <h3><?php echo the_title( null, null, false ) ?></h3>
      </div>
      
      <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-5 col-lg-6 text-center">
          <div class = 'docente_imagem'>
          <?php
            $url = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) );
            if (!$url) {
              $url = "http://fakeimg.pl/200x200/eaeaea/eaeaea/";
            }

            echo "<div class=\"docente-imagem\" style=\"background-image: url({$url});\"></div>";

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
              echo "<p>Cargo: <strong>{$cargo}</strong></p>";
            }

            if ($email) {
              echo "<p>Email: <a href=\"mailto:{$email}\">{$email}</a></p>";
            }

            if ($site) {
              echo "<p>Site: <a href=\"$site\">{$site}</a></p>";
            }

            if ($lattes) {
              echo "<p><a href=\"$lattes\">Lattes</a></p>";
            }

            if ($especialidade) {
              echo "<p>Especialidade: <strong>{$especialidade}</strong></p>";
            }
            ?>
          </div>
        </div>

        <div class="col-xs-12 col-sm-6 col-md-7 col-lg-6">
          <div class = 'docente_resumo'>
          <?php

            echo "<p>".the_content() ." </p>";

          ?>
          </div>
        </div>
      </div>          
    </div>
  <?php endwhile; ?>
  </div>
  <div class="text-center imagem-carregando" style="display: none;">
    <img src="<?php echo get_site_url(); ?>/assets/img/loading.gif" alt="Carregando..." />
  </div>
<?php endif ?>
</div>
</div>
<?php if ($wp_query->max_num_pages > 1) : ?>
  <nav id="post-nav" class="hidden">
    <ul class="pager">
      <?php if (get_next_posts_link()) : ?>
        <li class="previous"><?php next_posts_link("Docentes anteriores"); ?></li>
      <?php else: ?>
        <li class="previous disabled"><a>Docentes Anteriores</a></li>
      <?php endif; ?>
      <?php if (get_previous_posts_link()) : ?>
        <li class="next"><?php previous_posts_link("Próximos Docentes"); ?></li>
      <?php else: ?>
        <li class="next disabled"><a>Próximos Docentes</a></li>
      <?php endif; ?>
    </ul>
  </nav>
<?php endif; ?>