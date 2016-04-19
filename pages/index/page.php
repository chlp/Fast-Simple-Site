<?php
namespace pages;
require_once __DIR__ . '/../core.php';
$page_index = new Page('index');
ob_start();

// todo: use func for a href
?>

    Index
    <a href="second.php" onclick="openPage('second', false); return false;">second</a>
    <img src="<?= $page_index->img('img1.jpg') ?>" width="100">

    <?php
$page_index->html = ob_get_clean();