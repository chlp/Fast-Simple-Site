<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Index</title>
    <script src="jquery-2.2.2.min.js"></script>
    <script>
        window.addEventListener('popstate', function (event) {
            openPage(event.state, true);
        });

        function openPage(pageName, fromHistory) {
            var pages = <?= \pages\Page::allPagesHtmlJavaScriptObject() ?>;

            if (!fromHistory) {
                window.history.pushState(pageName, pageName, pageName + '.php');
            }

            $('body').html(pages[pageName].body);

            document.title = pages[pageName].title;
        }
    </script>
</head>