<?php
namespace pages;
require_once __DIR__ . '/../core.php';
$page_second = new Page('second');
ob_start();

// todo: use func for a href
?>

    Second
    <a href="index.php" onclick="openPage('index', false); return false;">index</a>
    <img src="<?= $page_second->img('img2.jpg') ?>" width="100">
    <img src="<?= $page_second->img('img3.jpg') ?>" width="100">

    <?php
$page_second->html = ob_get_clean();