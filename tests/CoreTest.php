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
     * @test
     */
    public function should_render_tag()
    {
        $core   = new Core();
        $result = $core->tag(['p']);

        $this->assertEquals('<p></p>', $result);
    }

    /**
     * @test
     * @dataProvider should_parse_id_and_classes_from_tag_data_provider
     */
    public function should_parse_id_and_classes_from_tag($param, $result)
    {
        $core   = new Core();
        $result = $core->tag([$param]);

        $this->assertEquals($result, $result);
    }

    public function should_parse_id_and_classes_from_tag_data_provider()
    {
        return [
            ['p#id.class1.class2', "<p id='id'></p>"],
            ['div.class1', "<div class='class1'></div>"],
            ['span', "<span></span>"],
        ];
    }
}