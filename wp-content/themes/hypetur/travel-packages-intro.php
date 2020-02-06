<section id="packages-intro" class="packages-intro">
  <div class="container">
    <h1 class="section-title">Pacotes de viagem</h1>
    <div class="col-md-12">
      <div class="row py-4 justify-content-between">
        <?php 
          $args=array(
            'public'   => true,
            '_builtin' => false
          );
          $taxonomies= get_taxonomies($args); 
          if ($taxonomies) {
            foreach ($taxonomies  as $taxonomy) {
            $terms = get_terms([
              'taxonomy' => $taxonomy,
              'hide_empty' => false,
            ]);
            foreach ($terms as $term) {
        ?>
          <div class="card my-2 mb-4" style="width: 16rem;">
            <img class="card-img-top" src="https://cdn.panrotas.com.br/portal-panrotas-statics/media-files-cache/252803/ef9aa137530cb829856cee10bf0fed05mickeymouse1988522960720/0,35,960,573/670,400,0.52/0/default.jpg" alt="Card image cap">
            <div class="card-body d-flex flex-column justify-content-between">
              <h5>
                <a class="blog__post__title" href="/pacotes-de-viagem/<?php echo $term->slug ?>" title="<?php echo $term->name?>"><?php echo $term->name; ?></a>
              </h5>
              <p class="card-text"><?php echo $term->description; ?></p>
              <p class="card-text"><?php echo $term->taxonomy_image_url; ?></p>
              <a href="/pacotes-de-viagem/<?php echo $term->slug ?>" class="view-all-packages">Ver os pacotes</a>
            </div>
          </div>
        <?php 
            }
          }
        }  
        ?>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
    <button type="button" class="show-full-post">
      <a href="./pacotes-de-viagem">Ver todos os pacotes</a>
    </button>
    </div>
  </div>
</section>