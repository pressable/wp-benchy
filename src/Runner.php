<?php

namespace Pressable\WP_Benchy;

class Runner {

    public $checkpoints = array();

    public $module;

    public function __construct( $module ) {
        $this->module = $module;
    }

    public function run() {
        $this->module->set_runner($this);
        $this->module->register_checkpoints();
        $this->module->run();
    }

    public function get_results() {
        return $this->module->get_results();
    }

}