<div class="sidebar">
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="#" class="simple-text logo-mini">
                <img src="{{ Vite::asset('resources/img/company.png') }}" alt="">
            </a>
            <a href="#" class="simple-text logo-normal">STRATO SOLUTIONS</a>
        </div>
        <ul class="nav">
            @foreach ($menus as $parent)
                @if ($parent->menus->isEmpty()) 
                    <li class="{{ request()->is(ltrim($parent->url, '/')) ? 'active' : '' }}">
                        <a href="{{ $parent->url }}">
                            <i class="{{ $parent->icon }}"></i>
                            <p>{{ $parent->parentmenu }}</p>
                        </a>
                    </li>
                @else
                    <li>
                        <a data-toggle="collapse" href="#menu-{{ $parent->parentid }}" aria-expanded="false">
                            <i class="{{ $parent->icon }}"></i>
                            <span class="nav-link-text">{{ $parent->parentmenu }}</span>
                            <b class="caret mt-1"></b>
                        </a>
                        <div class="collapse" id="menu-{{ $parent->parentid }}">
                            <ul class="nav pl-4">
                                @foreach ($parent->menus as $submenu)
                                    <li class="{{ request()->is(ltrim($submenu->url, '/')) ? 'active' : '' }}">
                                        <a href="{{ $submenu->url }}">
                                            <i class="{{ $submenu->icon }}"></i>
                                            <p>{{ $submenu->menu }}</p>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </li>
                @endif
            @endforeach
        </ul>
    </div>
</div>
