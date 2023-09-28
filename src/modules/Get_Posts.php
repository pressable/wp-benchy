<?php

namespace Pressable\WP_Benchy\Modules;

class Get_Posts extends Abstract_Module {

    protected $id = 'get_posts';

    protected $title = 'Get Posts';

    protected $description = 'Tests a basic get_posts call';

    protected $options = array(
        'iterations' => array(
            'type'  => 'int',
            'min'   => 1,
            'max'   => 25,
            'value' => 1
        )
    );

    protected $checkpoint_ids = array(
        'get_posts_start',
        'get_posts_end',
    );
    
    public function run() {
        $this->checkpoint_hit('get_posts_start');

        $posts = get_posts();

        $this->checkpoint_hit('get_posts_end');
    }

}