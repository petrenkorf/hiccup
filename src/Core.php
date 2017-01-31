<?php

namespace Hiccup;

class Core
{
    protected $str;

    public function __construct()
    {
        $this->str = '';
    }

    public function tag(array $tag = [])
    {
        $this->openTag($tag[0]);

        if ($this->hasNestedTag($tag)) {
            $this->tag($tag[1]);
        }

        $this->closeTag($tag[0]);

        return $this->str;
    }

    protected function hasNestedTag($tag)
    {
        return isset($tag[1]) && is_array($tag[1]);
    }

    protected function openTag($tag)
    {
        $this->str .= "<{$tag}>";
    }

    protected function closeTag($tag)
    {
        $this->str .= "</{$tag}>";
    }
}