<?php
require __DIR__ . '/pages/core.php';
foreach (scandir(__DIR__ . '/pages/') as $page) {
    if (in_array($page, ['.', '..'])) {
        continue;
    }
    if (!is_dir(__DIR__ . '/pages/' . $page)) {
        continue;
    }
    require __DIR__ . '/pages/' . $page . '/page.php';
}
?>
<? require('header.php'); ?>
<body>
Index
<a href="second.php" onclick="openPage('second', false); return false;">second</a>
<img src="img1.jpg" width="100">

<? echo \pages\Page::cachingImagesHtml(); ?>
</body>
</html>