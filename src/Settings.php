<?php

namespace Pressable\WP_Benchy;

class Settings {

    public static function register_admin_menu() {
        add_submenu_page(
            'tools.php',
            esc_html__( 'WP Benchy', 'wp-benchy' ),
            esc_html__( 'WP Benchy', 'wp-benchy' ),
            'manage_options',
            'wp-benchy',
            array( '\Pressable\WP_Benchy\Settings', 'render_admin_settings' )
        );
    }

    public static function enqueue_admin_scripts() {
        $current_screen = get_current_screen()->id;

        if ( $current_screen === 'tools_page_wp-benchy' ) {
            $asset_props = require_once( WP_BENCHY_DIR_PATH . '/scripts/build/index.asset.php' );

            wp_enqueue_script(
                'wp-benchy-settings',
                WP_BENCHY_DIR_URL . 'scripts/build/index.js',
                $asset_props['dependencies'],
                $asset_props['version'],
                true
            );

            wp_enqueue_style('wp-benchy-settings', WP_BENCHY_DIR_URL . 'styles/settings.css', array('wp-components'), '1.0.0', 'all');
	    }
    }

    public static function render_admin_settings() {
        if ( ! current_user_can( 'manage_options' ) ) {
            wp_die( esc_html__( 'You do not have sufficient capabilities to access this page.', 'wp-benchy' ) );
        }
         
        ?>

        <div class="wrap">
            <div id="wp-benchy-settings"></div>
        </div>
        
        <?php
    }

}