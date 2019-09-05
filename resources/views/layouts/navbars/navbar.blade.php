@auth()
    {{-- cuando esta autenticado el usuario se llama esta barra de navegacion --}}
    @include('layouts.navbars.navs.auth')
@endauth

@guest()
    {{-- cuando es invitado sin Loguearse --}}
    @include('layouts.navbars.navs.guest')
@endguest
