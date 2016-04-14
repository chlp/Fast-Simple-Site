<?php
namespace pages;

class Page
{
    /**
     * @var array
     */
    static public $pages = [];

    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $html = '';

    /**
     * @var array
     */
    public $images = [];

    /**
     * @var array
     */
    public $links = [];

    /**
     * Page constructor.
     * @param $name
     * @throws \Exception если имя под страницу уже занято
     */
    function __construct($name)
    {
        if (key_exists($name, Page::$pages)) {
            throw new \Exception('Page already exist with name' . $name);
        }
        $this->name = $name;
        Page::$pages[$name] = $this;
    }

    /**
     * @param $src string
     * @return string
     */
    public function img($src)
    {
        if (!in_array($src, $this->images)) {
            $this->images[] = $src;
        }
        return $src;
    }

    /**
     * @param $page string
     * @return string
     */
    public function link($page)
    {
        if (!in_array($page, $this->links)) {
            $this->links[] = $page;
        }
        return $page;
    }
}