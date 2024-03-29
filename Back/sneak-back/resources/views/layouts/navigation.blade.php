<aside id="default-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0"
    aria-label="Sidebar">
    <div class="h-full bg-bleufd px-3 py-4 overflow-y-auto flex flex-col justify-between">
        <ul class="space-y-2 font-medium">
            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center w-full">
                <x-dropdown align="right" width="full">
                    <x-slot name="trigger">
                        <button
                            class=" w-full justify-center inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 hover:text-gray-700 dark:hover:bg-gradient-to-r from-orangedg to-orangefd dark:focus-within:bg-gradient-to-r from-orangedg to-orangefd focus:outline-none transition ease-in-out duration-300">
                            {{-- <div>{{ Auth::user()->name }}</div> --}}
                            <div class="flex flex-col items-center">
                                <img class="flex h-20 w-20 rounded-full content-center"
                                    src="https://i.ibb.co/Dgf1cW8/alen-alen-wer-1.jpg" alt="image description">
                            </div>

                            <div class="ml-1">
                                <svg class="fill-white h-8 w-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path class="fill-white" fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                        <span class="block p-2 text-center text-gray-900 rounded-lg dark:text-white">Bienvenue,
                            {{ Auth::user()->name }}</span>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profil') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault();
                                this.closest('form').submit();">
                                {{ __('Déconnexion') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
            <li>
                <a href="{{ route('dashboard') }}"
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-100 dark:hover:bg-gradient-to-r from-orangedg to-orangefd {{ Route::currentRouteName() === 'dashboard' ? 'dark:active: bg-gradient-to-r from-orangedg to-orangefd' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 28.421 26.192">
                        <path id="tachymetre-alt-plus-rapide"
                            d="M23.76,4.632a14.292,14.292,0,0,0-19.478,20.9,5.923,5.923,0,0,0,4.17,1.7H20.06A5.74,5.74,0,0,0,24.047,25.7,14.419,14.419,0,0,0,23.76,4.632ZM22.415,23.97a3.394,3.394,0,0,1-2.355.884H8.451A3.559,3.559,0,0,1,5.944,23.83a11.908,11.908,0,1,1,19.371-12.9,11.964,11.964,0,0,1-2.9,13.035Zm.238-8.673a1.189,1.189,0,0,1-1.345-1.012A7.167,7.167,0,0,0,14.252,8.15C7.99,8.03,4.7,16.127,9.268,20.421A1.192,1.192,0,0,1,7.6,22.128C1.518,16.32,5.859,5.662,14.252,5.763a9.562,9.562,0,0,1,9.412,8.183A1.192,1.192,0,0,1,22.655,15.3Zm.357,3.871a1.187,1.187,0,0,1-1.567.613l-5.785-2.549a2.389,2.389,0,1,1,.951-2.186l5.785,2.549a1.195,1.195,0,0,1,.617,1.573Z"
                            transform="translate(-0.06 -1.049)" fill="#fff" />
                    </svg>
                    <span class="ml-3">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ route('orders.index') }}"
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-100 dark:hover:bg-gradient-to-r from-orangedg to-orangefd dark:active:bgorange-500 {{ Route::currentRouteName() === 'orders.index' ? 'dark:active: bg-gradient-to-r from-orangedg to-orangefd' : '' }}">
                    <svg id="boite" xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                        viewBox="0 0 28.421 27.752">
                        <path id="Tracé_41" data-name="Tracé 41"
                            d="M28.421,6.36A6.445,6.445,0,0,0,21.908,0H6.513A6.445,6.445,0,0,0,0,6.36V7.516A3.982,3.982,0,0,0,1.184,10.34V21.392A6.445,6.445,0,0,0,7.7,27.752H20.723a6.445,6.445,0,0,0,6.513-6.36V10.34a3.981,3.981,0,0,0,1.184-2.824Zm-24.868,0a2.926,2.926,0,0,1,2.96-2.891H21.907A2.926,2.926,0,0,1,24.868,6.36V7.516a.585.585,0,0,1-.592.578H4.145a.585.585,0,0,1-.592-.578ZM23.684,21.392a2.926,2.926,0,0,1-2.96,2.891H7.7a2.926,2.926,0,0,1-2.96-2.891V11.563H23.684Z"
                            fill="#fff" />
                        <path id="Tracé_42" data-name="Tracé 42"
                            d="M173.814,256H184.3c1.738,0,3.147.793,3.147,1.771h0c0,.978-1.409,1.771-3.147,1.771h-10.49c-1.738,0-3.147-.793-3.147-1.771h0C170.667,256.793,172.076,256,173.814,256Z"
                            transform="translate(-164.849 -242.124)" fill="#fff" />
                    </svg>

                    <span class="flex-1 ml-3 whitespace-nowrap">Commandes</span>
                </a>
            </li>
            <li>
                <a href="{{ route('categories') }}"
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-100 dark:hover:bg-gradient-to-r from-orangedg to-orangefd {{ Route::currentRouteName() === 'categories' ? 'dark:active: bg-gradient-to-r from-orangedg to-orangefd' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 27.73 20">
                        <g id="liste" transform="translate(-0.5)">
                            <path id="Tracé_36" data-name="Tracé 36"
                                d="M7.028,6.148H23.474a1.075,1.075,0,0,0,0-2.148H7.028a1.075,1.075,0,0,0,0,2.148Z"
                                transform="translate(3.728 -2.624)" fill="#fff" />
                            <path id="Tracé_37" data-name="Tracé 37"
                                d="M23.474,11H7.028a1.075,1.075,0,0,0,0,2.148H23.474a1.075,1.075,0,0,0,0-2.148Z"
                                transform="translate(3.728 -1.869)" fill="#fff" />
                            <path id="Tracé_38" data-name="Tracé 38"
                                d="M23.474,18H7.028a1.075,1.075,0,0,0,0,2.148H23.474a1.075,1.075,0,0,0,0-2.148Z"
                                transform="translate(3.728 -1.136)" fill="#fff" />
                            <circle id="Ellipse_23" data-name="Ellipse 23" cx="2" cy="2" r="2"
                                transform="translate(0.5 0)" fill="#fff" />
                            <circle id="Ellipse_24" data-name="Ellipse 24" cx="2" cy="2" r="2"
                                transform="translate(0.5 8)" fill="#fff" />
                            <circle id="Ellipse_25" data-name="Ellipse 25" cx="2" cy="2" r="2"
                                transform="translate(0.5 16)" fill="#fff" />
                        </g>
                    </svg>
                    <span class="flex-1 ml-3 whitespace-nowrap">Catégories</span>
                </a>
            </li>
            <li>
                <a href="{{ route('products') }}"
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-100 dark:hover:bg-gradient-to-r from-orangedg to-orangefd {{ Route::currentRouteName() === 'products' ? 'dark:active: bg-gradient-to-r from-orangedg to-orangefd' : '' }}">
                    <svg id="shopping-bag-add" xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                        viewBox="0 0 28.421 29.333">
                        <path id="Tracé_39" data-name="Tracé 39"
                            d="M24.281,19.549H21.915V17.183a1.183,1.183,0,1,0-2.366,0v2.366H17.183a1.183,1.183,0,0,0,0,2.366h2.366v2.366a1.183,1.183,0,1,0,2.366,0V21.915h2.366a1.183,1.183,0,0,0,0-2.366Z"
                            transform="translate(2.957 3.869)" fill="#fff" />
                        <path id="Tracé_40" data-name="Tracé 40"
                            d="M24.868,7.333H21.315A7.222,7.222,0,0,0,14.21,0,7.222,7.222,0,0,0,7.105,7.333H3.553A3.611,3.611,0,0,0,0,11V23.222a6.025,6.025,0,0,0,5.921,6.111H16.579a1.223,1.223,0,0,0,0-2.444H5.921a3.611,3.611,0,0,1-3.553-3.667V11A1.2,1.2,0,0,1,3.553,9.778H7.105v2.444a1.185,1.185,0,1,0,2.368,0V9.778h9.474v2.444a1.185,1.185,0,1,0,2.368,0V9.778h3.553A1.2,1.2,0,0,1,26.052,11v6.111a1.185,1.185,0,1,0,2.368,0V11A3.611,3.611,0,0,0,24.868,7.333Zm-15.394,0A4.815,4.815,0,0,1,14.21,2.444a4.815,4.815,0,0,1,4.737,4.889Z"
                            fill="#fff" />
                    </svg>
                    <span class="flex-1 ml-3 whitespace-nowrap">Produits</span>
                </a>
            </li>
            <li>
                <a href="{{ route('keywords') }}"
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-100 dark:hover:bg-gradient-to-r from-orangedg to-orangefd {{ Route::currentRouteName() === 'keywords' ? 'dark:active: bg-gradient-to-r from-orangedg to-orangefd' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                        viewBox="0 0 28.421 26.842">
                        <path id="cle"
                            d="M8.889,26.842A8.733,8.733,0,0,1,.094,19.6a8.4,8.4,0,0,1,6.383-9.221,9.227,9.227,0,0,1,4.6-.054l9.368-8.842A5.5,5.5,0,0,1,24.241,0h0A4.08,4.08,0,0,1,28.43,3.955a4.9,4.9,0,0,1-1.573,3.587l-.8.752a2.46,2.46,0,0,1-1.675.654H22.507v1.118A2.306,2.306,0,0,1,20.137,12.3H18.953v1.774a2.16,2.16,0,0,1-.694,1.581l-.77.727a7.761,7.761,0,0,1-.056,4.339A8.8,8.8,0,0,1,9.818,26.8q-.463.045-.929.046Zm0-14.539a6.384,6.384,0,0,0-6.494,5.586A6.22,6.22,0,0,0,7.7,24.5a6.543,6.543,0,0,0,7.459-4.382,5.719,5.719,0,0,0-.118-3.691,1.074,1.074,0,0,1,.282-1.158l1.265-1.2V12.3a2.306,2.306,0,0,1,2.369-2.237h1.185V8.947A2.306,2.306,0,0,1,22.507,6.71h1.879l.8-.752a2.74,2.74,0,0,0,.879-2,1.772,1.772,0,0,0-1.818-1.718,3.077,3.077,0,0,0-2.124.831l-9.869,9.316a1.235,1.235,0,0,1-1.227.265A6.817,6.817,0,0,0,8.883,12.3ZM5.922,20.131a1.187,1.187,0,1,0,1.185-1.118A1.153,1.153,0,0,0,5.922,20.131Z"
                            transform="translate(-0.009 0)" fill="#fff" />
                    </svg>
                    <span class="flex-1 ml-3 whitespace-nowrap">Mots-clés</span>
                </a>
            </li>
            <li>
                <a href="{{ route('response') }}"
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-100 dark:hover:bg-gradient-to-r from-orangedg to-orangefd  {{ Route::currentRouteName() === 'response' ? 'dark:active: bg-gradient-to-r from-orangedg to-orangefd' : '' }}">
                    <svg height="20px" width="20px" version="1.1" id="_x32_"
                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                        viewBox="0 0 512 512" xml:space="preserve" fill="#ffffff">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <style type="text/css">
                                .st0 {
                                    fill: #ffffff;
                                }
                            </style>
                            <g>
                                <path class="st0"
                                    d="M255.995,3.769C114.605,3.769,0,88.187,0,217.102c0,79.518,49.369,148.08,139.713,201.623l148.909,89.506 l1.677-82.807C422.615,418.055,512,340.045,512,217.102C512,88.187,397.386,3.769,255.995,3.769z M288.175,387.319l-35.31,1.966 l-0.717,35.366l-0.346,16.928l-92.635-55.686C78.876,338.313,38.161,281.519,38.161,217.102 c0-115.006,109.583-175.172,217.834-175.172s217.844,60.167,217.844,175.172C473.839,317.211,404.429,380.843,288.175,387.319z">
                                </path>
                            </g>
                        </g>
                    </svg>
                    <span class="flex-1 ml-3 whitespace-nowrap">Réponse</span>
                </a>
            </li>
            <li>
                <a href="{{ route('user') }}"
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-100 dark:hover:bg-gradient-to-r from-orangedg to-orangefd  {{ Route::currentRouteName() === 'user' ? 'dark:active: bg-gradient-to-r from-orangedg to-orangefd' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                        xmlns:svgjs="http://svgjs.com/svgjs" width="20" height="20" x="0"
                        y="0" viewBox="0 0 24 24" style="enable-background:new 0 0 512 512"
                        xml:space="preserve">
                        <g>
                            <path
                                d="M16.043 14H7.957A4.963 4.963 0 0 0 3 18.957V24h18v-5.043A4.963 4.963 0 0 0 16.043 14Z"
                                fill="#ffffff" data-original="#000000"></path>
                            <circle cx="12" cy="6" r="6" fill="#ffffff"
                                data-original="#000000">
                            </circle>
                        </g>
                    </svg>
                    <span class="flex-1 ml-3 whitespace-nowrap">Utilisateurs</span>
                </a>
            </li>

        </ul>

        <div href="#" class="flex justify-center">
            <?xml version="1.0" encoding="utf-8"?>
            <svg height="125px" width="125px" version="1.1"
                id="Calque_2_00000080178973748945775020000016798577185982754969_" xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 313.5 195.2"
                style="enable-background:new 0 0 313.5 195.2;" xml:space="preserve">
                <style type="text/css">
                    .st0 {
                        fill: #FFFFFF;
                    }

                    .st1 {
                        fill: #E04D23;
                    }

                    .st2 {
                        font-family: 'Viga-Regular';
                    }

                    .st3 {
                        font-size: 57.1608px;
                    }
                </style>
                <g id="Calque_1-2">
                    <g>
                        <path class="st0"
                            d="M285.4,194.5c-3.6,0-7.1-0.1-10.7,0c-1.6,0-2.2-0.5-2-2.1c0.1-1.3,0-2.6,0-3.9c0-1.2-0.5-1.6-1.7-1.6
			s-1.8,0.4-1.7,1.6c0,0.2,0,0.4,0,0.6c-0.2,3.7-2.1,5.6-5.9,5.6c-2.8,0-5.6-0.1-8.4,0c-1.5,0-2.3-0.3-2.1-2c0.1-1.3-0.1-2.6,0-3.9
			c0.1-1.3-0.4-1.8-1.8-1.8c-1.6,0-1.5,0.8-1.6,1.9c-0.2,5.8-0.3,5.8-6.1,5.8c-2.5,0-5.1-0.1-7.6,0c-1.6,0.1-2.2-0.6-2.1-2.2
			c0.1-1.2,0-2.4,0-3.7c0-1,0.3-2.1-1.4-2c-1.5,0.1-2,0.7-1.9,2.1c0,0.3,0,0.6,0,0.8c0,3.2-1.6,4.9-4.8,4.9c-2.7,0-5.4,0-8.2,0.1
			c-1.7,0.1-2.5-0.5-2.3-2.2c0.1-1.3,0-2.6,0-3.9c0-0.8,0.2-1.7-1.2-1.7c-1.1,0.1-2.1,0.1-2.2,1.6c0,0.6,0,1.1,0,1.7
			c0,4.6,0,4.6-4.8,4.6c-14.4,0-28.9-0.1-43.3-0.1c-2,0-3.6-0.1-3.1-2.8c0.3-1.4-0.6-1.6-1.8-1.7c-1.5-0.1-1.8,0.6-1.6,1.8
			c0.4,2.2-0.7,2.7-2.7,2.6c-4.1-0.1-8.3-0.1-12.4,0c-1.8,0-2.6-0.5-2.4-2.4c0.2-1.2,0-2.1-1.7-2.1s-1.8,0.8-1.7,2.1
			c0.2,3.8-2.6,2.1-4.3,2.5c-2,0.4-2.8-0.5-2.4-2.5c0.3-1.9-0.7-2-2.2-2.1c-2.1-0.1-2,1.2-1.7,2.3c0.5,1.8-0.2,2.1-1.8,2.1
			c-5.8-0.1-11.6-0.1-17.4,0c-2,0-3.1-0.4-2.7-2.6c0.2-1.3-0.2-1.8-1.7-1.8c-1.3,0-1.9,0.4-1.7,1.8c0.5,3-1.4,2.8-3.4,2.8
			c-2.1,0.1-3.8,0-3.3-2.9c0.2-1.4-0.4-1.7-1.7-1.7c-1.4,0-1.9,0.5-1.7,1.8c0.4,2.4-0.8,2.7-2.9,2.7c-9.9,0.1-19.6-1.7-29.3-3.5
			c-10.9-2-21.5-4.7-32.1-7.8c-8.4-2.4-16.6-5.4-22.4-12.6c-1.1-1.4-2-2.9-3-4.4c-0.3-0.5-0.7-1.3-0.1-1.8c0.3-0.3,1.1-0.1,1.6,0
			c7.3,1.5,14.7,3,22,4.6c8.1,1.7,16.2,3.5,24.2,5.3c5.7,1.3,11.6,2.2,17.1,4.1c4.9,1.7,10,2.4,14.8,4.2c2.5,0.9,5,1.3,7.7,1.3
			c26.4-0.1,52.7-0.3,79.1,0c13.4,0.2,26.3-2.3,39.2-5.4c13.6-3.2,27.2-6.3,41.1-8.1c8.7-1.1,17.4-1.9,26.2-1.3
			c12.8,0.9,25.4,2.9,37.7,6.4c1.7,0.5,2.4,1.2,2.3,3.1c-0.2,2.5-0.2,5.1,0,7.6c0.3,2.8-1,4.1-3.3,5.1c-4.6,1.8-9.5,2.2-14.3,2.5
			c-3.5,0.2-6.9,0.1-10.4,0.1C285.4,194.2,285.4,194.4,285.4,194.5L285.4,194.5z" />
                        <path class="st0"
                            d="M83.9,124c-4.2,7-2,16.4,3,21.1c4.2,3.9,8,8.1,11.9,12.4c3,3.2,2.5,5.1-1.7,6.8c-1.7,0.7-3.5,1.1-5.4,1.2
			c-7.9,0.2-15.8-0.9-23.6-1.6c-8.8-0.7-17.5-2.3-26.1-3.6c-10.3-1.6-20.4-4.1-30.6-6.3c-1.5-0.3-3.1-0.5-4.6-1.1
			c-1.7-0.8-1.7-1.4-1.1-2.9c3.6-9.7,11.4-14.1,20.9-15.9c7.9-1.5,15.9-2.2,23.8-3.4c10.3-1.6,20.6-3.4,30.6-6.3
			C81.9,124.1,82.7,123.6,83.9,124L83.9,124z" />
                        <path class="st0"
                            d="M130.5,115.5c1.4,10.7,5.6,19.9,10.7,28.9c3.4,6,7.7,11.5,10.7,17.7c1.4,2.9,1.3,3.4-1.8,3.4
			c-12.9,0-25.7-0.1-38.6,0c-1.7,0-2.5-0.4-2.9-2.1c-0.8-3.5-3.7-5.6-6-7.9c-5.2-5.1-10-10.5-14.7-16c-2.4-2.8-3.8-6.4-2.1-10.1
			c1.4-3.1,4.5-4.5,7.6-5.7c0.9-0.3,1,0.6,1.3,1.1c0.7,1.2,1.3,2.5,2.1,3.7c0.9,1.4,2.2,2.1,3.8,1.6c1.8-0.5,2.9-1.7,3.2-3.5
			c0.1-1.1,0.4-2.4,0-3.3c-1.3-3.1,0.9-4,2.9-5c3.1-1.6,3.1-1.6,4.2,1.4c0.5,1.3,0.5,3.1,2.7,2.9c2.3-0.2,3.5-1.6,4.2-3.6
			c0.5-1.5-0.4-2.9-0.5-4.4c0-0.9-1.5-1.8-0.2-2.7c1.8-1.2,3.7-2.2,5.6-3.2c0.4-0.2,0.7,0.8,0.9,1.3c0.7,1.8,1.3,3.7,2.7,5.2
			C127.4,116.2,128.7,117.2,130.5,115.5L130.5,115.5z" />
                        <path class="st0"
                            d="M177.3,104.2c-12.6-1.7-24.1,3.3-34.2,12.4c-1.9,1.7-4.1,3-6.1,4.5c-1.2,0.9-1.9,0.5-2.1-0.9
			c-0.7-5-1.6-9.9-4-14.5c-0.2-0.3-0.2-1.1,0-1.3c2.1-2.4,4.5-4.4,7.3-6.1c1-0.6,1.1,0.4,1.3,0.8c0.6,1.2,1,2.6,1.7,3.8
			c0.8,1.3,2,1.8,3.6,1.7c1.6-0.2,2.5-1.3,2.6-2.5c0.3-2,0.8-4.2-0.3-6c-1.2-2.2-0.5-3.7,1.3-5c0.8-0.6,1.5-1.1,2.2-1.8
			c1.2-1.1,2-0.9,2.8,0.6c0.9,1.6,1.9,3.9,4.3,3.2c2.4-0.8,3.1-3,2.9-5.5c-0.1-1.2-0.1-2.4-0.6-3.6c-0.4-0.9-1.9-1.8-0.7-2.9
			c1.9-1.8,3.2-4.2,5.9-5c0.7-0.2,1.2,0.3,1.7,0.8c0.6,0.6,1.2,1.2,1.7,1.8c1.5,1.9,3.3,3.3,5.7,1.9c1.9-1.1,2.5-4.3,1.5-6.9
			c-0.6-1.4-1.6-2.5-2.7-3.6c-1.2-1.2-1.3-2.1,0.2-3.1c0.8-0.5,1.4-1.2,2.2-1.8c1.1-0.8,2-1.2,3.3,0.2c2.1,2.2,4.6,4,7.9,2.2
			c0.7-0.4,1.2,0.1,1.8,0.5c3.1,2,6.3,4.1,9.5,6c1.1,0.7,1.6,1.4,1.6,2.7c0.2,5.7,0.4,11.4-0.1,17.1c-0.4,4.2-4.4,8.6-8.5,9.6
			C186.9,104.6,182.7,104,177.3,104.2L177.3,104.2z" />
                        <path class="st0"
                            d="M203.4,77.4c20.9,12.8,41.1,25.2,61.9,38c-5,2-9.6,3.8-14.3,5.5c-1.9,0.7-3.8,2.1-5.8,1.7
			c-2.2-0.4-2.4-3-3.7-4.5c-4.2-4.7-9.4-8-14.6-11.2c-7.2-4.5-14.5-8.9-21.8-13.3c-0.9-0.5-1.8-0.9-1.7-2.2
			C203.5,86.9,203.4,82.5,203.4,77.4z" />
                        <path class="st0"
                            d="M264.1,109.7c-1,0.6-1.7-0.3-2.5-0.7c-10.3-5.6-19.9-12.2-29.9-18.2c-6.7-4-13.1-8.4-19.8-12.4
			c-6.8-4.1-13.4-8.4-20.2-12.4c-4.5-2.6-8.5-5.9-10.2-11.5c2.1,0.5,4.1,1.1,6.2,1.4c1.6,0.3,3.5,1,4.6-0.8c1.2-1.9-0.4-3.5-1.5-4.7
			c-1.6-1.8-3.7-3.1-5.9-4.9c3,0.3,5.5,1.3,8.2,1.1c1-0.1,2.3,0.4,2.8-0.8c0.5-1.3,0.6-2.7-0.5-4c-1.1-1.4-2.6-2.3-4.4-3.7
			c2.7-0.9,4.9-0.9,7.2-0.1c7.5,2.6,14.3,6.7,21.2,10.6c10.1,5.7,20.2,11.7,30.2,17.6c2.7,1.6,5.3,3.5,8.1,5c1.2,0.6,1,2,2,2.4
			c-1.4,1.7-0.2,3.4,0,5c0.8,5.9,1.8,11.8,2.5,17.6C262.9,100.8,265,105.1,264.1,109.7L264.1,109.7z" />
                        <path class="st0"
                            d="M310.5,145.5c0,3.1-0.1,5.7,0,8.2c0.2,2.3-0.9,2.5-2.7,2.1c-5-1-9.9-2.3-15-2.9c-10.5-1.4-21.2-2.4-31.8-1.4
			c-5.2,0.5-10.4,0.8-15.5,2.1c-1.7,0.4-1.8-0.4-1.6-1.8c0.8-4.5,3-7.9,7.3-9.6c4.9-1.9,10-3.6,15-5.5c4-1.5,4.8-2.8,4.7-6.9
			c-0.1-3.6-2.8-5.6-6.3-4.5c-5,1.6-9.9,3.3-14.8,4.9c-1.8,0.6-3.8-1.1-3.6-3c0.1-0.8,0.8-0.7,1.2-0.9c11.7-4.4,22.9-10.1,34.5-14.9
			c5.8-2.4,11.6-4.8,17.3-7.5c2.1-1,2.9-0.8,3.8,1.5c3.1,8.6,5.1,17.5,6.6,26.4C310.4,136.5,311,141.3,310.5,145.5L310.5,145.5z" />
                        <path class="st0"
                            d="M294.1,91.6c-7.2-4.9-13.8-9.4-20.5-13.9c-22.6-15.1-45.8-29.2-70.2-41.3c-2.2-1.1-4.4-2.3-7-2.7
			c-2.5-0.3-4.5,0.8-6.5,2c-0.5,0.3-0.9,1.2-1.6,0.4c-0.5-0.5-0.1-1.1,0.2-1.5c3-4.7,7-7.4,12.8-7.8c9.7-0.5,18.4,2.9,27,6.4
			c7,2.8,14,5.9,20.8,9.2c8.7,4.2,18,6.2,27.6,7.5c4.7,0.6,5.2,0.9,6.6,5.5c3.4,11.4,6.7,22.9,10.6,34.2C294,90,294,90.5,294.1,91.6
			L294.1,91.6z" />
                        <path class="st0"
                            d="M188.4,27.8c3.6-8.4,7.6-16.7,12.9-24.2c2.4-3.5,4.4-4.2,8.4-3.1c4.7,1.3,9.2,3.3,13.4,6
			c2.6,1.6,5.2,3.1,7.6,5c6.3,5.2,6.3,11.9,3.6,18.6c-0.7,1.8-1.8,0.8-2.7,0.5c-5.5-2-10.9-4.4-16.6-6c-9.4-2.8-18.2-2.6-26.3,3.6
			C188.7,28,188.6,27.9,188.4,27.8L188.4,27.8z" />
                        <path class="st0"
                            d="M264.1,109.7c0.9-4.6-1.2-8.9-1.8-13.3c-0.7-5.9-1.7-11.8-2.5-17.6c-0.2-1.6-1.4-3.3,0-5
			c4.8,1.1,8.3,4.4,12.2,6.9c6.8,4.4,13.5,8.9,20.3,13.4c2,1.3,4.7,1.6,5.7,4.4c0.6,1.6,0.5,2.2-1.1,2.9c-8.9,3.7-17.7,7.4-26.5,11
			C267.8,113.5,265.8,112.5,264.1,109.7L264.1,109.7z" />
                    </g>
                </g>
                <g>
                    <g>
                        <path class="st0"
                            d="M66.2,112.6c1.8,3.2,1.9,6.3,0.2,9c-1.7,2.7-4.7,4.7-9.1,5.9c-3.4,0.9-7.2,0.9-11.3,0c-2-0.5-4-1.4-5.8-2.8
			c-1.8-1.3-3.2-3-4.2-4.9c2.3-0.6,4.7-1.2,7-1.8c0.9,1.7,2.4,2.9,4.7,3.4c2.2,0.6,4.4,0.6,6.5,0c4.7-1.2,6.2-3.4,4.7-6.2
			c-1.2-2.3-3.5-3.2-6.8-2.7c-2.2,0.4-4.5,0.8-6.7,1.1c-3.4,0.4-6.5,0-9.2-1.2c-2.7-1.1-4.8-3.2-6.2-6c-1.4-2.9-1.3-5.5,0.5-8
			c1.7-2.5,4.6-4.2,8.5-5.3c4-1.1,7.5-1.2,10.9-0.3c3.3,1,5.7,2.8,7.3,5.6c-2.1,0.8-4.3,1.6-6.4,2.4c-2.1-2.5-4.9-3.2-8.4-2.2
			c-2.2,0.6-3.7,1.5-4.5,2.6s-1,2.2-0.4,3.4c0.6,1.1,1.5,1.9,2.7,2.3s2.6,0.5,4,0.3c2.2-0.4,4.3-0.7,6.5-1.2
			C57.8,104.8,63,106.8,66.2,112.6z" />
                        <path class="st0"
                            d="M85.9,74c6.1,9.8,12.4,19.8,18.9,30c0.7,1.1,0.9,2.1,0.7,3.3c-0.2,1.1-0.8,1.9-1.7,2.4
			c-2.3,1.2-5.1,0.9-8.2-0.9c-8-4.1-15.8-8.4-23.5-12.7c4.1,7.2,8.4,14.5,12.7,21.9c-2.5,1-5,2-7.5,2.9C70.8,109.3,64.4,98,58.3,87
			c2.3-0.9,4.5-1.8,6.8-2.7c9,5.1,18.2,10.2,27.6,15.1c-4.5-7.4-9-14.7-13.3-21.8C81.6,76.4,83.8,75.2,85.9,74z" />
                        <path class="st0"
                            d="M136.5,87.9c-3.8,3-7.7,5.9-11.7,8.6c-3.8,2.6-7,3.7-9.4,3.3c-2.4-0.3-4.8-2.2-6.9-5.5
			C103.1,86.1,97.9,78,92.7,70c7.1-4.4,14-9.2,20.5-14.5c1.3,1.8,2.6,3.7,4,5.6c-4.7,3.7-9.5,7.3-14.4,10.6c1.7,2.5,3.4,5.1,5.1,7.7
			c3.5-2.3,7-4.8,10.4-7.4c1.2,2,2.4,4,3.6,6c-3.3,2.5-6.7,4.8-10.1,7.1c1,1.5,2.1,3.1,3.1,4.6c0.9,1.3,1.8,2,2.7,2.1
			c0.9,0.1,2.2-0.4,3.8-1.5c3.8-2.6,7.5-5.3,11.1-8.2C133.7,84.1,135.1,86,136.5,87.9z" />
                        <path class="st0"
                            d="M164.9,60.7c-1.9,2.1-3.8,4.3-5.7,6.3c-2-1.2-4.1-2.5-6.1-3.7c-3.2,3.3-6.5,6.5-9.8,9.6
			c0.9,2.3,1.7,4.7,2.6,7c-2.1,1.9-4.2,3.7-6.4,5.5c-4-12.8-8.2-25.3-12.5-37.7c-0.4-1.4-0.5-2.5-0.3-3.3s0.6-1.6,1.3-2.3
			c0.7-0.7,1.4-1.1,2.1-1.1c0.7-0.1,1.6,0.2,2.7,0.9C143.2,48.5,153.9,54.8,164.9,60.7z M147.7,59.5c-4.4-3-8.8-6-13.1-9
			c2.1,5.2,4.1,10.5,6.2,15.8C143.1,64.1,145.4,61.9,147.7,59.5z" />
                        <path class="st0"
                            d="M165.5,25.8c7.4,1.3,14.9,2.3,22.5,2.9c-1.7,2.8-3.4,5.5-5.2,8.2c-5.4-0.8-10.8-1.7-16.1-2.8
			c0.6,3.3,1.1,6.6,1.6,9.9c1.8,1.9,3.5,3.9,5.3,5.8c-1.7,2.2-3.4,4.3-5.1,6.4c-9-10.1-17.7-20.1-26.1-30c1.6-1.9,3.1-3.9,4.6-5.9
			c4.8,5.5,9.7,11,14.7,16.5c-1.9-9.6-4-19.1-6.4-28.5c1.4-2.1,2.7-4.3,4-6.5C161.6,9.7,163.6,17.8,165.5,25.8z" />
                    </g>
                </g>
                <text transform="matrix(0.9998 -1.808521e-02 1.808521e-02 0.9998 156.526 159.3779)"
                    class="st1 st2 st3">ME</text>
                <text transform="matrix(0.9998 -1.808521e-02 1.808521e-02 0.9998 156.526 159.3779)"
                    class="st0 st2 st3">ME</text>
            </svg>
        </div>

    </div>
</aside>
