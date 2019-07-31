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
          <h5><?php echo $testimonial_meta['testimonial-name'][0] ?> - <?php echo $testimonial_meta['testimonial-occupation'][0] ?></h5>
        </div>
      </div>
      <?php
        }
      ?>
    </div>
  </div>
</section>