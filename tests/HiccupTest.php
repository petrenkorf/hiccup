<?php

namespace Hiccup;

use PHPUnit\Framework\TestCase;

class HiccupTest extends TestCase
{
    /**
     *  @test
     */
    public function should_print_html_basic_structure()
    {
        $hiccup = new Hiccup();
        $result = $hiccup->html();

        $this->assertEquals("<!DOCTYPE html><html><head></head><body></body></html>", $result);
    }

    /**
     * @test
     * @dataProvider tag_param_format_provider
     */
    public function should_render_element($tag)
    {
        $hiccup = new Hiccup();
        $result = $hiccup->element($tag);

        $this->assertEquals("<p></p>", $result);
    }

    public function tag_param_format_provider()
    {
        return [
            ['p'],
            [['p']]
        ];
    }

    /**
     * @test 
     */
    public function should_nest_tags_when_using_array_notation()
    {
        $hiccup = new Hiccup();
        $result = $hiccup->element(['div', ['p']]);
    
        $this->assertEqual('<div><p></p></div>', $result);
    }
}
