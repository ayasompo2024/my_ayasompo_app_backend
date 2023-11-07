<?php $sidebar_menus = [
    [
        'display' => 'Dashboard',
        'route' => 'admin.dashboard',
        'imag_path' => null,
        'icon' => 'bi bi-speedometer2',
        'sub_menus' => null,
    ],
    [
        'display' => 'Products',
        'route' => 'admin.product.index',
        'imag_path' => null,
        'icon' => 'bi bi-postcard-heart',
        'sub_menus' => null,
    ],
    [
        'display' => 'Banner',
        'route' => 'admin.banner.index',
        'imag_path' => null,
        'icon' => 'bi bi-card-image',
        'sub_menus' => null,
    ],
    [
        'display' => 'Property Type',
        'route' => 'admin.property.type.index',
        'imag_path' => null,
        'icon' => 'bi bi-boxes',
        'sub_menus' => null,
    ],
    [
        'display' => 'Product Code Lists',
        'route' => 'admin.product-code-list.index',
        'imag_path' => null,
        'icon' => 'bi bi-boxes',
        'sub_menus' => null,
    ],
    [
        'display' => 'Request Form',
        'route' => 'admin.request-form.lists',
        'imag_path' => null,
        'icon' => 'bi-person-vcard',
        'sub_menus' => [
            [
                'display' => 'Request Form Type',
                'route' => 'admin.request-form.type.index',
                'imag_path' => null,
                'icon' => 'bi-person-vcard',
                'sub_menus' => null,
            ],
        ],
    ],
    [
        'display' => 'Customers',
        'route' => 'admin.customer.index',
        'imag_path' => null,
        'icon' => 'bi bi-people',
        'sub_menus' => null,
    ],
    [
        'display' => 'REST API',
        'route' => 'doc.index',
        'imag_path' => null,
        'icon' => 'bi bi-code-slash',
        'sub_menus' => null,
    ],
    [
        'display' => 'Backup',
        'route' => 'admin.backup.database.show_backup_file',
        'imag_path' => null,
        'icon' => 'bi bi-database-fill-down',
        'sub_menus' => null,
    ],
    // [
    //     'display' => 'Setting',
    //     'route' => 'admin.setting.index',
    //     'imag_path' => null,
    //     'icon' => 'bi bi-database-fill-down',
    //     'sub_menus' => [
    //         [
    //             'display' => 'SMS',
    //             'route' => 'admin.setting.sms.info',
    //             'imag_path' => null,
    //             'icon' => 'bi bi-chat-square-heart-fill',
    //             'sub_menus' => null,
    //         ],
    //     ]
    // ],
];
?>



<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Brand Logo -->
    <a href="" class="brand-link tw-flex">
        <h6 class=" font-weight-bold d-inline mt-1 ml-1">Admin</h6>
    </a>

    <!-- Sidebar -->
    <div class="sidebar ">
        <nav class="mt-3">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                @foreach ($sidebar_menus as $key => $menu)
                    <li class="nav-item ">
                        <div
                            class="nav-link m-0 py-1 d-flex justify-content-between menu-open {{ Request::routeIs($menu['route']) ? 'bg-light' : '' }}">

                            <a href="{{ route($menu['route']) }}">
                                @if ($menu['imag_path'])
                                    <img src="{{ asset($menu['imag_path']) }}" alt="AYA Logo" style="height: 30px">
                                @else
                                    &nbsp;<i class="{{ $menu['icon'] }}"></i>
                                @endif
                                <p class="ml-2 p-0">{{ $menu['display'] }}
                                </p>
                            </a>
                            @if ($menu['sub_menus'])
                                <button onclick="showSubMenu('{{ $key }}_menu')" class="btn btn-sm">
                                    <i class="bi bi-caret-down-fill text-info p-0"></i></button>
                            @endif
                        </div>

                        {{-- sub-menu --}}
                        @if ($menu['sub_menus'])
                            <ul class="nav" id="{{ $key }}_menu">
                                @foreach ($menu['sub_menus'] as $sub_menu)
                                    <li
                                        class="nav-item  p-0 {{ Request::routeIs($sub_menu['route']) ? 'bg-light' : '' }}">
                                        <a href="{{ route($sub_menu['route']) }}" class="nav-link text-info py-0">
                                            <i class="ml-4 {{ $sub_menu['icon'] }}"></i>
                                            <p class="ml-1">{{ $sub_menu['display'] }}</p>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </li>
                @endforeach

                <!-- Logout link -->
                <li class="nav-item">
                    <a href="{{ route('logout') }}" class="nav-link"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="bi bi-box-arrow-right mr-2 ml-1"></i>
                        Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>

            </ul>
        </nav>
    </div>

</aside>

<script>
    function showSubMenu(id) {
        var elementToToggle = document.getElementById(id);
        console.log(elementToToggle);
        elementToToggle.classList.toggle('d-none');
    }
</script>
