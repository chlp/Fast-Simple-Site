<?
require __DIR__ . '/pages/core.php';
require('header.php');
?>
<body>
<?= $page_index->html ?>
<?= \pages\Page::cachingImagesHtml() ?>
</body>
</html>