<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('layouts.sidebar', function ($view) {
            $userMenuTree = [];

            if (Auth::check()) {
                $userId = Auth::user()->id;

                // Fetch all menus the user has read access to
                $menus = DB::table('t100_menus as m')
                    ->join('t100_user_menus as um', 'm.id', '=', 'um.menu_id')
                    ->where('um.user_id', $userId)
                    ->where('um.as_read', 1)
                    ->select('m.*')
                    ->orderBy('m.group_id')
                    ->orderBy('m.sub_group_id')
                    ->orderBy('m.level_menu_id')
                    ->orderBy('m.sequence_id')
                    ->get();

                // Build a nested structure: Main Menu (Level 1) -> Sub Menu (Level 2) -> Sub Menu (Level 3) -> Links (Level 4)
                $tree = [];
                $lastL1 = null;
                $lastL2 = null;
                $lastL3 = null;

                foreach ($menus as $menu) {
                    $menuData = (array) $menu;
                    $menuData['children'] = [];

                    if ($menu->level_menu_id == 1) {
                        $tree[$menu->id] = $menuData;
                        $lastL1 = $menu->id;
                        $lastL2 = null;
                        $lastL3 = null;
                    } elseif ($menu->level_menu_id == 2) {
                        if ($lastL1) {
                            $tree[$lastL1]['children'][$menu->id] = $menuData;
                            $lastL2 = $menu->id;
                            $lastL3 = null;
                        }
                    } elseif ($menu->level_menu_id == 3) {
                        if ($lastL1 && $lastL2) {
                            $tree[$lastL1]['children'][$lastL2]['children'][$menu->id] = $menuData;
                            $lastL3 = $menu->id;
                        }
                    } elseif ($menu->level_menu_id == 4) {
                        if ($lastL3 && isset($tree[$lastL1]['children'][$lastL2]['children'][$lastL3]) && $menu->sub_group_id == $tree[$lastL1]['children'][$lastL2]['children'][$lastL3]['sub_group_id']) {
                            $tree[$lastL1]['children'][$lastL2]['children'][$lastL3]['children'][$menu->id] = $menuData;
                        } elseif ($lastL1 && $lastL2) {
                            $tree[$lastL1]['children'][$lastL2]['children'][$menu->id] = $menuData;
                        } elseif ($lastL1) {
                            $tree[$lastL1]['children'][$menu->id] = $menuData;
                        }
                    }
                }

                $userMenuTree = [];
                foreach ($tree as $l1) {
                    $l1['children'] = array_values($l1['children']);
                    foreach ($l1['children'] as &$l2) {
                        if (isset($l2['children'])) {
                            $l2['children'] = array_values($l2['children']);
                            foreach ($l2['children'] as &$l3) {
                                if (isset($l3['children'])) {
                                    $l3['children'] = array_values($l3['children']);
                                }
                            }
                        }
                    }
                    $userMenuTree[] = $l1;
                }
            }

            $view->with('userMenuTree', $userMenuTree);
        });
    }
}
