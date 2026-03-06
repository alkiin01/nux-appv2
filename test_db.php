<?php
require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$menus = \Illuminate\Support\Facades\DB::select("SELECT * FROM t100_menus WHERE menu_name LIKE '%memo%' OR menu LIKE '%memo%' OR menu_name LIKE '%dashboard%' ORDER BY group_id, sub_group_id, level_menu_id, sequence_id");
file_put_contents(__DIR__ . '/test_db_output.json', json_encode($menus, JSON_PRETTY_PRINT));
