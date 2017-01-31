<?php

namespace Hiccup;

use PHPUnit_Framework_TestCase;

class CoreTest extends PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function should_render_lots_of_arrays()
    {
        $core   = new Core();
        $result = $core->tag(['div', ['p', ['small']]]);

        $this->assertEquals('<div><p><small></small></p></div>', $result);
    }

    /**
     * @test
     */
    public function should_render_nested_arrays()
    {
        $core   = new Core();
        $result = $core->tag(['div', ['p']]);

        $this->assertEquals('<div><p></p></div>', $result);
    }

    /**
     *
     */
    public function should_render_tag()
    {
        $core   = new Core();
        $result = $core->tag(['p']);

        $this->assertEquals('<p></p>', $result);
    }
}