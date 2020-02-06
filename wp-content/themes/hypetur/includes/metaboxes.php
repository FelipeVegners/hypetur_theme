<?php
    // Meta Box creates Admin Custom Menu
    function create_post_type_travel_package() {
      $labels = array(
          'name'                => __('Pacotes de Viagem'),
          'singular_name'       => __('Pacotes de Viagem'),
          'add_new'             => __('Adicionar pacote'),
          'add_new_item'        => __('Adicionar pacote'),
          'edit_item'           => __('Editar Pacote'),
          'new_item'            => __('Novo Pacote'),
          'all_items'           => __('Todos os pacotes'),
          'view_item'           => __('Visualizar pacote'),
          'search_items'        => __('Buscar pacote'),
          'not_found'           => __('Nenhum pacote encontrado'),
          'not_found_in_trash'  => __('Nenhum pacote no lixo'),
          'menu_name'           => __('Pacotes de Viagem'),
      );
      $supports = array('title', 'thumbnail');
      $args = array(
          'labels'             => $labels,
          'public'             => true,
          'publicly_queryable' => true,
          'show_ui'            => true,
          'show_in_menu'       => true,
          'query_var'          => true,
          'rewrite'            => array('slug' => 'pacotes-de-viagem/%destino%'),
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

    // CREATES METABOX FIELDS
    function create_metabox_travel_package($meta_boxes_travel_package) {
      $meta_boxes_travel_package[] = array(
        'title' =>  __('Informações do Pacote de Viagem'),
        'post_types'  =>  array('travel_package'),
        'fields'  =>  array(
          array(
            'id' => 'is_promo_package',
            'name' => __('Pacote Promocional (Destaque na Home Page)?'),
            'type' => 'switch',
            'style' => 'rounded',
            'on_label' => 'Sim',
            'off_label' => 'Não'
          ),
          array(
            'type' => 'divider',
          ),
          array(
            'id' => 'package_title',
            'name' => __('Título do Pacote:'),
            'placeholder' => 'ex.: Conheça Dubai com aéreo incluso',
            'type' => 'text',
            'size' => 60
          ),
          array(
            'name'  =>  'Destino',
            'placeholder' =>  'Selecione um destino',
            'id'  => 'destination',
            'type'  =>  'taxonomy',          
            // Taxonomy slug.
            'taxonomy'  =>  'destino',
            // How to show taxonomy.
            'field_type'  => 'select_advanced',
          ),
          array(
            'id'   => 'place',
            'name' => __('Cidade do Destino:'),
            'placeholder' => 'ex.: Dubai',
            'type' => 'text',
          ),
          array(
            'id'   => 'country',
            'name' => __('País do destino:'),
            'placeholder' => 'ex.: Emirados Árabes',
            'type' => 'text',
          ),
          array(
            'id'   => 'period',
            'name' => __('Período do Pacote:'),
            'placeholder' => 'ex.: 7 dias e 6 noites',
            'type' => 'text',
          ),
          array(
            'type' => 'divider',
          ),
          array(
            'id'    => 'intro',
            'name'  => __('Breve introdução do destino (Área Promocional):'),
            'type'  => 'wysiwyg',
            'limit' => 256,
            'options' => array(
              'textarea_rows' =>  6,
              'teeny' =>  true,
            ),
          ),
          array(
            'type' => 'divider',
          ),
          array(
            'id'    => 'picture_url',
            'name'  => __('Insira a URL da Imagem do destino:'),
            'placeholder' => 'ex.: https://q-cf.bstatic.com/images/hotel/max1024x768/228/228862348.jpg',
            'type'  => 'text',
            'size' => 90
          ),
          array(
            'id' => 'picture_path',
            'name' => __('Upload da Imagem do destino:'),
            'type' => 'image_advanced',
            'force_delete' => false,
            'max_file_uploads' => 1,
            'max_status' => false,
            'image_size' => 'thumbnail',
          ),
          array(
            'type' => 'divider',
          ),
          array(
            'id' => 'external_url_option',
            'name' => __('Botão aponta para Link externo?'),
            'type' => 'radio',
            'options' => array(
              'yes' => 'SIM',
              'no' => 'NÃO',
            ),
            'inline' => true,
          ),
          array(
            'id' => 'external_url',
            'name' => __('URL externa para o botão:'),
            'type' => 'text',
            'hidden' => array('external_url_option', '=', 'no')
          ),
          array(
            'type' => 'divider',
          ),
          array(
            'id' => 'package_description',
            'name' => __('Descrição do Pacote Promocional:'),
            'type' => 'wysiwyg',
            'options' => array(
              'textarea_rows' =>  6,
              'teeny' =>  true,
            ),
          ),
          array(
            'type' => 'divider',
          ),
          array(
            'id' => 'package_includes',
            'name' => __('O pacote inclui:'),
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
            'name' => __('Descrição do que está incluso:'),
            'type' => 'wysiwyg',
            'options' => array(
              'textarea_rows' =>  6,
              'teeny' =>  true,
            ),
          ),
          array(
            'type' => 'divider',
          ),
          array(
            'id' => 'package_initial_ammount',
            'name' => __('Valor de entrada do pacote:'),
            'type' => 'text',
            'placeholder' =>  'ex.: 4.000,00'
          ),
          array(
            'id' => 'package_payment_parcels',
            'name' => __('Quantidade de parcelas:'),
            'type' => 'number',
            'placeholder' =>  'ex.: 12'
          ),
          array(
            'id' => 'package_parcel_ammount',
            'name' => __('Valor das parcelas:'),
            'type' => 'text',
            'placeholder' =>  'ex.: 399,90'
          ),
          array(
            'id' => 'package_price_disclaimer',
            'name' => __('Observação sobre o preço:'),
            'type' => 'wysiwyg',
            'placeholder' =>  'ex.: sem juros, no cartão de crédito',
            'options' => array(
              'textarea_rows' =>  6,
              'teeny' =>  true,
            ),
          ),
          array(
            'type' => 'divider',
          ),
          array(
            'id' => 'package_tab_inclusions',
            'name' => __('Aba inclusões:'),
            'type' => 'wysiwyg',
            'options' => array(
              'textarea_rows' =>  6,
              'teeny' =>  true,
            ),
          ),
          array(
            'type' => 'divider',
          ),
          array(
            'id' => 'package_tab_schedule',
            'name' => __('Aba Roteiro Diário:'),
            'type' => 'wysiwyg',
            'options' => array(
              'textarea_rows' =>  6,
              'teeny' =>  true,
            ),
          ),
        )
      );
      return $meta_boxes_travel_package;
    }

    add_filter('rwmb_meta_boxes', 'create_metabox_travel_package');

// Add a new slug to all travel_package post type

function wpa_package_post_link( $post_link, $post ){
    if ( is_object( $post ) && 'travel_package' == get_post_type( $post ) ) {
        $terms = wp_get_object_terms( $post->ID, 'destino' );
        if( $terms ){
            return str_replace( '%destino%' , $terms[0]->slug , $post_link );
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

///////////////////////////////////

  // Metabox for Testimonials Admin Custom Menu
  function create_post_type_testimonial() {
    $labels = array(
        'name'                => __('Depoimentos | Home Page'),
        'singular_name'       => __('Depoimento'),
        'add_new'             => __('Adicionar depoimento'),
        'add_new_item'        => __('Adicionar depoimento'),
        'edit_item'           => __('Editar Depoimento'),
        'new_item'            => __('Novo Depoimento'),
        'all_items'           => __('Todos os depoimentos'),
        'view_item'           => __('Visualizar depoimento'),
        'search_items'        => __('Buscar depoimento'),
        'not_found'           => __('Nenhum depoimento encontrado'),
        'not_found_in_trash'  => __('Nenhum depoimento no lixo'),
        'menu_name'           => __('Depoimentos de Clientes'),
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
      'title'      => __('Depoimentos de Clientes'),
      'post_types' => array('testimonial'),
      'fields'     => array(
          array(
              'id'   => 'testimonial-name',
              'name' => __('Nome do cliente:'),
              'type' => 'text',
          ),
          array(
              'id'   => 'testimonial-age',
              'name' => __('Idade do cliente:'),
              'type' => 'text',
          ),
          array(
            'id'   => 'testimonial-occupation',
            'name' => __('Cargo do cliente:'),
            'type' => 'text',
        ),
          array(
              'id'   => 'testimonial-text',
              'name' => __('Depoimento do cliente:'),
              'type' => 'wysiwyg',
          ),
          array(
              'id'   => 'testimonial-picture',
              'name' => __('Foto do cliente:'),
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