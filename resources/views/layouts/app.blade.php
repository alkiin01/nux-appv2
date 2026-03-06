<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Scripts and Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased bg-gray-50 text-gray-900" style="font-family: 'Outfit', sans-serif;">
    <div class="min-h-screen flex bg-gray-100">
        <!-- Sidebar -->
        @include('layouts.sidebar')

        <!-- Main Content Wrapper -->
        <div class="flex-1 flex flex-col min-w-0 lg:ml-20 transition-all duration-300">
            <!-- Header -->
            @include('layouts.header')

            <!-- Page Content -->
            <main class="flex-1 p-6">
                @yield('content')
            </main>

            <!-- Footer -->
            @include('layouts.footer')
        </div>
    </div>

    <!-- Page Loader Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // --- Progress bar logic for Page Navigation ---
            const pageLoader = document.getElementById('page-loader');
            const progressBar = document.getElementById('progress-bar');

            function showLoader() {
                if (pageLoader && progressBar) {
                    pageLoader.classList.remove('hidden');
                    progressBar.style.width = '30%'; // Jump to 30% initially

                    // Simulate loading progress
                    let progress = 30;
                    let interval = setInterval(() => {
                        progress += Math.random() * 10;
                        if (progress > 90) clearInterval(interval);
                        progressBar.style.width = Math.min(progress, 90) + '%';
                    }, 400);
                }
            }

            // 1. When clicking a normal link (same site)
            document.addEventListener('click', function(e) {
                let target = e.target.closest('a');
                // Ensure link exists, isn't a download link, isn't target blank, isn't JS/ID anchor
                if (target && target.href &&
                    !target.hasAttribute('download') &&
                    target.target !== '_blank' &&
                    !target.href.startsWith('javascript:') &&
                    !target.getAttribute('href').startsWith('#')) {
                    // Only if it navigates to our same hostname
                    if (target.hostname === window.location.hostname) {
                        showLoader();
                    }
                }
            });

            // 2. When submitting non-AJAX forms
            document.addEventListener('submit', function(e) {
                if (!e.target.hasAttribute('data-ajax')) {
                    showLoader();
                }
            });

            // 3. Fallback for beforeunload (triggers when page starts discarding)
            window.addEventListener('beforeunload', function() {
                showLoader();
            });
        });

        // --- On Full Page Render Complete ---
        window.addEventListener('load', function() {
            const pageLoader = document.getElementById('page-loader');
            const progressBar = document.getElementById('progress-bar');

            if (pageLoader && progressBar) {
                // Instantly fill to 100%
                progressBar.style.width = '100%';

                // Hide wrapper after transition completes
                setTimeout(() => {
                    pageLoader.classList.add('hidden');
                    progressBar.style.width = '0%'; // Reset for next use
                }, 300);
            }
        });
    </script>
</body>

</html>