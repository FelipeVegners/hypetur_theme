<div id="packages" class="promo-package" style="position:relative;">
  <?php
    $args = array(
    'post_type' => 'travel_package',
    'meta_key' => 'is_promo_package',
    'meta_value' => '1',
    'post_status' => 'publish',
    'nopaging' => true,
    'orderby' => 'meta_value_num',
    'order' => 'DESC'
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
        <?php
          if ($package_meta['external_url_option'][0] == 'yes'):
              echo "<a class='more-info-link' href='http://".$package_meta['external_url'][0]."' target='_blank'>Quero saber mais!</a>";
          else:
              echo "<button class='more-info-btn'>Quero saber mais!</button>";
          endif;
          ?>
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
            <div class="row package-includes">
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
              <div class="col-md-12 text-center text-md-left">
                <h2 class="mb-3">Valor do Pacote:</h2>
                <small>a partir de:</small>
                <h3 class="mb-0">Entrada:</h3>
                <h2 class="mb-3">R$ <?php echo $package_meta['package_initial_ammount'][0] ?></h2>
                <h3 class="mb-0">Saldo em:</h3>
                <h2><?php echo $package_meta['package_payment_parcels'][0] ?>x de: R$ <?php echo $package_meta['package_parcel_ammount'][0] ?></h2>
                <small><?php echo $package_meta['package_price_disclaimer'][0] ?></small>
                <a href="https://api.whatsapp.com/send?l=pt_br&phone=5511953845396&text=Olá,%20gostaria%20de%20saber%20mais%20sobre%20o%20pacote:%20<?php echo $package_meta['package_title'][0] ?>" target="blank" class="buy-package">Fazer reserva</a>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="package-more-info">
              <ul class="nav nav-tabs" id="package-more-details" role="tablist">
                <li class="nav-item">
                  <a class="more-info-tab active" id="includes" data-toggle="tab" href="#includes-<?php echo $package_meta['country'][0] ?>" role="tab" aria-controls="home" aria-selected="true">Inclusões</a>
                </li>
                <li class="nav-item">
                  <a class="more-info-tab" id="schedule" data-toggle="tab" href="#schedule-<?php echo $package_meta['country'][0] ?>" role="tab" aria-controls="profile" aria-selected="false">Roteiro Diário</a>
                </li>
              </ul>
              <div class="tab-content more-info-content">
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
      <div class="row">
      <div class="col-12 text-center">
        <button class="close-btn">Fechar</button>
      </div>
      </div>
    </section>
  </div>
<!-- END CAROUSEL -->
<?php
  }
?>
</div>