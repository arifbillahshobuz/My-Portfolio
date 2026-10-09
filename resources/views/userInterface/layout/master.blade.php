<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="" />

    <!-- Site Title -->
    <title>      
        {{ env('APP_NAME') ?? "Billah Shobuz" }}
    </title>
    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='64' height='44' viewBox='0 0 64 44'%3E%3Cpath d='M 6 36 L 16 8 H 22 L 32 36 H 25.5 L 23.3 29.5 H 14.7 L 12.5 36 H 6 Z M 16.3 24.5 H 21.7 L 19 16.2 L 16.3 24.5 Z' fill='%23FF0000'/%3E%3Cpath d='M 35 8 H 48 C 52.5 8 55.5 10.5 55.5 15 C 55.5 18.2 53.5 20.8 50 21.6 L 56.5 36 H 50 L 44 22.5 H 41 V 36 H 35 V 8 Z M 41 17.5 H 47.5 C 49.5 17.5 50.8 16.7 50.8 15 C 50.8 13.3 49.5 12.5 47.5 12.5 H 41 V 17.5 Z' fill='%23FF0000'/%3E%3C/svg%3E" />
    

    
    <!-- All CSS Files -->
    @include('userInterface.partials.style')
</head>

<body>
    <!-- Preloader Area Start -->
    <div class="preloader">
        <svg viewBox="0 0 1000 1000" preserveAspectRatio="none">
            <path id="preloaderSvg" d="M0,1005S175,995,500,995s500,5,500,5V0H0Z"></path>
        </svg>

        <div class="preloader-heading">
            <div class="load-text">
                <span>W</span>
                <span>E</span>
                <span>L</span>
                <span>C</span>
                <span>O</span>
                <span>M</span>
                <span>E</span>
            </div>
        </div>
    </div>
    <!-- Preloader Area End -->

    <!-- start: Back To Top -->
    <div class="progress-wrap" id="scrollUp">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </div>
    <!-- end: Back To Top -->

    <!-- HEADER START -->
    @include('userInterface.partials.header')
    <!-- HEADER END -->

    <main class="site-content" id="content">
       @yield('content')
    </main>

    <!-- FOOTER AREA START -->
  @include('userInterface.partials.footer')
    <!-- FOOTER AREA END -->

    <!-- Javascript all file here -->
    @include('userInterface.partials.script')
    <script>
        hero();
        service();
    </script>
</body>

</html>
