<section id="services" class="services">
  <div class="container">
    <h1 class="section-title">Pacotes de viagem</h1>
    <div class="col-md-12">
      <div class="row py-4 justify-content-between">
        <?php if (have_posts()): 
          $args = array(
              'post_type' => 'travel_package',
              // 'category_name'=> 'blogposts',
          );
          $loop = new WP_Query( $args );
          while ( $loop->have_posts() ) : $loop->the_post();
        ?>
        <div class="card" style="width: 20rem;">
          <img class="card-img-top" src="https://cdn.panrotas.com.br/portal-panrotas-statics/media-files-cache/252803/ef9aa137530cb829856cee10bf0fed05mickeymouse1988522960720/0,35,960,573/670,400,0.52/0/default.jpg" alt="Card image cap">
          <div class="card-body">
            <h5>
              <a class="blog__post__title" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
            </h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
          </div>
        </div>
        <?php endwhile; ?>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
      <button type="button" class="show-full-post">
        <a href="./blog">Ver todos os pacotes</a>
      </button>
      </div>
    </div>
</section>

<?php else: ?>

	<!-- article -->
	<article>
		<h2><?php _e( 'Desculpe, não há nehum conteúdo para exibir.', 'hypetur' ); ?></h2>
	</article>
	<!-- /article -->

<?php endif; ?>
