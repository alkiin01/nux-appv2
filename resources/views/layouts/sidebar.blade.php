<!-- Sidebar -->
<aside id="sidebar" class="group fixed top-0 left-0 z-40 h-screen transition-all duration-300 w-20 hover:w-64 -translate-x-full lg:translate-x-0">
    <div class="sidebar-scroll h-full px-3 py-6 overflow-y-auto overflow-x-hidden bg-white border-r border-slate-200">
        <!-- Logo -->
        <a href="{{ url('/') }}" class="flex items-center justify-center mb-8 px-2 h-12">
            <img src="{{ asset('image/epicor-logo.png') }}" alt="Epicor Logo" class="h-15 w-auto object-contain">
        </a>

        <!-- Navigation -->
        <nav class="space-y-1">
            <!-- Label -->
            @if(isset($menuStructure['label']) && $menuStructure['label'])
            <div class="px-4 py-2 mt-4 first:mt-0 invisible group-hover:visible">
                <span class="text-xs font-semibold text-slate-400 uppercase tracking-wider">{{ $menuStructure['label']->menu_name }}</span>
            </div>
            @endif

            <!-- Main Menus -->
            @if(isset($userMenuTree) && !empty($userMenuTree))
            @foreach($userMenuTree as $idxL1 => $l1Item)

            <!-- Category Label (Level 1) -->
            <div class="px-4 py-2 mt-4 first:mt-0 invisible group-hover:visible">
                <span class="text-xs font-semibold text-slate-400 uppercase tracking-wider">{{ $l1Item['menu_name'] }}</span>
            </div>

            <!-- Main Menus (Level 2) -->
            @if(!empty($l1Item['children']))
            @foreach($l1Item['children'] as $idxL2 => $l2Item)
            @if(empty($l2Item['children']))
            <!-- Direct Link under Category -->
            <div class="menu-item">
                <a href="{{ url($l2Item['menu']) }}" class="w-full flex items-center gap-3 px-4 py-3 {{ request()->path() == $l2Item['menu'] ? 'text-blue-600 bg-blue-50' : 'text-slate-600 hover:text-slate-900 hover:bg-slate-100' }} rounded-xs transition-colors duration-200">
                    <div class="w-5 flex-shrink-0 flex items-center justify-center text-slate-700">
                        @if(!empty(trim($l2Item['icon'])) && !str_contains($l2Item['icon'], '<span'))
                            {!! $l2Item['icon'] !!}
                            @else
                            <i class="fa-solid fa-users"></i>
                            @endif
                    </div>
                    <span class="font-base text-sm whitespace-nowrap opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex-1 text-left">{{ $l2Item['menu_name'] }}</span>
                </a>
            </div>
            @else
            <!-- Collapsible Menu with Children -->
            <div class="menu-item">
                <button type="button" onclick="toggleMenu(`l2-{{ $l2Item['id'] }}`)" class="w-full flex items-center gap-3 px-4 py-3 text-slate-600 hover:text-slate-900 hover:bg-slate-100 rounded-xs transition-colors duration-200">
                    <div class="w-5 flex-shrink-0 flex items-center justify-center text-slate-700">
                        @if(!empty(trim($l2Item['icon'])) && !str_contains($l2Item['icon'], '<span'))
                            {!! $l2Item['icon'] !!}
                            @else
                            <i class="fa-solid fa-users"></i>
                            @endif
                    </div>
                    <span class="font-base text-sm whitespace-nowrap opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex-1 text-left">{{ $l2Item['menu_name'] }}</span>
                    <i class="fa-solid fa-chevron-down text-xs opacity-0 group-hover:opacity-100 transition-all duration-300" id="arrow-l2-{{ $l2Item['id'] }}"></i>
                </button>

                <div class="hidden group-hover:block">
                    <div class="hidden pl-2 mt-1 space-y-1" id="l2-{{ $l2Item['id'] }}">
                        @foreach($l2Item['children'] as $idxL3 => $l3Item)
                        @if(!empty($l3Item['children']))
                        <!-- Level 3 Menu with Children -->
                        <div>
                            <button type="button" onclick="toggleMenu(`l3-{{ $l3Item['id'] }}`)" class="w-full flex items-center gap-3 px-4 py-2 text-slate-500 hover:text-slate-900 hover:bg-slate-50 rounded-xs transition-colors duration-200">
                                <div class="w-5 flex-shrink-0 flex items-center justify-center">
                                    @if(!empty(trim($l3Item['icon'])) && !str_contains($l3Item['icon'], '<span'))
                                        {!! $l3Item['icon'] !!}
                                        @else
                                        <i class="fa-solid fa-circle text-[6px]"></i>
                                        @endif
                                </div>
                                <span class="text-sm whitespace-nowrap flex-1 text-left">{{ $l3Item['menu_name'] }}</span>
                                <i class="fa-solid fa-chevron-down text-xs transition-all duration-300" id="arrow-l3-{{ $l3Item['id'] }}"></i>
                            </button>
                            <div class="hidden pl-3 mt-1 space-y-1" id="l3-{{ $l3Item['id'] }}">
                                @foreach($l3Item['children'] as $idxL4 => $l4Item)
                                <a href="{{ url($l4Item['menu']) }}" class="flex items-center gap-3 px-4 py-2 {{ request()->path() == $l4Item['menu'] ? 'text-blue-600 font-semibold' : 'text-slate-400 hover:text-slate-900 hover:bg-slate-50' }} rounded-xs transition-colors duration-200">
                                    <i class="fa-solid fa-circle text-[4px] w-5 flex-shrink-0 text-center"></i>
                                    <span class="text-sm whitespace-nowrap">{{ $l4Item['menu_name'] }}</span>
                                </a>
                                @endforeach
                            </div>
                        </div>
                        @else
                        <!-- Direct Link under Collapsible -->
                        <a href="{{ url($l3Item['menu']) }}" class="flex items-center gap-3 px-4 py-2 {{ request()->path() == $l3Item['menu'] ? 'text-blue-600 font-semibold' : 'text-slate-500 hover:text-slate-900 hover:bg-slate-50' }} rounded-xs transition-colors duration-200">
                            <div class="w-5 flex-shrink-0 flex items-center justify-center">
                                @if(!empty(trim($l3Item['icon'])) && !str_contains($l3Item['icon'], '<span'))
                                    {!! $l3Item['icon'] !!}
                                    @else
                                    <i class="fa-solid fa-circle text-[6px]"></i>
                                    @endif
                            </div>
                            <span class="text-sm whitespace-nowrap flex-1 text-left">{{ $l3Item['menu_name'] }}</span>
                        </a>
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>
            @endif
            @endforeach
            @endif

            @endforeach
            @endif
        </nav>
    </div>
</aside>

<script>
    function toggleMenu(menuId) {
        const submenu = document.getElementById(menuId);
        const arrow = document.getElementById('arrow-' + menuId);
        if (submenu) {
            submenu.classList.toggle('hidden');
            if (arrow) arrow.classList.toggle('rotate-180');
        }
    }
</script>