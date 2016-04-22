<?
// todo:
// * сохранить данные в localstorage
// * добавить перевод

require __DIR__ . '/pages/core.php';
require('header.php');

$pageName = 'index';
if (isset($_GET['page'])) {
    $pageName = $_GET['page'];
    if (!isset(\pages\Page::$pages[$pageName])) {
        $pageName = 'index';
    }
}
$page = \pages\Page::$pages[$pageName];
?>
<body>
<?= $page->html ?>
<?= \pages\Page::cachingImagesHtml() ?>
</body>
</html>