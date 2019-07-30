UPDATE wp2c_options SET option_value = replace(option_value, 'https://hypetur.com.br/new', 'http://localhost') WHERE option_name = 'home' OR option_name = 'siteurl';
UPDATE wp2c_posts SET post_content = replace(post_content, 'https://hypetur.com.br/new', 'http://localhost');
UPDATE wp2c_postmeta SET meta_value = replace(meta_value,'https://hypetur.com.br/new', 'http://localhost');