<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Index</title>
    <script src="jquery-2.2.2.min.js"></script>
    <script>
        window.addEventListener('popstate', function (event) {
            openPage(event.state, true);
        });

        var pages = {
            index: {
                body: 'Index\r\n' +
                '<a href="second.php" onclick="openPage(\'second\', false); return false;">second</a>\r\n' +
                '<img src="img1.jpg" width="100">',
                title: 'Index'
            },
            second: {
                body: 'Second\r\n' +
                '<a href="index.php" onclick="openPage(\'index\', false); return false;">index</a>\r\n' +
                '<img src="img2.jpg" width="100">\r\n' +
                '<img src="img3.jpg" width="100">',
                title: 'Second'
            }
        };

        function openPage(pageName, fromHistory) {
            if (!fromHistory) {
                window.history.pushState(pageName, pageName, pageName + '.php');
            }
            $('body').html(pages[pageName].body);
            document.title = pages[pageName].title;
        }

        // todo: make json object with all pages (php use to write static) by names
        // todo: make list of all images
    </script>
</head>