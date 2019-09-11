<section id="about-us" class="about-us">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1 class="section-title">Grupos de Viagem</h1>
      </div>
    </div>
    <div class="row about-wrapper">
      <div class="col-md-12">
        <?php
          // query for the page
          $page_query = new WP_Query( 'pagename=grupos-intro' );
          // "loop" through query (even though it's just one page) 
          while ( $page_query->have_posts() ) : $page_query->the_post();
              the_content();
          endwhile;
          // reset post data (important!)
          wp_reset_postdata();
        ?>
      </div>
    </div>
  </div>
</section>