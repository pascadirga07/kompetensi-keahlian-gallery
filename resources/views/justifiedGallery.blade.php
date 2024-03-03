<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        @vite(['resources/css/app.css','resources/js/app.js', 'resources/plugins/justifiedGallery/dist/js/jquery.justifiedGallery.js', 'resources/plugins/justifiedGallery/dist/css/justifiedGallery.css'])


    </head>
    <body>
        @livewire('home.navbar')
        @livewireStyles()
        <div  id="justifiedGallery">
            <a href="path/to/image1.jpg">
                <img alt="caption for image 1" src="https://source.unsplash.com/featured/300x201";/>
            </a>
            <a href="path/to/image2.jpg">
                <img alt="caption for image 2" src="https://source.unsplash.com/featured/300x202";/>
            </a>
            <a href="path/to/image2.jpg">
                <img alt="caption for image 2" src="https://source.unsplash.com/featured/300x203";/>
            </a>
            <a href="path/to/image2.jpg">
                <img alt="caption for image 2" src="https://source.unsplash.com/featured/300x204";/>
            </a>
            <a href="path/to/image2.jpg">
                <img alt="caption for image 2" src="https://source.unsplash.com/featured/300x205";/>
            </a>
            <a href="path/to/image2.jpg">
                <img alt="caption for image 2" src="https://source.unsplash.com/featured/300x206";/>
            </a>
            <a href="path/to/image2.jpg">
                <img alt="caption for image 2" src="https://source.unsplash.com/featured/300x207";/>
            </a>
            <a href="path/to/image2.jpg">
                <img alt="caption for image 2" src="https://source.unsplash.com/featured/300x208";/>
            </a>
        </div>
        <script type="module">

            $(document).ready(function () {
                $("#justifiedGallery").justifiedGallery({
                    rowHeight : 300,
                lastRow : 'justify',
                margins : 5,
                border: 10
                });

            });

        </script>
    </body>
</html>
