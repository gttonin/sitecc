<div class="conteudo container-fluid formandos">

<?php 

$anos = get_terms(array("ano_formacao"));

foreach ($anos as $ano) {
  $args = array(
    "post_type" => "formando",
    'tax_query' => array(
      array(
        "taxonomy" => "ano_formacao",
        "field" => "slug",
        "terms" => array($ano->slug)
      )
    )
  );

  $formandos = new WP_Query($args);

  echo "<h3>{$ano->name}</h3>";
  echo "<div class='slider-formandos'>";
  foreach ($formandos->posts as $formando) {
    $url = wp_get_attachment_url( get_post_thumbnail_id($formando->ID) );

    echo "<div class='formando' style='background-image: url(" . $url . ");'>";
    echo "<a class='nome-formando' href='" . get_permalink($formando->post_title) . "'>{$formando->post_title}</a>";
    echo "</div>";
  }
  echo "</div>";
}

?>

</div>