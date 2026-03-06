<?php
require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

// Mock a login
$user = \App\Models\User::first();
if ($user) {
    \Illuminate\Support\Facades\Auth::login($user);
}

try {
    $html = view('layouts.sidebar')->render();
    echo "SUCCESS\n";
    // echo snippet to see if it has menus
    echo substr($html, 0, 500);
} catch (\Exception $e) {
    echo "ERROR: " . $e->getMessage() . "\n";
}
