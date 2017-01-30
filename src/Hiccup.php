<?php

namespace Hiccup;

class Hiccup
{
    public function __construct()
    {

    }

    public function html($params = [])
    {
        return "<!DOCTYPE html><html><head></head><body></body></html>";
    }

    public function element($params = [])
    {
        if (is_string($params)) {
            return $this->pushTag($params);
        }

        $element = '';
        
        foreach ($params as $tag) {
            $element .= $this->pushTag($tag);
        }

        return $element;
    }

    protected function pushTag($tag)
    {
        return "<$tag></$tag>";
    }
}
