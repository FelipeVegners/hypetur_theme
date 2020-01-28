<?php
    // Meta Box creates Admin Custom Menu
    function create_post_type_promo_package() {
      $labels = array(
          'name'                => __('Pacotes Promocionais | Home Page', 'hype-tur'),
          'singular_name'       => __('Pacotes', 'hype-tur'),
          'add_new'             => __('Adicionar pacote', 'hype-tur'),
          'add_new_item'        => __('Adicionar pacote', 'hype-tur'),
          'edit_item'           => __('Editar Pacote', 'hype-tur'),
          'new_item'            => __('Novo Pacote', 'hype-tur'),
          'all_items'           => __('Todos os pacotes', 'hype-tur'),
          'view_item'           => __('Visualizar pacote', 'hype-tur'),
          'search_items'        => __('Buscar pacote', 'hype-tur'),
          'not_found'           => __('Nenhum pacote encontrado', 'hype-tur'),
          'not_found_in_trash'  => __('Nenhum pacote no lixo', 'hype-tur'),
          'menu_name'           => __('Pacotes Promocionais', 'hype-tur'),
      );
      $supports = array('title', 'thumbnail');
      $args = array(
          'labels'             => $labels,
          'public'             => true,
          'publicly_queryable' => true,
          'show_ui'            => true,
          'show_in_menu'       => true,
          'query_var'          => true,
          'rewrite'            => array('slug' => 'hype-tur'),
          'capability_type'    => 'post',
          'has_archive'        => false,
          'hierarchical'       => false,
          'menu_position'      => 1,
          'supports'           => $supports,
          'menu_icon'          => 'dashicons-tickets-alt',
      );
      register_post_type('promo-package', $args);
  }
  add_action('init', 'create_post_type_promo_package');

  // CREATES METABOX LOOP
  function create_metabox_promo_package($meta_boxes_promo_package) {
    $meta_boxes_promo_package[] = array(
        'title'      => __('Informações do Pacote Anunciado', 'hype-tur'),
        'post_types' => array('promo-package'),
        'fields'     => array(
            array(
                'id'   => 'place',
                'name' => __('Destino:', 'hype-tur'),
                'type' => 'text',
            ),
            array(
                'id'   => 'country',
                'name' => __('País do destino:', 'hype-tur'),
                'type' => 'text',
            ),
            array(
                'id'   => 'period',
                'name' => __('Período do Pacote:', 'hype-tur'),
                'type' => 'text',
            ),
            array(
                'id'    => 'intro',
                'name'  => __('Breve introdução do destino:', 'hype-tur'),
                'type'  => 'wysiwyg',
                'limit' => 256,
            ),
            array(
              'id'    => 'picture_url',
              'name'  => __('URL da Imagem do destino:', 'hype-tur'),
              'type'  => 'text'
            ),
            array(
              'id' => 'picture_path',
              'name' => __('Arquivo da Imagem do destino:', 'hype-tur'),
              'type' => 'image_advanced',
              'force_delete' => false,
              'max_file_uploads' => 1,
              'max_status' => false,
              'image_size' => 'thumbnail',
            ),
            array(
              'id' => 'external_url_option',
              'name' => __('Botão aponta para Link externo?', 'hype-tur'),
              'type' => 'radio',
              'options' => array(
                  'yes' => 'SIM',
                  'no' => 'NÃO',
                ),
              'inline' => true,
            ),
            array(
              'id' => 'external_url',
              'name' => __('URL externa para o botão:', 'hype-tur'),
              'type' => 'text',
              'hidden' => array('external_url_option', '=', 'no')
            ), 
            array(
              'id' => 'package_title',
              'name' => __('Título do Pacote Promocional:', 'hype-tur'),
              'type' => 'textarea'
            ),
            array(
              'id' => 'package_description',
              'name' => __('Descrição do Pacote Promocional:', 'hype-tur'),
              'type' => 'wysiwyg'
            ),
            array(
                'id' => 'package_includes',
                'name' => __('O pacote inclui:', 'hype-tur'),
                'type' => 'checkbox_list',
                'options' => array(
                    'aéreo' => 'Aéreo',
                    'hotel' => 'Hotel',
                    'terrestre' => 'Terrestre',
                    'marítimo' => 'Marítimo',
                  ),
                  'inline' => true,
              ),    
              array(
                'id' => 'package_include_description',
                'name' => __('Descrição do que está incluso:', 'hype-tur'),
                'type' => 'wysiwyg'
              ),
              array(
                'id' => 'package_initial_ammount',
                'name' => __('Valor de entrada do pacote:', 'hype-tur'),
                'type' => 'text'
              ),
              array(
                'id' => 'package_payment_parcels',
                'name' => __('Quantidade de parcelas:', 'hype-tur'),
                'type' => 'number'
              ),
              array(
                'id' => 'package_parcel_ammount',
                'name' => __('Valor das parcelas:', 'hype-tur'),
                'type' => 'text'
              ),
              array(
                'id' => 'package_price_disclaimer',
                'name' => __('Observação sobre o preço:', 'hype-tur'),
                'type' => 'wysiwyg'
              ),
              array(
                'id' => 'package_tab_inclusions',
                'name' => __('Aba inclusões:', 'hype-tur'),
                'type' => 'wysiwyg'
              ),
              array(
                'id' => 'package_tab_schedule',
                'name' => __('Aba Roteiro Diário:', 'hype-tur'),
                'type' => 'wysiwyg'
              ),
        )
    );

      return $meta_boxes_promo_package;
  }
    add_filter('rwmb_meta_boxes', 'create_metabox_promo_package');

///////////////////////////////////

  // Metabox for Travel Packages Admin Custom Menu
  function create_post_type_travel_package() {
    $labels = array(
        'name'                => __('Pacotes de Viagem', 'hype-tur'),
        'singular_name'       => __('Pacote de Viagem', 'hype-tur'),
        'add_new'             => __('Adicionar Pacote', 'hype-tur'),
        'add_new_item'        => __('Adicionar Pacote', 'hype-tur'),
        'edit_item'           => __('Editar Pacote', 'hype-tur'),
        'new_item'            => __('Novo Pacote', 'hype-tur'),
        'all_items'           => __('Todos os Pacotes', 'hype-tur'),
        'view_item'           => __('Visualizar Pacote', 'hype-tur'),
        'search_items'        => __('Buscar Pacote', 'hype-tur'),
        'not_found'           => __('Nenhum Pacote encontrado', 'hype-tur'),
        'not_found_in_trash'  => __('Nenhum Pacote no lixo', 'hype-tur'),
        'menu_name'           => __('Pacotes de Viagem', 'hype-tur'),
        'category'            => __('Categorias', 'hype-tur'),
    );

    $supports = array('title', 'thumbnail');
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'pacotes-de-viagem/%roteiro%'),
        'capability_type'    => 'post',
        'has_archive'        => 'pacotes-de-viagem',
        'hierarchical'       => false,
        'menu_position'      => 2,
        'supports'           => $supports,
        'menu_icon'           => 'dashicons-palmtree',
    );
    register_post_type('travel_package', $args);
}
add_action('init', 'create_post_type_travel_package');

function wpa_package_post_link( $post_link, $post ){
    if ( is_object( $post ) && 'travel_package' == get_post_type( $post ) ) {
        $terms = wp_get_object_terms( $post->ID, 'roteiro' );
        if( $terms ){
            return str_replace( '%roteiro%' , $terms[0]->slug , $post_link );
        }
    }
    return $post_link;  
}
add_filter( 'post_type_link', 'wpa_package_post_link', 1, 3 );

function getCategories() {
  $out = array();
  $categories = get_categories();
  foreach( $categories as $category ) {
      $out[$category->term_id] = array(
          'label' => $category->name,
          'value' => $category->term_id
      );
  }
  return $out;
}

function getTags() {
  $out = array();
  $tags = get_tags();
  foreach( $tags as $tag ) {
    $out[$tag->term_id] = array(
      'label' => $tag->name,
      'value' => $tag->term_id
    );
  }
  return $out;
}

// CREATES METABOX LOOP FOR TRAVEL PACKAGES
function create_metabox_travel_package($meta_boxes_travel_package) {
  $meta_boxes_travel_package[] = array(
      'title'      => __('Informações do Pacote'),
      'post_types' => array('travel_package'),
      'fields'     => array(
          array(
              'id'   => 'travel_package-group',
              'name' => __('Grupo do Pacote:'),
              'type' => 'select',
              'options' => getCategories()
          ),
      )
  );

    return $meta_boxes_travel_package;
}
  add_filter('rwmb_meta_boxes', 'create_metabox_travel_package');

///////////////////////////////////

  // Metabox for Testimonials Admin Custom Menu
  function create_post_type_testimonial() {
    $labels = array(
        'name'                => __('Depoimentos | Home Page', 'hype-tur'),
        'singular_name'       => __('Depoimento', 'hype-tur'),
        'add_new'             => __('Adicionar depoimento', 'hype-tur'),
        'add_new_item'        => __('Adicionar depoimento', 'hype-tur'),
        'edit_item'           => __('Editar Depoimento', 'hype-tur'),
        'new_item'            => __('Novo Depoimento', 'hype-tur'),
        'all_items'           => __('Todos os depoimentos', 'hype-tur'),
        'view_item'           => __('Visualizar depoimento', 'hype-tur'),
        'search_items'        => __('Buscar depoimento', 'hype-tur'),
        'not_found'           => __('Nenhum depoimento encontrado', 'hype-tur'),
        'not_found_in_trash'  => __('Nenhum depoimento no lixo', 'hype-tur'),
        'menu_name'           => __('Depoimentos de Clientes', 'hype-tur'),
    );

    $supports = array('title', 'thumbnail');
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'hype-tur'),
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => 3,
        'supports'           => $supports,
        'menu_icon'           => 'dashicons-thumbs-up',
    );
    register_post_type('testimonial', $args);
}
add_action('init', 'create_post_type_testimonial');

// CREATES METABOX LOOP FOR TESTMONIALS
function create_metabox_testimonial($meta_boxes_testimonial) {
  $meta_boxes_testimonial[] = array(
      'title'      => __('Depoimentos de Clientes', 'hype-tur'),
      'post_types' => array('testimonial'),
      'fields'     => array(
          array(
              'id'   => 'testimonial-name',
              'name' => __('Nome do cliente:', 'hype-tur'),
              'type' => 'text',
          ),
          array(
              'id'   => 'testimonial-age',
              'name' => __('Idade do cliente:', 'hype-tur'),
              'type' => 'text',
          ),
          array(
            'id'   => 'testimonial-occupation',
            'name' => __('Cargo do cliente:', 'hype-tur'),
            'type' => 'text',
        ),
          array(
              'id'   => 'testimonial-text',
              'name' => __('Depoimento do cliente:', 'hype-tur'),
              'type' => 'wysiwyg',
          ),
          array(
              'id'   => 'testimonial-picture',
              'name' => __('Foto do cliente:', 'hype-tur'),
              'type' => 'image_upload',
              'force_delete'     => false,
              'max_file_uploads' => 1,
              'max_status'       => 'false',
              'image_size'       => 'thumbnail',

          ),
          
      )
  );
    return $meta_boxes_testimonial;
}
  add_filter('rwmb_meta_boxes', 'create_metabox_testimonial');

///////////////////////////////////

?>