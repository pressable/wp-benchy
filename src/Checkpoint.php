<?php

namespace Pressable\WP_Benchy;

class Checkpoint {

    protected $id = null;

    protected $hits = array();

    public function set_id( $id ) {
        $this->id = $id;
    }

    public function get_id() {
        return $this->id;
    }

    public function hit() {
        $this->hits[] = hrtime(true);
    }

    public function get_hits() {
        return $this->hits;
    }

}