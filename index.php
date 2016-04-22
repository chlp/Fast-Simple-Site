<?
require __DIR__ . '/pages/core.php';

if (isset($_GET['allPagesJavaScriptObject'])) {
    echo \pages\Page::allPagesHtmlJavaScriptObject();
    exit;
}

$pageName = 'index';
if (isset($_GET['page'])) {
    $pageName = $_GET['page'];
    if (!isset(\pages\Page::$pages[$pageName])) {
        $pageName = 'index';
    }
}
$page = \pages\Page::$pages[$pageName];
?>
<!DOCTYPE html>
<html lang="ru">
<? require('header.php'); ?>
<body>
<?= $page->html ?>
<?= \pages\Page::cachingImagesHtml() ?>
</body>
</html>