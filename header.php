<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title><?= $page->title ?></title>
    <script src="jquery-2.2.2.min.js"></script>
    <script>
        window.addEventListener('popstate', function (event) {
            _openPage(event.state, true);
        });

        function _openPage(pageName, fromHistory) {
            var pages = <?= \pages\Page::allPagesHtmlJavaScriptObject() ?>;

            if (!fromHistory) {
                window.history.pushState(pageName, pages[pageName].title, '?page=' + pageName);
            }

            $('body').html(pages[pageName].body);

            document.title = pages[pageName].title;
        }

        function openPage(pageName) {
            return _openPage(pageName, false);
        }
    </script>
</head>