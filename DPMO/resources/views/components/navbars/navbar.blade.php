@auth()
    @include('components.navbars.navs.auth')
@endauth

@guest()
    @include('components.navbars.navs.guest')
@endguest