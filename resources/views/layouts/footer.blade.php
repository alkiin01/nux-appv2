<footer class="bg-white border-t border-gray-200 py-4 px-6 mt-auto">
    <div class="flex flex-col md:flex-row justify-between items-center text-sm text-gray-500">
        <div>
            &copy; {{ date('Y') }} {{ config('app.name', 'Laravel') }}. All rights reserved.
        </div>
        <div class="mt-2 md:mt-0 space-x-4">
            <a href="#" class="hover:text-gray-900">Privacy Policy</a>
            <a href="#" class="hover:text-gray-900">Terms of Service</a>
        </div>
    </div>
</footer>