<!DOCTYPE HTML>
<html class="h-100">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>MyImdb | @yield('title', 'MyImdb')</title>

        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <!--Font Awesome -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css" integrity="sha384-QYIZto+st3yW+o8+5OHfT6S482Zsvz2WfOzpFSXMF9zqeLcFV0/wlZpMtyFcZALm" crossorigin="anonymous">
        <!--Custom CSS -->
        <link rel="stylesheet" href="/build/backoffice/css/dashboard.css">

    </head>
    <body class="d-flex flex-column h-100">
        <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
            <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">MyImdb Backoffice</a>
            <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>    
        </header>
        <!--End header -->

        <div class="container-fluid">
            <div class="row">
                <!-- Begin left sidebar -->
                <div id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                    @section('sidebar')
                        @include('backoffice.partials._menu',[
                            'items' => [
                                [
                                    'link' => route('backoffice.movies.index'),
                                    'title' => 'List of movies'
                                ]
                            ]
                        ])
                    @show
                </div>
                <!-- end left sidebar-->

                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                    <div class="mt-3 mb-3 border-bottom">
                        <h2 class="h2">@yield('main_title')</h2>
                    </div>

                    @yield('content')

                </main>
                <!-- end main content -->
            </div>
        </div>

        <!-- begin footer -->
        <footer class="footer mt-auto py-3 bg-light">
            <div class="container">
                <span class=text-muted><p>&copy; 2021 MyImdb.com</p></span>
            </div>
        </footer>
        <!-- end footer -->

        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    </body>
</html>
