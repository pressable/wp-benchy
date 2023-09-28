<?php

namespace Pressable\WP_Benchy\Modules;

class Actions extends Abstract_Module {

    protected $id = 'actions';

    protected $title = 'Actions';

    protected $description = 'Tests the time it takes to run all actions';

    private $action_checkpoints = array(
        'muplugins_loaded',
        'registered_taxonomy',
        'registered_taxonomy_category',
        'registered_taxonomy_post_tag',
        'registered_taxonomy_nav_menu',
        'registered_taxonomy_link_category',
        'registered_taxonomy_post_format',
        'registered_taxonomy_wp_theme',
        'registered_taxonomy_wp_template_part_area',
        'registered_post_type',
        'registered_post_type_post',
        'registered_post_type_page',
        'registered_post_type_attachment',
        'registered_post_type_revision',
        'registered_post_type_nav_menu_item',
        'registered_post_type_custom_css',
        'registered_post_type_customize_changeset',
        'registered_post_type_oembed_cache',
        'registered_post_type_user_request',
        'registered_post_type_wp_block',
        'registered_post_type_wp_template',
        'registered_post_type_wp_template_part',
        'registered_post_type_wp_global_styles',
        'registered_post_type_wp_navigation',
        'parse_tax_query',
        'parse_query',
        'pre_get_posts',
        'posts_selection',
        'wp_cache_set_last_changed',
        'parse_term_query',
        'pre_get_terms',
        'metadata_lazyloader_queued_objects',
        'plugin_loaded',
        'plugins_loaded',
        'sanitize_comment_cookies',
        'wp_roles_init',
        'setup_theme',
        'unload_textdomain',
        'load_textdomain',
        'after_setup_theme',
        'auth_cookie_malformed',
        'set_current_user',
        'init',
        'widgets_init',
        'wp_register_sidebar_widget',
        'wp_default_styles',
        'wp_sitemaps_init',
        'wp_default_scripts',
        'wp_loaded',
        'parse_request',
        'send_headers',
        'wp',
        'template_redirect',
        'loop_no_results',
        'render_block_core_template_part_file',
        'loop_start',
        'the_post',
        'begin_fetch_post_thumbnail_html',
        'end_fetch_post_thumbnail_html',
        'loop_end',
        'wp_head',
        'wp_enqueue_scripts',
        'enqueue_block_assets',
        'wp_print_styles',
        'wp_print_scripts',
        'wp_body_open',
        'wp_footer',
    );

    public function run() {
        foreach ( $this->action_checkpoints as $action ) {
            add_action( $action, function() use ( $action ) {
                $this->checkpoint_hit( $action );
            });
        }
    }
}