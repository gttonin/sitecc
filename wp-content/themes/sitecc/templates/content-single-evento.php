<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class(); ?>>
    <header class="row">
      <?php if (has_post_thumbnail(get_the_ID() )): ?>
      <div class="col-xs-12 col-sm-4 col-md-4  col-lg-4">
        <?php the_post_thumbnail("medium",array('class'=>'imagem-capa'));?>
      </div>
      <?php endif ?>
      <div class="col-xs-12 col-sm-8 col-md-8  col-lg-8">
        <h1 class="entry-title"><?php the_title(); ?></h1>
        <p class="formato-data"><?php echo formata_data(get_the_date()); ?></p>
      </div>
    </header>
    <div class="entry-content">
      <?php the_content(); ?>
    </div>
    <footer class="row">
      <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
        <h3>Localização</h3>
        <hr />
        <?php 
        $endereco = get_post_meta($post->ID, "endereco", true );
        $bairro = get_post_meta($post->ID, "bairro", true );
        $numero = get_post_meta($post->ID, "numero", true );
        $complemento = get_post_meta($post->ID, "complemento", true );
        $cidade = get_post_meta($post->ID, "cidade", true );
        $estado = get_post_meta($post->ID, "estado", true );
        $observacoes = get_post_meta($post->ID, "observacoes", true );
        ?>

        <?php if ($endereco): ?>
          <p><strong>Endereço: </strong> <?php echo $endereco ?></p>
        <?php endif ?>

        <?php if ($bairro): ?>
          <p><strong>Bairro: </strong> <?php echo $bairro ?></p>
        <?php endif ?>

        <?php if ($numero): ?>
          <p><strong>Número: </strong> <?php echo $numero ?></p>
        <?php endif ?>

        <?php if ($complemento): ?>
          <p><strong>Complemento: </strong> <?php echo $complemento ?></p>
        <?php endif ?>

        <?php if ($cidade): ?>
          <p><strong>Cidade: </strong> <?php echo $cidade ?></p>
        <?php endif ?>

        <?php if ($estado): ?>
          <p><strong>Estado: </strong> <?php echo $estado ?></p>
        <?php endif ?>
      </div>
      <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
        <h3>Observações</h3>
        <hr />

        <blockquote>
          <?php if ($observacoes): ?>
            <em class="text-muted"><?php echo $observacoes ?></em>
          <?php else: ?>
            <em class="text-muted">Nenhuma observação adicionada...</em>
          <?php endif ?>
        </blockquote>
      </div>
    </footer>
  </article>
<?php endwhile; ?>
