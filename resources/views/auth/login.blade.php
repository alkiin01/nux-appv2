<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Login - QMS</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome (for icons) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Scripts and Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            font-family: 'Outfit', sans-serif;
        }
    </style>
</head>

<body class="text-gray-900 bg-gray-50">

    <div class="min-h-screen bg-[#f3f7fa] flex items-center justify-center p-4">
        <div class="w-full max-w-md">
            <!-- Login Card -->
            <div class="bg-white rounded-md shadow-sm border border-gray-100 overflow-hidden">
                <!-- Header -->
                <div class="bg-white text-center border-b border-gray-100 p-8 pb-6">
                    <div class="flex justify-center mb-4">
                        <img src="{{ asset('image/epicor-logo.png') }}" alt="Epicor Logo" class="h-[90px] w-auto">
                    </div>
                    <h1 class="text-xl font-bold text-gray-800 tracking-wide">WELCOME</h1>
                    <p class="text-sm font-medium text-gray-500 mt-1">PT SUMMIT ADYAWINSA INDONESIA</p>
                </div>

                <!-- Form -->
                <div class="p-8 pb-8">
                    @if ($errors->any())
                    <div class="mb-4 p-3 bg-red-50 border border-red-200 rounded-md">
                        <div class="flex items-center gap-2 text-red-600">
                            <i class="fa-solid fa-circle-exclamation text-base"></i>
                            <span class="text-sm font-medium">An error occurred:</span>
                        </div>
                        <ul class="mt-1 text-sm text-red-600 list-disc list-inside">
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <form method="POST" action="{{ route('login.submit') }}" class="space-y-5">
                        @csrf

                        <!-- Username -->
                        <div>
                            <label for="username" class="block text-sm font-semibold text-gray-500 mb-2 flex items-center gap-2">
                                <i class="fa-solid fa-user text-gray-400"></i>Username
                            </label>
                            <input
                                type="text"
                                id="username"
                                name="username"
                                value="{{ old('username') }}"
                                class="w-full px-4 py-2.5 bg-blue-50/30 border border-blue-400 rounded-md text-base text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200"
                                placeholder="Enter username"
                                required
                                autofocus>
                        </div>

                        <!-- Password -->
                        <div>
                            <label for="password" class="block text-sm font-semibold text-gray-500 mb-2 flex items-center gap-2">
                                <i class="fa-solid fa-lock text-gray-400"></i>Password
                            </label>
                            <div class="relative">
                                <input
                                    type="password"
                                    id="password"
                                    name="password"
                                    class="w-full px-4 py-2.5 bg-gray-100/80 border border-gray-200 rounded-md text-base text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200"
                                    placeholder="Enter password"
                                    required>
                                <button type="button" onclick="togglePassword('password')" class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600 transition-colors">
                                    <i class="fa-solid fa-eye-slash text-sm" id="password-icon"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Remember Me -->
                        <div class="flex items-center justify-between pt-1">
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="checkbox" name="remember" class="w-4 h-4 text-blue-600 border-gray-300 rounded-md focus:ring-blue-500">
                                <span class="text-sm text-gray-500">Remember me</span>
                            </label>
                        </div>

                        <!-- Submit Button -->
                        <div class="pt-3">
                            <button
                                type="submit"
                                class="w-full py-3 px-4 bg-[#2563eb] hover:bg-blue-700 text-white text-base font-semibold rounded-md shadow-sm transition-all duration-200 flex items-center justify-center gap-2">
                                <i class="fa-solid fa-right-to-bracket text-sm"></i>
                                <span>Login</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Footer -->
            <p class="text-center text-xs text-gray-400 mt-6">
                &copy; {{ date('Y') }} ICT - SAI. All rights reserved.
            </p>
        </div>
    </div>

    <script>
        function togglePassword(inputId) {
            const input = document.getElementById(inputId);
            const icon = document.getElementById(inputId + '-icon');

            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                input.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        }
    </script>
</body>

</html>