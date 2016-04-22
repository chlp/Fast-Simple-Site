<?php
namespace pages;

foreach (scandir(__DIR__) as $page) {
    if (in_array($page, ['.', '..'])) {
        continue;
    }
    if (!is_dir(__DIR__ . '/' . $page)) {
        continue;
    }
    require __DIR__ . '/' . $page . '/page.php';
}

class Page
{
    /**
     * @var Page[]
     */
    static public $pages = [];

    /**
     * JavaSript-объект с кодом всех страниц
     * @return string
     */
    static public function allPagesHtmlJavaScriptObject()
    {
        // todo: нужно еще и запоминать в localstorage, если там что-то не то
        $pagesObj = [];
        foreach (Page::$pages as $name => $page) {
            $pagesObj[$name] = [
                'title' => $page->title,
                'body' => $page->html
            ];
        }
        return json_encode($pagesObj);
    }

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
        // todo: это нужно делать уже после подгрузке всех изображений с текущей страницы
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
    public $title;

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
    function __construct($name, $title)
    {
        if (key_exists($name, Page::$pages)) {
            throw new \Exception('Page already exist with name' . $name);
        }
        $this->name = $name;
        $this->title = $title;
        Page::$pages[$name] = $this;
    }

    /**
     * @param $src string
     * @return string
     */
    public function img($src)
    {
        // todo: тяжелые изображения нужно автоматически уменьшать, а загружать большие только по готовности
        if (!in_array($src, $this->images)) {
            $this->images[] = $src;
        }
        if (!in_array($src, Page::$allImages)) {
            Page::$allImages[] = $src;
        }
        return $src;
    }

    /**
     * @param $pageName string
     * @return string
     */
    public function link($pageName)
    {
        if (!in_array($pageName, $this->links)) {
            $this->links[] = $pageName;
        }
        return 'href="?page=' . $pageName . '" onclick="openPage(\'' . $pageName . '\'); return false;"';
    }
}