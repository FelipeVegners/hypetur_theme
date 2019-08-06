<section id="contact" class="contact-section">
  <div class="container">
      <h1 class="section-title">Fale conosco</h1>
    <div class="row">
      <div class="col-md-6">
        <?php
          // query for the page
          $page_query = new WP_Query( 'pagename=fale-conosco' );
          // "loop" through query (even though it's just one page) 
          while ( $page_query->have_posts() ) : $page_query->the_post();
              the_content();
          endwhile;
          // reset post data (important!)
          wp_reset_postdata();
        ?>
      </div>
      <div class="col-md-5 offset-md-1">
        <div class="row">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3667.1087971786023!2d-46.893944585007375!3d-23.20270535433016!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94cf32ab9d105df5%3A0xf0d736a914cd4669!2sHype+Tur!5e0!3m2!1spt-BR!2sbr!4v1563415352504!5m2!1spt-BR!2sbr" width="100%" height="380" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
        <div class="row mt-4">
          <div class="col-md-4">
            <img src="<?php bloginfo('template_url');?>/images/brand/normal-brand.svg" alt="" width="100%">
          </div>
        </div>
        <div class="row mt-4">
          <div class="col-md-12 company-info">
            <p class="mb-0">A.O. PACHECO VIAGENS E TURISMO - EPP</p>
            <p class="mb-0">CNPJ 27.077.404/0001-30</p>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <p class="my-4">
              Av. Nove de Julho, 3575 - Sala 1711
              <br>
              Anhangabaú - Jundiaí / SP
              <br>
              CEP 13208-056
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>