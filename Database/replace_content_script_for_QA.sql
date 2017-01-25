UPDATE wp_nia_options SET option_value = replace(option_value, 'http://localhost:8771/nia', 'http://qa.nationalinsuranceadvisors.com');

UPDATE wp_nia_posts SET guid = replace(guid, 'http://localhost:8771/nia', 'http://qa.nationalinsuranceadvisors.com');

UPDATE wp_nia_posts SET post_content = replace(post_content, 'http://localhost:8771/nia', 'http://qa.nationalinsuranceadvisors.com');

UPDATE wp_nia_postmeta SET meta_value = replace(meta_value, 'http://localhost:8771/nia', 'http://qa.nationalinsuranceadvisors.com');

UPDATE leads SET source_page = replace(source_page, 'http://localhost:8771/nia', 'http://qa.nationalinsuranceadvisors.com')