<?php

namespace Pressable\WP_Benchy;

class Results {

    protected $checkpoints;

    protected $checkpoint_hits = array();

    public function __construct( $checkpoints ) {
        $this->checkpoints = $checkpoints;
    }

    public function get_checkpoints() {
        return $this->checkpoints;
    }

    public function flatten_checkpoint_hits() {
        $flattened = array();

        foreach ( $this->checkpoints as $checkpoint_id => $checkpoint ) {
            foreach ( $checkpoint->get_hits() as $hit_key => $hit ) {
                $flattened[ $checkpoint_id . '_' . $hit_key ] = $hit;
            }
        }

        return $flattened;
    }

    public function get_checkpoint_hits() {
        if ( empty( $this->checkpoint_hits ) ) {
            $hits_flattened = $this->flatten_checkpoint_hits();

            asort( $hits_flattened );

            $this->checkpoint_hits = $hits_flattened;
        }

        return $this->checkpoint_hits;
    }

    public function get_first_hit_time() {
        $hits = $this->get_checkpoint_hits();

        return $hits[ array_key_first( $hits ) ];
    }

    public function get_last_hit_time() {
        $hits = $this->get_checkpoint_hits();

        return $hits[ array_key_last( $hits ) ];
    }

    public function get_total_time() {
        $first = $this->get_first_hit_time();
        $last = $this->get_last_hit_time();

        return $last - $first;
    }

}