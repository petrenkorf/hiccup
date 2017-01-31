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
        $result = $this->extractTagsAttribute($tag);

        $this->str .= "<{$result['tag']}";

        if (isset($result['id'])) {
            $this->str .= " id='{$result['id']}'";
        }

        $this->str .= '>';
    }

    protected function closeTag($tag)
    {
        $curTag = $this->extractTag($tag);
        $this->str .= "</{$curTag['tag']}>";
    }

    protected function extractTagsAttribute($tag)
    {
        $id     = $this->extractId($tag);
        $curTag = $this->extractTag($tag);
        $class  = $this->extractClasses($tag);

        return array_merge($curTag, array_merge($id, $class));
    }

    protected function extractTag($tag)
    {
        preg_match('/(^.*?)(?=(\.|#))|(.*)/', $tag, $match);

        if (isset($match[0])) {
            return ['tag' => $match[0]];
        }

        return [];
    }

    protected function extractId($tag)
    {
        preg_match('/(?<=(#))(id)/', $tag, $id);

        if (isset($id[0])) {
            return ['id' => $id[0]];
        }

        return [];
    }

    protected function extractClasses($tag)
    {
        preg_match('/(?<=(\.))/', $tag, $classes);

        if (isset($classes[0])) {
            return ['classes' => $classes[0]];
        }

        return [];
    }
}