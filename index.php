<? require('header.php'); ?>
<script>
    window.history.replaceState('index', 'index', 'index.php');
</script>
<body>
Index
<a href="second.php" onclick="openPage('second', false); return false;">second</a>
<img src="img1.jpg" width="100">

<div style="display: none;">
    <img src="img1.jpg" width="1" height="1" alt="Image 01" />
    <img src="img2.jpg" width="1" height="1" alt="Image 02" />
    <img src="img3.jpg" width="1" height="1" alt="Image 03" />
</div>
</body>
</html>