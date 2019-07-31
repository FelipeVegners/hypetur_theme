<section id="blog" class="blog-section">
  <div class="container">
    <h1 class="section-title pb-3">Blog Hype Tur</h1>
    <div class="row">
      <div class="col-md-12 pb-5">
        <?php
          // query for the page
          $page_query = new WP_Query( 'pagename=blog-intro' );
          // "loop" through query (even though it's just one page) 
          while ( $page_query->have_posts() ) : $page_query->the_post();
              the_content();
          endwhile;
          // reset post data (important!)
          wp_reset_postdata();
        ?>
      </div>
      <div class="col-md-7 last-post-column">
        <h5><em>Últimos Posts</em></h5>
        <hr>
        <?php
            query_posts('showposts=2');
            if(have_posts()):
              while(have_posts()): the_post(); 
        ?>
          <a href="<?php the_permalink(); ?>" class="post-title"><?php the_title(); ?></a>
          <span class="post-author">por <?php the_author();?> em <?php the_time("d/m/Y"); ?></span>
          <?php the_post_thumbnail(); ?>
          <?php the_excerpt(); ?>
          <button type="button" class="show-full-post">
            <a href="<?php the_permalink(); ?>">Continuar lendo</a>
          </button>
          <div class="h-divisor"></div>
          <?php endwhile;
            else:
              echo '<p>Nenhum post encontrado</p>';
            endif;
          ?>
      </div>
      <div class="col-md-5 most-liked-tags">
        <h5>Os termos mais mencionados em nosso blog</h5>
        <hr>
        <div class="row">
          <div class="col-md-12">
            <?php if ( function_exists( 'wp_tag_cloud' ) ) : ?>
              <ul class="tag-cloud">
              <li><?php wp_tag_cloud( 'smallest=14&largest=16&number=10&orderby=count' ); ?></li>
              </ul>
              <?php endif; ?>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
          <button type="button" class="show-full-post">
            <a href="./blog">Ver todos os posts</a>
          </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>