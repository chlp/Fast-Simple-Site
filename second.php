<? require('header.php'); ?>
<script>
    window.history.replaceState('second', 'second', 'second.php');
</script>
<body>
Second
<a href="index.php" onclick="openPage('index', false); return false;">index</a>
<img src="img2.jpg" width="100">
<img src="img3.jpg" width="100">

<div style="display: none;">
    <img src="img1.jpg" width="1" height="1" alt="Image 01" />
    <img src="img2.jpg" width="1" height="1" alt="Image 02" />
    <img src="img3.jpg" width="1" height="1" alt="Image 03" />
</div>
</body>
</html>