
<!-- Get taxonomy images (needs Taxonomy Images plugin) -->
  <?php 
    $terms = apply_filters('taxonomy-images-get-terms', '', array(
      'taxonomy' => 'destino',
      'post_status' => 'publish',
    ));
    if (!empty($terms)) {
    ?>

    <section id="packages-intro" class="packages-intro">
      <div class="container">
        <h1 class="section-title">Destinos</h1>
        <div class="col-md-12">
          <div class="row py-4 d-flex justify-content-between">
            <?php
              foreach ((array) $terms as $term) {
            ?>
            <div class="card">
              <img class="card-img-top" src="<?php echo esc_url(wp_get_attachment_url( $term->image_id))?>" alt="<?php echo $term->name?>">
              <div class="card-body d-flex flex-column justify-content-between">
                <div class="mb-4">
                  <h5 class="mb-2 ">
                    <a class="blog__post__title" href="/pacotes-de-viagem/<?php echo $term->slug ?>" title="<?php echo $term->name?>"><?php echo $term->name; ?></a>
                  </h5>
                  <p class="card-text"><?php echo $term->description; ?></p>
                </div>
                <a href="/pacotes-de-viagem/<?php echo $term->slug ?>" class="view-all-packages">Ver os pacotes</a>
              </div>
            </div>
            <?php 
              }
            ?>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">
          <button type="button" class="show-full-post">
            <a href="./pacotes-de-viagem">Ver todos os destinos</a>
          </button>
          </div>
        </div>
      </div>
    </section>

    <?php
    } else {
    ?>
    <div></div>
    <?php
    }
    ?>