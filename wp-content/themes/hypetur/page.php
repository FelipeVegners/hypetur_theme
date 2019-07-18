<?php   get_header(); ?>

<div id="packages" class="promo-package" style="position:relative;">
  <?php
    $args = array(
    'post_type'	  => 'promo-package',
    'post_status' => 'publish',
    'nopaging' => true,
    'orderby' => 'meta_value_num',
    'order' => 'ASC'
    );
    $query = new WP_Query($args);
    $packages = $query->posts;
    foreach ($packages as $package) {
    $package_meta = get_post_meta($package->ID, '', true);
  ?>
  <div class="promo-package-wrapper">
    <section class="destination-section" style="background:url(<?php echo $package_meta['picture_url'][0] ?>) top center/cover no-repeat;">
      <div class="destination-detail">
        <h1><?php echo $package_meta['place'][0] ?></h1>
        <small><?php echo $package_meta['country'][0] ?></small>
        <p class="dest-period"><?php echo $package_meta['period'][0] ?></p>
        <p class="mb-0"><?php echo $package_meta['intro'][0] ?></p>
        <p><?php echo $package_meta['testmonial'][0] ?></p>
        <button class="more-info-btn">Quero saber mais!</button>
      </div>      
    </section>
    <section class="destination-about">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h1><?php echo $package_meta['package_title'][0] ?></h1>
            <p><?php echo $package_meta['package_description'][0] ?></p>
          </div>
        </div>
        <div class="row destination-price">
          <div class="col-md-6">
            <div class="row justify-content-center">
              <?php 
                $includes = $package_meta['package_includes'];
                foreach ( $includes as $include ) {
              ?>
              <div class="col-md-3 package-icon">
                <span class="icon-wrapper" data-icon="<?php echo $value; ?>">
                  <img class="icon -<?php echo $include; ?>" src="<?php echo get_template_directory_uri();?>/images/icons/<?php echo $include; ?>.svg"> -->
                </span>
                <p class="icon-label"><?php echo $include; ?></p>
              </div>
              <?php
                }
              ?>
            </div>
            <div class="row">
              <div class="col-md-12">
                <p><?php echo $package_meta['package_include_description'][0] ?></p>
              </div>
            </div>
          </div>
          <div class="col-md-5 inset-md-1 package-price">
            <div class="row">
              <div class="col-md-12">
                <h2>Valor do Pacote</h2>
                <p class="mb-0">Entrada de:</p>
                <h2>R$ <?php echo $package_meta['package_initial_ammount'][0] ?></h2>
                <p class="mb-0">Saldo em:</p>
                <h2><?php echo $package_meta['package_payment_parcels'][0] ?>x de: R$ <?php echo $package_meta['package_parcel_ammount'][0] ?></h2>
                <small><?php echo $package_meta['package_price_disclaimer'][0] ?></small>
                <button class="buy-package" data-toggle="modal" data-target="#exampleModal">Fazer reserva</button>
                <!-- Modal
                <div class="modal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        Fooooooo
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                      </div>
                    </div>
                  </div>
                </div> -->
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="package-more-info">
              <ul class="nav nav-tabs" id="package-more-details" role="tablist">
                <li class="nav-item">
                  <a class="more-info-tab active" id="includes" data-toggle="tab" href="#includes-<?php echo $package_meta['country'][0] ?>" role="tab" aria-controls="home" aria-selected="true">Inclusões</a>
                </li>
                <li class="nav-item">
                  <a class="more-info-tab" id="schedule" data-toggle="tab" href="#schedule-<?php echo $package_meta['country'][0] ?>" role="tab" aria-controls="profile" aria-selected="false">Roteiro Diário</a>
                </li>
              </ul>
              <div class="tab-content">
                <div class="tab-pane fade show active" id="includes-<?php echo $package_meta['country'][0] ?>" role="tabpanel" aria-labelledby="includes">
                  <?php echo $package_meta['package_tab_inclusions'][0] ?>
                </div>
                <div class="tab-pane fade" id="schedule-<?php echo $package_meta['country'][0] ?>" role="tabpanel" aria-labelledby="schedule">
                  <?php echo $package_meta['package_tab_schedule'][0] ?>
                </div>
              </div>
            </div>
          </div>
      </div>
    </section>
  </div>
<!-- END CAROUSEL -->
<?php
  }
?>
</div>


<!-- SERVICES -->
<section id="services" class="services">
  <div class="container">
    <h1 class="section-title">Serviços</h1>
    <div class="col-md-12">
      <div class="row align-items-center services-wrapper">
        <div class="col-md-3 text-center">
          <img src="<?php echo get_template_directory_uri();?>/images/icons/service-category-1.svg" alt="">
          <h3>A HypeTur atende clientes que desejam viajar a turismo ou negócios </h3>
        </div>
        <div class="col-md-4 offset-md-1">
          <div class="row align-items-center service-icon-wrapper">
            <div class="col-md-3 text-center">
              <img src="<?php echo get_template_directory_uri();?>/images/icons/service-ticket.svg" alt="">
            </div>
            <div class="col-md-9">
              <p>Passagens Aéreas</p>
            </div>
          </div>
          <div class="row align-items-center service-icon-wrapper">
            <div class="col-md-3 text-center">
              <img src="<?php echo get_template_directory_uri();?>/images/icons/service-train.svg" alt="">
            </div>
            <div class="col-md-9">
              <p>Bilhetes de Trens</p>
            </div>
          </div>
          <div class="row align-items-center service-icon-wrapper">
            <div class="col-md-3 text-center">
              <img src="<?php echo get_template_directory_uri();?>/images/icons/service-hotel.svg" alt="">
            </div>
            <div class="col-md-9">
              <p>Reservas de Hotéis</p>
            </div>
          </div>
          <div class="row align-items-center service-icon-wrapper">
            <div class="col-md-3 text-center">
              <img src="<?php echo get_template_directory_uri();?>/images/icons/service-resort.svg" alt="">
            </div>
            <div class="col-md-9">
              <p>Spa & Resorts</p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="row align-items-center service-icon-wrapper">
            <div class="col-md-3 text-center">
              <img src="<?php echo get_template_directory_uri();?>/images/icons/service-car.svg" alt="">
            </div>
            <div class="col-md-9">
              <p>Locação de Veículos</p>
            </div>
          </div>
          <div class="row align-items-center service-icon-wrapper">
            <div class="col-md-3 text-center">
              <img src="<?php echo get_template_directory_uri();?>/images/icons/service-boat.svg" alt="">
            </div>
            <div class="col-md-9">
              <p>Cruzeiros Marítimos e Fluviais</p>
            </div>
          </div>
          <div class="row align-items-center service-icon-wrapper">
            <div class="col-md-3 text-center">
              <img src="<?php echo get_template_directory_uri();?>/images/icons/service-park-ticket.svg" alt="">
            </div>
            <div class="col-md-9">
              <p>Parques, Shows e Atrações</p>
            </div>
          </div>
          <div class="row align-items-center service-icon-wrapper">
            <div class="col-md-3 text-center">
              <img src="<?php echo get_template_directory_uri();?>/images/icons/service-landmark.svg" alt="">
            </div>
            <div class="col-md-9">
              <p>Passeios Turísticos</p>
            </div>
          </div>
        </div>
      </div>
      <div class="row align-items-center services-wrapper">
        <div class="col-md-3 text-center">
          <img src="<?php echo get_template_directory_uri();?>/images/icons/service-category-2.svg" alt="">
          <h3>Pacotes Especiais para Datas Especiais</h3>
        </div>
        <div class="col-md-4 offset-md-1">
          <div class="row align-items-center service-icon-wrapper">
            <div class="col-md-3 text-center">
              <img src="<?php echo get_template_directory_uri();?>/images/icons/service-honeymoon.svg" alt="">
            </div>
            <div class="col-md-9">
              <p>Lua de Mel e Bodas</p>
            </div>
          </div>
          <div class="row align-items-center service-icon-wrapper">
            <div class="col-md-3 text-center">
              <img src="<?php echo get_template_directory_uri();?>/images/icons/service-wedding.svg" alt="">
            </div>
            <div class="col-md-9">
              <p>Destination Wedding</p>
            </div>
          </div>
          <div class="row align-items-center service-icon-wrapper">
            <div class="col-md-3 text-center">
              <img src="<?php echo get_template_directory_uri();?>/images/icons/service-wine.svg" alt="">
            </div>
            <div class="col-md-9">
              <p>Viagens Gastronômicas</p>
            </div>
          </div>
          <div class="row align-items-center service-icon-wrapper">
            <div class="col-md-3 text-center">
              <img src="<?php echo get_template_directory_uri();?>/images/icons/service-golf.svg" alt="">
            </div>
            <div class="col-md-9">
              <p>Golf</p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="row align-items-center service-icon-wrapper">
            <div class="col-md-3 text-center">
              <img src="<?php echo get_template_directory_uri();?>/images/icons/service-ski.svg" alt="">
            </div>
            <div class="col-md-9">
              <p>Ski & Snowboard</p>
            </div>
          </div>
          <div class="row align-items-center service-icon-wrapper">
            <div class="col-md-3 text-center">
              <img src="<?php echo get_template_directory_uri();?>/images/icons/service-sports.svg" alt="">
            </div>
            <div class="col-md-9">
              <p>Eventos Esportivos</p>
            </div>
          </div>
          <div class="row align-items-center service-icon-wrapper">
            <div class="col-md-3 text-center">
              <img src="<?php echo get_template_directory_uri();?>/images/icons/service-guide.svg" alt="">
            </div>
            <div class="col-md-9">
              <p>Viagens com Guias</p>
            </div>
          </div>
          <div class="row align-items-center service-icon-wrapper">
            <div class="col-md-3 text-center">
              <img src="<?php echo get_template_directory_uri();?>/images/icons/service-interchange.svg" alt="">
            </div>
            <div class="col-md-9">
              <p>Intercâmbio</p>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>
<!-- ABOUT US -->
<section id="about-us" class="about-us">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1 class="section-title">Quem Somos</h1>
      </div>
    </div>
    <div class="row about-wrapper">
      <div class="col-12">
        <?php
          // query for the page
          $page_query = new WP_Query( 'pagename=quem-somos' );
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
<!-- TESTMONIALS -->
<section class="testmonials">
  <div class="container">
    <div class="owl-carousel owl-theme single-testimonial">
      <?php
        $args = array(
        'post_type'	  => 'testimonial',
        'post_status' => 'publish',
        'nopaging' => true,
        'orderby' => 'meta_value_num',
        'order' => 'ASC'
        );
        $query = new WP_Query($args);
        $testimonials = $query->posts;
        foreach ($testimonials as $testimonial) {
        $testimonial_meta = get_post_meta($testimonial->ID, '', true);
        $testimonial_image_meta = get_post_meta($testimonial_meta['testimonial-picture'][0], '', true);

      ?>
      <div class="row">
        <div class="col-md-3 offset-md-1 text-right">
          <img class="testimonial-picture" src="<?php echo wp_upload_dir()['baseurl'].'/'.$testimonial_image_meta['_wp_attached_file'][0]; ?>" alt="">
          
        </div>
        <div class="col-md-5 inset-md-1">
          <h4 class="quotes-icon"></h4>
          <?php echo $testimonial_meta['testimonial-text'][0] ?>
          <h5><?php echo $testimonial_meta['testimonial-name'][0] ?>, <?php echo $testimonial_meta['testimonial-age'][0] ?> anos - <?php echo $testimonial_meta['testimonial-occupation'][0] ?></h5>
        </div>
      </div>
      <?php
        }
      ?>
    </div>
  </div>
</section>
<!-- BLOG SECTION -->
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
        <h5><em>Último Post</em></h5>
        <hr>
        <?php
            query_posts('showposts=1');
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
          <?php endwhile;
            else:
              echo '<p>Nenhum post encontrado</p>';
            endif;
          ?>
      </div>
      <div class="col-md-5 most-liked-tags">
        <h5>Os termos mais buscados em nosso blog</h5>
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
            <a href="/blog">Ver todos os posts</a>
          </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- CONTACT-US -->
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
        <form action="#">
          <div class="form-group my-4">
            <input type="text" class="form-control" placeholder="Seu nome">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Seu melhor e-mail">
          </div>
          <div class="form-row">
            <div class="form-group col-md-2">
              <input type="text" class="form-control" placeholder="DDD">
            </div>
            <div class="form-group col-md-4">
              <input type="text" class="form-control" placeholder="Telefone">
            </div>
            <div class="form-group col-md-6">
              <div class="form-check">
                <input type="checkbox" name="" id="msgMeWpp" class="form-check-input">
                <label for="msgMeWpp">Contacte-me pelo Whatsapp</label>
              </div>
            </div>
          </div>
          <div class="form-group">
            <textarea name="" id="" rows="4" class="form-control"></textarea>
          </div>
          <div class="form-check">
            <input type="checkbox" name="" id="emailMe" class="form-check-input">
            <label for="emailMe">Desejo receber novidades e promoções por e-mail</label>
          </div>
          <a href="#" class="mt-4 btn">Enviar mensagem</a>
        </form>
      </div>
      <div class="col-md-5 offset-md-1">
        <div class="row">
          <!-- <iframe width="100%" height="360" src="https://maps.google.com/maps?width=100%&amp;height=360&amp;hl=en&amp;q=Av.%20Nove%20de%20Julho%2C%203575%20-%20Anhangaba%C3%BA%20-%20Jundia%C3%AD%2C%20SP+(Hype%20Tur%20Viagens%20e%20Turismo)&amp;ie=UTF8&amp;t=&amp;z=17&amp;iwloc=B&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0">
          </iframe> -->
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
        <div class="row">
          <div class="col-md-12">
            <a href="#" class="mt-4 btn debit-form">Autorização de Débito</a>
            <small>*Faça o download e preencha corretamente os campos para autorizar o débito das despesas de sua viagem.</small>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
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

<?php get_footer(); ?>