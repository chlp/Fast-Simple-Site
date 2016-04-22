<?
require __DIR__ . '/pages/core.php';
require('header.php');
?>
<body>
<?= $page_second->html ?>
<?= \pages\Page::cachingImagesHtml() ?>
</body>
</html>