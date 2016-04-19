<?php
namespace pages;

class Page
{
    /**
     * @var Page[]
     */
    static public $pages = [];

    /**
     * @var string[]
     */
    static public $allImages = [];

    /**
     * Невидимый div со всеми изображениями
     * @return string
     */
    static public function cachingImagesHtml()
    {
        $html = '<div style="display: none;">';
        foreach (Page::$allImages as $img) {
            $html .= '<img src="' . $img . '" width="1" height="1" alt="caching image">';
        }
        $html .= '</div>';
        return $html;
    }

    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $html = '';

    /**
     * @var string[]
     */
    public $images = [];

    /**
     * @var string[]
     */
    public $links = [];

    /**
     * Page constructor.
     * @param $name string
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
        if (!in_array($src, Page::$allImages)) {
            Page::$allImages[] = $src;
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