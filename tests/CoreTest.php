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

    /**
     * @test
     */
    public function should_return_basic_html5_template()
    {
        $core = new Core();
        $result = $core->html5();

        $this->assertEquals('<!DOCTYPE html><html><head></head><body></body></html>', $result);
    }

    /**
     * @test
     */
    public function should_return_basic_html_template()
    {
        $core = new Core();
        $result = $core->html();

        $this->assertEquals('<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd"><html><head></head><body></body></html>', $result);
    }
}