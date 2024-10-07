<?php
use Illuminate\Support\Facades\Auth;
use App\Models\Permission;

$current_auth = Auth::user();
$sidebar_menus = config('menu');
$token = $current_auth->createToken('admin_api')->accessToken;
$permissions = Permission::where("role_id",$current_auth->roleInfo->id)->get();
?>

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <span id="token" style="display: hidden;"> {{$token}} </span>
    <a href="" class="brand-link tw-flex">
        <h6 class="font-weight-bold d-inline mt-1 ml-3">
            {{ $current_auth->name }}({{ $current_auth->role }})
        </h6>
    </a>
    <div class="sidebar">
        <nav class="mt-3">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" data-accordion="false">
                @foreach ($sidebar_menus as $key => $menu)
                    @if (in_array($menu['route'], array_column($permissions->toArray(), 'route'), true))
                        <li class="nav-item">
                            <div
                                class="nav-link m-0 py-1 d-flex justify-content-between   menu-open {{ Request::routeIs($menu['route']) ? 'bg-secondary' : '' }}">
                                <a @if ($menu['target'] == true) target="_blank" @endif class=""
                                    @if ($menu['route_param']) href="{{ route($menu['route'], $menu['route_param']) }}" @else href="{{ route($menu['route']) }}" @endif>
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
                            @if ($menu['sub_menus'])
                                <ul class="nav p-0 d-none ml-3 mr-3" id="{{ $key }}_menu">
                                    @foreach ($menu['sub_menus'] as $sub_menu)
                                        @if (in_array($current_auth->role, $sub_menu['can']) || in_array('*', $sub_menu['can']))
                                            <li class="nav-item rounded">
                                                <a @if ($sub_menu['route_param'] != null) href="{{ route($sub_menu['route'], $sub_menu['route_param']) }}"   @else href="{{ route($sub_menu['route']) }}" @endif
                                                    class="nav-link text-info pt-1 pb-0">
                                                    <i class="ml-3 {{ $sub_menu['icon'] }}"></i>
                                                    <p class="ml-1" style="font-size: 14px">
                                                        {{ $sub_menu['display'] }}</p>
                                                </a>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            @endif
                        </li>
                    @endif
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

@end
<script>
    function showSubMenu(id) {
        var elementToToggle = document.getElementById(id);
        elementToToggle.classList.toggle('d-none');
    }

    const token = document.getElementById("token").innerHTML;
    localStorage.setItem("TOKEN", token);
    document.getElementById('token').remove();
</script>
