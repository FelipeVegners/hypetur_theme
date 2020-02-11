<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title('Blog | termo buscado:'); ?> - <?php bloginfo('name'); ?></title>

		<link href="//www.google-analytics.com" rel="dns-prefetch">
        <link href="<?php echo get_template_directory_uri(); ?>/images/icons/favicon.ico" rel="shortcut icon">
        <link href="<?php echo get_template_directory_uri(); ?>/images/icons/touch.png" rel="apple-touch-icon-precomposed">

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php bloginfo('description'); ?>">

		<?php wp_head(); ?>

	</head>

  <body <?php body_class(); ?>>

	<section class="blog">
		<div class="container-fluid blog__topbar">
			<a href="../" class="back-home">Voltar para o site</a>
		</div>
		<div class="container">
      <div class="row mb-4">
        <div class="col-md-12">
					<h1>Confira todos os pacotes que temos disponíveis</h1>
					<p>Lorem ipsum sit dolor emet</p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="all-travel-packages">
						<?php 
							// Get all the categories
							$categories = get_terms( 'destino' );
							// Loop through all the returned terms
							foreach ( $categories as $category ):
						?>
						<h2><?php echo $category->name; ?></h2>
						<p class="mb-3"><?php echo $category->description;?></p>
						<div class="travel-package-list">
							<?php
									
								$args = array(
									'post_type'	  => 'travel_package',
									'post_status' => 'publish',
									'nopaging' => true,
									'orderby' => 'meta_value_num',
									'order' => 'DESC',
									'tax_query' => array(
										array(
											'taxonomy'  => 'destino',
											'terms'     => array( $category->slug ),
											'field'     => 'slug'
										)
									)
								);
								$query = new WP_Query($args);
								$packages = $query->posts;
								foreach ($packages as $package) {
								$package_meta = get_post_meta($package->ID, '', true);
							?>
								<div class="card">
									<img class="card-img-top" src="<?php echo $package_meta['picture_url'][0] ?>" alt="<?php echo $package_meta['country'][0] ?>">
									<div class="destination-packages__country">
										<span class="destination-packages__country-tag"><?php echo $package_meta['country'][0] ?></span>
									</div>
									<div class="card-body d-flex flex-column justify-content-between">
									<div class="mb-2">
										<h3 class="mb-0"><?php echo $package_meta['package_title'][0] ?></h3>
										<small class="mb-2"><?php echo $package_meta['period'][0] ?></small>
									</div>
										<div class="destination-packages__description">
											<?php echo $package_meta['intro'][0] ?>
										</div>
										<br>
										<div>
											<small class="mb-2">A partir de:</small>
											<br>
											<small>Entrada:</small>
											<h3 class="mb-0">R$ <?php echo $package_meta['package_initial_ammount'][0] ?></h2>
											<small>Saldo em:</small>
											<h3><?php echo $package_meta['package_payment_parcels'][0] ?>x de: R$ <?php echo $package_meta['package_parcel_ammount'][0] ?></h3>
										</div>
										<a class="view-the-package" href="<?php echo ($category->slug.'/'.$package->post_name);?>" >Ver mais</a>
									</div>
								</div>
							<?php } ?>					
						</div>
						<?php
								// Reset things, for good measure
								$query = null;
								wp_reset_postdata();
						// end the loop
						endforeach;
						?>

					</div>

				</div>
			</div>
		</div>
	</section>

<?php get_footer(); ?>