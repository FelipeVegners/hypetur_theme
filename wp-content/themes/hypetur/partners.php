<section class="partners__section">
  <div class="container">
    <div class="row">
    <div class="col-md-12">
      <small class="mb-3">Uma agência parceira:</small>
    </div>
      <div class="partners__logos col-md-12">
        <?php
          // query for the page
          $page_query = new WP_Query( 'pagename=logo-parceiros' );
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