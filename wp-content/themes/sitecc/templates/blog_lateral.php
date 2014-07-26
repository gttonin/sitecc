<div class="nav-menu col-xs-12 col-sm-12 col-md-4 col-lg-3">
  <div class="nav-date">
    <h3>Posts Recentes</h3>
    <ul>
    <?php $postsRecentes = get_posts(array("post_type" => "blog")); ?>

    <?php if ($postsRecentes): ?>
      <?php foreach ($postsRecentes as $postRecente): 
        $active = false;

        if (is_singular("blog")) {
          $active = $wp_query->queried_object->ID == $postRecente->ID;
        }

      ?>
        <li class="<?php echo $active ? "active" : "" ?>">
          <a href="<?php echo get_permalink($postRecente->ID); ?>" title="<?php echo $postRecente->post_title ?>">
            <?php echo $postRecente->post_title ?>
          </a>
        </li>
      <?php endforeach ?>
    <?php endif ?>
    </ul>
  </div>
  <div class="nav-category">
    <h3>Categorias</h3>
    <ul>
      <?php
      $categorias = get_terms(array("categorias_blog"));
      foreach ($categorias as $categoria) {
        $active = false;
        if (is_tax()) {
          $active = $wp_query->queried_object->name == $categoria->name;
        }
        echo "<li class='" . ($active ? "active" : "") . "'><a href='" . get_term_link($categoria) . "'> $categoria->name</a></li>";
      }
      ?>
    </ul>
  </div>
</div>