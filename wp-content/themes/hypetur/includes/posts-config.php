<?php
    // Custom Excerpts
    function hypeturwp_index($length) // Create 20 Word Callback for Index page Excerpts, call using hypeturwp_excerpt('hypeturwp_index');
    {
        return 20;
    }

    // Create 40 Word Callback for Custom Post Excerpts, call using hypeturwp_excerpt('hypeturwp_custom_post');
    function hypeturwp_custom_post($length)
    {
        return 40;
    }

    // Create the Custom Excerpts callback
    function hypeturwp_excerpt($length_callback = '', $more_callback = '')
    {
        global $post;
        if (function_exists($length_callback)) {
            add_filter('excerpt_length', $length_callback);
        }
        if (function_exists($more_callback)) {
            add_filter('excerpt_more', $more_callback);
        }
        $output = get_the_excerpt();
        $output = apply_filters('wptexturize', $output);
        $output = apply_filters('convert_chars', $output);
        $output = '<p>' . $output . '</p>';
        echo $output;
    }

    // Pagination for paged posts, Page 1, Page 2, Page 3, with Next and Previous Links, No plugin
    function hypeturwp_pagination()
    {
        global $wp_query;
        $big = 999999999;
        echo paginate_links(array(
            'base' => str_replace($big, '%#%', get_pagenum_link($big)),
            'format' => '?paged=%#%',
            'current' => max(1, get_query_var('paged')),
            'total' => $wp_query->max_num_pages
        ));
    }
?>