<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title><?= $page->title ?></title>
    <script src="jquery-2.2.2.min.js"></script>
    <script src="md5.js"></script>
    <script>
        var pages = {};
        (function () {
            var pagesStorageStr = localStorage.getItem('pages');
            var pagesActualMd5 = '<?= md5(\pages\Page::allPagesHtmlJavaScriptObject()) ?>';

            pages = JSON.parse(pagesStorageStr);

            if (md5(pagesStorageStr) !== pagesActualMd5) {
                $.get('?allPagesJavaScriptObject', function (actualPagesStr) {
                    pagesStorageStr = actualPagesStr;
                    pages = JSON.parse(actualPagesStr);
                    localStorage.setItem('pages', actualPagesStr);
                });
            }
        })();

        function _openPage(pageName, fromHistory) {
            if (!fromHistory) {
                window.history.pushState(pageName, pages[pageName].title, '?page=' + pageName);
            }

            $('body').html(pages[pageName].body);

            document.title = pages[pageName].title;
        }

        function openPage(pageName) {
            return _openPage(pageName, false);
        }

        window.addEventListener('popstate', function (event) {
            _openPage(event.state, true);
        });
    </script>
</head>