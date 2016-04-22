<?php
namespace pages;
require_once __DIR__ . '/../core.php';
$page_index = new Page('index', 'Быстрые страницы');
ob_start();
?>
    Index
    <a <?= $page_index->link('second') ?>>second</a>
    <img src="<?= $page_index->img('img1.jpg') ?>" width="100">
    <?php
$page_index->html = ob_get_clean();