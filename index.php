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
var_dump(\pages\Page::$pages);
?>

<? require('header.php'); ?>
<script>
    window.history.replaceState('index', 'index', 'index.php');
</script>
<body>
Index
<a href="second.php" onclick="openPage('second', false); return false;">second</a>
<img src="img1.jpg" width="100">

<div style="display: none;">
    <img src="img1.jpg" width="1" height="1" alt="Image 01"/>
    <img src="img2.jpg" width="1" height="1" alt="Image 02"/>
    <img src="img3.jpg" width="1" height="1" alt="Image 03"/>
</div>
</body>
</html>