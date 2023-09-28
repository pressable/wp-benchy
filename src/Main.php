<?php
namespace Pressable\WP_Benchy;

use WP_Error;
use WP_REST_Request;
use WP_REST_Response;
use WP_REST_Server;

class Main {

    public $runners = array();

    public $modules = array();

    public function init() {
        add_action('rest_api_init', array( $this, 'init_rest_endpoints' ));
        add_action('admin_menu', array( '\Pressable\WP_Benchy\Settings', 'register_admin_menu' ));
        add_action('admin_enqueue_scripts', array( '\Pressable\WP_Benchy\Settings', 'enqueue_admin_scripts' ));

        $this->register_modules();

        foreach ( $this->modules as $module_id => $module ) {
            $module_runner = new Runner( $module );

            $this->runners[ $module_id ] = $module_runner;
            $this->runners[ $module_id ]->run();
        }

        add_action('shutdown', array( $this, 'get_results' ));
    }
    

    public function register_modules() {
        $modules = array(
            'get_posts' => new Modules\Get_Posts()
        );

        $modules = apply_filters( 'pressable_benchy_register_modules', $modules );

        $this->modules = $modules;
    }

    public function is_module_registered( $module_id ) {
        return array_key_exists( $module_id, $this->modules );
    }

    public function init_rest_endpoints() {

        register_rest_route(
            'wp-benchy/v1', '/modules', array(
                'methods' => WP_REST_Server::READABLE,
                'callback' => array(
                    $this,
                    'handle_rest_modules'
                )
            )
        );

        register_rest_route(
            'wp-benchy/v1', '/module/(?P<id>\w+)', array(
                'methods' => WP_REST_Server::READABLE,
                'callback' => array(
                    $this,
                    'handle_rest_module'
                ),
            )
        );
    }

    public function handle_rest_modules( WP_REST_Request $request ) {
        $modules = array();

        foreach ( $this->modules as $module_id => $module ) {
            $modules[ $module_id ] = array(
                'id'          => $module->get_id(),
                'title'       => $module->get_title(),
                'description' => $module->get_description(),
                'options'     => $module->get_options(),
            );
        }

        return $modules;
    }

    public function handle_rest_module( WP_REST_Request $request ) {
        $module_id = $request->get_param('id');

        if ( ! $this->is_module_registered( $module_id ) ) {
            return new WP_Error( 'wp_benchy_module_not_registered', 'WP Benchy module not registered', array( 'status' => 404 ));
        }

        $results = $this->runners[ $module_id ]->get_results();
        $data = array(
            'checkpoints' => $results->get_checkpoint_hits(),
            'first'       => $results->get_first_hit_time(),
            'last'        => $results->get_last_hit_time(),
            'total'       => Utils::convert_nanoseconds( $results->get_total_time(), 'ms', 5 )
        );

        $response = new WP_REST_Response( $data, 200 );
        $response->set_status( 201 );

        return $response;
    }
}