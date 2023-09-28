<?php

namespace Pressable\WP_Benchy\Modules;
use Pressable\WP_Benchy\Checkpoint;
use Pressable\WP_Benchy\Results;

abstract class Abstract_Module {

    protected $runner;

    protected $checkpoint_ids = array();

    protected $checkpoints = array();

    protected $results;

    protected $id;

    protected $title = '';

    protected $description = '';

    protected $options = array();

    public function get_id() {
        return $this->id;
    }

    public function get_title() {
        return $this->title;
    }

    public function get_description() {
        return $this->description;
    }

    public function get_options() {
        return $this->options;
    }

    public function set_runner( $runner ) {
        $this->runner = $runner;
    }

    public function get_checkpoints() {
        return $this->checkpoints;
    }

    public function register_checkpoint( $id ) {
        if ( ! array_key_exists($id, $this->checkpoints) ) {
            $this->checkpoints[ $id ] = new Checkpoint();
        }
    }

    public function register_checkpoints() {
        foreach ( $this->checkpoint_ids as $id ) {
            $this->register_checkpoint( $id );
        }
    }

    public function checkpoint_hit( $id ) {
        if ( array_key_exists( $id, $this->checkpoints) ) {
            $this->checkpoints[ $id ]->hit();
        } else {
            $this->register_checkpoint( $id );
            $this->checkpoints[ $id ]->hit();
        }
    }

    abstract public function run();

    public function get_results() {
        if ( empty( $this->results ) ) {
            $this->results = new Results( $this->checkpoints );
        }

        return $this->results;
    }

}