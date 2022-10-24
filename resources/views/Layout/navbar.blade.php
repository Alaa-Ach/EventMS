{{-- <x-app-layout>
</x-app-layout> --}}
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Navigation Bar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>




        <div class="collapse navbar-collapse" id="navbarNavDropdown">






            <ul class="navbar-nav nav-pills">
                @if(Auth::user()->isAdmin)
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('AddForm_CG') ? 'active' : '' }}" aria-current="page"
                        href={{ route('AddForm_CG') }}>Formulaire Congrès</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ Route::is('AddForm_WC') ? 'active' : '' }}" aria-current="page"
                        href={{ route('AddForm_WC') }}>Formulaire Competition</a>
                </li>
                @endif




                <li class="nav-item dropdown">
                    <li class="nav-item">


                        <div class="d-flex dropdown-hover-all">
                            <div class="dropdown mt-3">
                                <button  class="btn btn-primary-outline dropdown-toggle" type="button" id="dropdownMenuButton222" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                    <span style="color: #959799">Requête</span>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton222">
                                    {{-- <a class="dropdown-item {{ Route::is('Queries.Transport') ? 'active' : '' }}" href={{ route('Queries.Transport') }}>Transport</a> --}}
                                    <a class="dropdown-item {{ Route::is('Queries.VolsAllDate') ? 'active' : '' }}" href={{ route('Queries.VolsAllDate') }}>Les Vols Tous Les Dates</a>
                                    <a class="dropdown-item {{ Route::is('Queries.Vols') ? 'active' : '' }}" href={{ route('Queries.Vols') }}>Les Vols</a>


                                    <div class="dropdown dropend">
                                        <a class="dropdown-item dropdown-toggle" href="#" id="dropdown-layouts" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Les Informations</a>
                                        <div class="dropdown-menu" aria-labelledby="dropdown-layouts">
                                            <h6 class="dropdown-header"><b>Congrès</b></h6>
                                            <a class="dropdown-item {{ Route::is('Queries.Compagnons') ? 'active' : '' }}" href={{ route('Queries.Compagnons') }}>Les Compagnons</a>
                                            <a class="dropdown-item {{ Route::is('Queries.Participants') ? 'active' : '' }}" href={{ route('Queries.Participants') }}>Les Participants</a>

                                            <hr class="dropdown-divider">

                                            <h6 class="dropdown-header"><b>Competions</b></h6>
                                            <a class="dropdown-item {{ Route::is('Queries.Coupe') ? 'active' : '' }}"  href={{ route('Queries.Coupe') }}>Les equipes</a>

                                        </div>
                                    </div>


                                    <div class="dropdown dropend">
                                        <a class="dropdown-item dropdown-toggle" href="#" id="dropdown-layouts" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Les Reservations</a>
                                        <div class="dropdown-menu" aria-labelledby="dropdown-layouts">

                                            <a class="dropdown-item {{ Route::is('Queries.Reservation_CG') ? 'active' : '' }}" href={{ route('Queries.Reservation_CG') }}>Les Reservations Du Congrès</a>
                                            <a class="dropdown-item {{ Route::is('Queries.Reservation_WC') ? 'active' : '' }}" href={{ route('Queries.Reservation_WC') }}>Les Reservations Des équipes</a>


                                        </div>
                                    </div>


                                </div>
                              </div>
                          </div>

                    </li>

                </li>
            </ul>
        </div>



    </div>

    <div class="btn-group  mx-5 pull-right">
        <button type="button" class="btn btn-light dropdown-toggle transition" data-bs-toggle="dropdown" aria-expanded="false">
            {{ Auth::user()->name }}
        </button>
        <ul class="dropdown-menu">
            <li>
                <h6 class="dropdown-header text-xs my-1">Manage Account </h6>
            </li>
            <li
                class="block px-2 py-2 text-s leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition">
                <a href="{{ route('profile.show') }}">Profile</a></li>

            <div class="border-t border-gray-100"></div>
            <li class="block px-4 py-2 text-s leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition">

                <form method="POST" action="{{ route('logout') }}" x-data>
                    @csrf

                    <button class="dropdown-item ">Déconnecter</button>
                </form>



            </li>
        </ul>
    </div>

    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    @livewireStyles

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
    {{-- <div class="m-3 ">
        <x-jet-dropdown align="right" width="48">
            <x-slot name="trigger">
                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                <button
                class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                <img class="h-8 w-8 rounded-full object-cover"
                    src="{{ Auth::user()->profile_photo_url }}"
                    alt="{{ Auth::user()->name }}" />
            </button>
                @else
                    <span class="inline-flex rounded-md">
                        <button type="button"
                        class="inline-flex items-center px-5 py-3 border border-transparent text-sm leading-4 font-small rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition">
                        {{ Auth::user()->name }}

                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>
                    </span>
                @endif
            </x-slot>

            <x-slot  name="content">
                <!-- Account Management -->
                <div class="block px-4 py-2 text-xs text-gray-400">
                    <span style="font-size: 13px">    {{ __('Manage Account') }} </span>
                </div>

                <x-jet-dropdown-link href="{{ route('profile.show') }}">
                  <span style="font-size: 13px">  {{ __('Profile') }}</span>
                </x-jet-dropdown-link>

                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                    <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                        {{ __('API Tokens') }}
                    </x-jet-dropdown-link>
                @endif

                <div class="border-t border-gray-100"></div>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}" x-data>
                    @csrf

                    <x-jet-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                        <span style="font-size: 13px">   {{ __('Log Out') }}</span>
                    </x-jet-dropdown-link>
                </form>
            </x-slot>
        </x-jet-dropdown>
    </div> --}}






</nav>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

<script>

(function($bs) {
    const CLASS_NAME = 'has-child-dropdown-show';
    $bs.Dropdown.prototype.toggle = function(_orginal) {
        return function() {
            document.querySelectorAll('.' + CLASS_NAME).forEach(function(e) {
                e.classList.remove(CLASS_NAME);
            });
            let dd = this._element.closest('.dropdown').parentNode.closest('.dropdown');
            for (; dd && dd !== document; dd = dd.parentNode.closest('.dropdown')) {
                dd.classList.add(CLASS_NAME);
            }
            return _orginal.call(this);
        }
    }($bs.Dropdown.prototype.toggle);

    document.querySelectorAll('.dropdown').forEach(function(dd) {
        dd.addEventListener('hide.bs.dropdown', function(e) {
            if (this.classList.contains(CLASS_NAME)) {
                this.classList.remove(CLASS_NAME);
                e.preventDefault();
            }
            e.stopPropagation(); // do not need pop in multi level mode
        });
    });

    // for hover
    document.querySelectorAll('.dropdown-hover, .dropdown-hover-all .dropdown').forEach(function(dd) {
        dd.addEventListener('mouseenter', function(e) {
            let toggle = e.target.querySelector(':scope>[data-bs-toggle="dropdown"]');
            if (!toggle.classList.contains('show')) {
                $bs.Dropdown.getOrCreateInstance(toggle).toggle();
                dd.classList.add(CLASS_NAME);
                $bs.Dropdown.clearMenus();
            }
        });
        dd.addEventListener('mouseleave', function(e) {
            let toggle = e.target.querySelector(':scope>[data-bs-toggle="dropdown"]');
            if (toggle.classList.contains('show')) {
                $bs.Dropdown.getOrCreateInstance(toggle).toggle();
            }
        });
    });
})(bootstrap);





</script>
