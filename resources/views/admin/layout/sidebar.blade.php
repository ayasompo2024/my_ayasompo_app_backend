<?php $sidebar_menus = [
    [
        'display' => 'Dashboard',
        'route' => 'admin.dashboard',
        'imag_path' => null,
        'target' => false,
        'icon' => 'bi bi-speedometer2',
        'sub_menus' => null,
    ],
    [
        'display' => 'Products',
        'route' => 'admin.product.index',
        'imag_path' => null,
        'target' => false,
        'icon' => 'bi bi-postcard-heart',
        'sub_menus' => null,
    ],
    [
        'display' => 'Banner',
        'route' => 'admin.banner.index',
        'imag_path' => null,
        'target' => false,
        'icon' => 'bi bi-card-image',
        'sub_menus' => null,
    ],
    [
        'display' => 'Property Type',
        'route' => 'admin.property.type.index',
        'imag_path' => null,
        'target' => false,
        'icon' => 'bi bi-boxes',
        'sub_menus' => null,
    ],
    [
        'display' => 'Product Code Lists',
        'route' => 'admin.product-code-list.index',
        'imag_path' => null,
        'target' => false,
        'icon' => 'bi bi-boxes',
        'sub_menus' => null,
    ],
    [
        'display' => 'Request Form(Inquery)',
        'route' => 'admin.request-form.lists',
        'imag_path' => null,
        'target' => false,
        'icon' => 'bi-person-vcard',
        'sub_menus' => [
            [
                'display' => 'Request Form Type',
                'route' => 'admin.request-form.type.index',
                'imag_path' => null,
                'target' => false,
                'icon' => 'bi-person-vcard',
                'sub_menus' => null,
            ],
        ],
    ],
    [
        'display' => 'E-Claim',
        'route' => 'admin.claim-case.index',
        'imag_path' => null,
        'target' => false,
        'icon' => 'bi bi-piggy-bank-fill',
        'sub_menus' => [
            [
                'display' => 'Motor',
                'route' => 'admin.claim-case.motor',
                'imag_path' => null,
                'target' => false,
                'icon' => 'bi bi-car-front',
                'sub_menus' => null,
            ],
            [
                'display' => 'Non Motor',
                'route' => 'admin.claim-case.non-motor',
                'imag_path' => null,
                'target' => false,
                'icon' => 'bi bi-collection',
                'sub_menus' => null,
            ],
        ],
    ],
    [
        'display' => 'Customers',
        'route' => 'admin.customer.index',
        'imag_path' => null,
        'target' => false,
        'icon' => 'bi bi-people-fill',
        'sub_menus' => null,
    ],
    [
        'display' => 'Messaging',
        'route' => 'admin.messaging.index',
        'imag_path' => null,
        'target' => false,
        'icon' => 'bi bi-bell-fill',
        'sub_menus' => [
            [
                'display' => 'Recent Message',
                'route' => 'admin.messaging.history',
                'imag_path' => null,
                'target' => false,
                'icon' => 'bi bi-clock-history',
                'sub_menus' => null,
            ],
        ],
    ],
    [
        'display' => 'Location Map',
        'route' => 'admin.location-map.index',
        'imag_path' => null,
        'target' => false,
        'icon' => 'bi bi-geo-alt-fill',
        'sub_menus' => [
            [
                'display' => 'Category',
                'route' => 'admin.location-map-category.index',
                'imag_path' => null,
                'target' => false,
                'icon' => 'bi bi-map-fill',
                'sub_menus' => null,
            ],
        ],
    ],
    [
        'display' => 'Dev Operation',
        'route' => 'dev.doc.index',
        'imag_path' => null,
        'target' => true,
        'icon' => 'bi bi-code-slash',
        'sub_menus' => [
            [
                'display' => 'ENV Value',
                'route' => 'dev.show-env-value',
                'imag_path' => null,
                'target' => true,
                'icon' => 'bi bi-columns-gap',
                'sub_menus' => null,
            ],
            [
                'display' => 'One Click Deployment',
                'route' => 'dev.code.one-click-deploy',
                'imag_path' => null,
                'target' => true,
                'icon' => 'bi bi-rocket',
                'sub_menus' => null,
            ],
            [
                'display' => 'Terminal',
                'route' => 'dev.terminal',
                'imag_path' => null,
                'target' => true,
                'icon' => 'bi bi-terminal',
                'sub_menus' => null,
            ],
            [
                'display' => 'REST API',
                'route' => 'dev.doc.index',
                'imag_path' => null,
                'target' => true,
                'icon' => 'bi-filetype-doc',
                'sub_menus' => null,
            ],
            [
                'display' => 'Backup',
                'route' => 'dev.backup.database.show_backup_file',
                'imag_path' => null,
                'target' => false,
                'icon' => 'bi bi-database-fill-down',
                'sub_menus' => null,
            ],
            // [
            //     'display' => 'Logs',
            //     'route' => 'admin.dashboard.logs',
            //     'imag_path' => null,
            //     'target' => false,
            //     'icon' => 'bi bi-file-earmark-medical-fill',
            //     'sub_menus' => null,
            // ],
        ],
    ],

    // [
    //     'display' => 'Setting',
    //     'route' => 'admin.setting.index',
    //     'imag_path' => null,
    // 'target' => false,
    //     'icon' => 'bi bi-database-fill-down',
    //     'sub_menus' => [
    //         [
    //             'display' => 'SMS',
    //             'route' => 'admin.setting.sms.info',
    //             'imag_path' => null,
    // 'target' => false,
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
        <h6 class=" font-weight-bold d-inline mt-1 ml-1">{{ Auth::user()->name }}</h6>
    </a>

    <!-- Sidebar -->
    <div class="sidebar ">
        <nav class="mt-3">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" data-accordion="false">
                @foreach ($sidebar_menus as $key => $menu)
                    <li class="nav-item">
                        <div
                            class="nav-link m-0 py-1 d-flex justify-content-between   menu-open {{ Request::routeIs($menu['route']) ? 'bg-secondary' : '' }}">

                            <a @if ($menu['target'] == true) target="_blank" @endif class="text-info"
                                href="{{ route($menu['route']) }}">
                                @if ($menu['imag_path'])
                                    <img src="{{ asset($menu['imag_path']) }}" alt="AYA Logo" style="height: 30px">
                                @else
                                    &nbsp;<i class="{{ $menu['icon'] }}"></i>
                                @endif
                                <p class="ml-2 p-0">{{ $menu['display'] }}
                                </p>
                            </a>
                            @if ($menu['sub_menus'])
                                <button onclick="showSubMenu('{{ $key }}_menu')" class="btn btn-sm p-0">
                                    <i class="bi bi-caret-down-fill text-info p-0"></i></button>
                            @endif
                        </div>
                        {{-- sub-menu --}}
                        @if ($menu['sub_menus'])
                            <ul class="nav p-0 d-none" id="{{ $key }}_menu">
                                @foreach ($menu['sub_menus'] as $sub_menu)
                                    <li
                                        class="nav-item rounded {{ Request::routeIs($sub_menu['route']) ? 'bg-light' : '' }}">
                                        <a href="{{ route($sub_menu['route']) }}" class="nav-link text-info pt-1 pb-0">
                                            <i class="ml-4 {{ $sub_menu['icon'] }}"></i>
                                            <p class="ml-1">{{ $sub_menu['display'] }}</p>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </li>
                @endforeach

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
