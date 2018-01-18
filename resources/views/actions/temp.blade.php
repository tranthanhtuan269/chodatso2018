<!doctype html>
<html lang="en">
<head>

    <meta charset="utf-8">

    <title>Laravel AJAX Pagination with JQuery</title>

</head>
<body>

    <h1>Posts</h1>

    <div class="posts">
        @foreach ($tinmns as $tin)

            <article>
                <h2>{{ $tin->id }}</h2>
            </article>

        @endforeach

        {{ $tinmns->links() }}
    </div>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    <script>
    $(window).on('hashchange', function() {
        if (window.location.hash) {
            var page = window.location.hash.replace('#', '');
            if (page == Number.NaN || page <= 0) {
                return false;
            } else {
                getPosts(page);
            }
        }
    });
    $(document).ready(function() {
        $(document).on('click', '.pagination a', function (e) {
            getPosts($(this).attr('href').split('page=')[1]);
            e.preventDefault();
        });
    });
    function getPosts(page) {
        $.ajax({
            url : '?page=' + page,
            dataType: 'json',
        }).done(function (data) {
            console.log(data.tinmns.data.length);
            $html = '';
            $html += '<article>';
            for(var i = 0; i < data.tinmns.data.length; i++){
                $html += '<h2>' + data.tinmns.data[i].id  + '</h2>';
            }
            $html += '</article>';
            $('.posts').html($html);
            location.hash = page;
        }).fail(function () {
            alert('Posts could not be loaded.');
        });
    }
    </script>

</body>
</html>