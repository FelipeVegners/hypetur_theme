<?php
    // Meta Box creates Admin Custom Menu
    function create_post_type_package() {
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
          'menu_position'      => 2,
          'supports'           => $supports,
          'menu_icon'          => 'dashicons-tickets-alt',
      );
      register_post_type('promo-package', $args);
  }
  add_action('init', 'create_post_type_package');

  // CREATES METABOX LOOP
  function create_metabox_package($meta_boxes_package) {
    $meta_boxes_package[] = array(
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
                'id'   => 'intro',
                'name' => __('Breve introdução do destino:', 'hype-tur'),
                'type' => 'wysiwyg',
                'limit' => 256,
            ),
            array(
              'id' => 'picture_url',
              'name' => __('URL da Imagem do destino:', 'hype-tur'),
              'type' => 'text'
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

      return $meta_boxes_package;
    }
    add_filter('rwmb_meta_boxes', 'create_metabox_package');

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

// CREATES METABOX LOOP
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
?>