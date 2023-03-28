<aside id="default-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0"
    aria-label="Sidebar">
    <div class="h-full bg-bleufd px-3 py-4 overflow-y-auto">
        <ul class="space-y-2 font-medium">
            <li>
                <a href="{{ route('dashboard') }}"
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-100 dark:hover:bg-gradient-to-r from-orangedg to-orangefd">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 28.421 26.192">
                        <path id="tachymetre-alt-plus-rapide"
                            d="M23.76,4.632a14.292,14.292,0,0,0-19.478,20.9,5.923,5.923,0,0,0,4.17,1.7H20.06A5.74,5.74,0,0,0,24.047,25.7,14.419,14.419,0,0,0,23.76,4.632ZM22.415,23.97a3.394,3.394,0,0,1-2.355.884H8.451A3.559,3.559,0,0,1,5.944,23.83a11.908,11.908,0,1,1,19.371-12.9,11.964,11.964,0,0,1-2.9,13.035Zm.238-8.673a1.189,1.189,0,0,1-1.345-1.012A7.167,7.167,0,0,0,14.252,8.15C7.99,8.03,4.7,16.127,9.268,20.421A1.192,1.192,0,0,1,7.6,22.128C1.518,16.32,5.859,5.662,14.252,5.763a9.562,9.562,0,0,1,9.412,8.183A1.192,1.192,0,0,1,22.655,15.3Zm.357,3.871a1.187,1.187,0,0,1-1.567.613l-5.785-2.549a2.389,2.389,0,1,1,.951-2.186l5.785,2.549a1.195,1.195,0,0,1,.617,1.573Z"
                            transform="translate(-0.06 -1.049)" fill="#fff" />
                    </svg>
                    <span class="ml-3">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ route('orders') }}"
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-100 dark:hover:bg-gradient-to-r from-orangedg to-orangefd">
                    <svg id="boite" xmlns="http://www.w3.org/2000/svg" width="25" height="25"
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
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-100 dark:hover:bg-gradient-to-r from-orangedg to-orangefd">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 27.73 20">
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
                <a href="{{ route('produits') }}"
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-100 dark:hover:bg-gradient-to-r from-orangedg to-orangefd">
                    <svg id="shopping-bag-add" xmlns="http://www.w3.org/2000/svg" width="25" height="25"
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
                <a href="{{ route('keyword') }}"
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-100 dark:hover:bg-gradient-to-r from-orangedg to-orangefd">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 28.421 26.842">
                        <path id="cle"
                            d="M8.889,26.842A8.733,8.733,0,0,1,.094,19.6a8.4,8.4,0,0,1,6.383-9.221,9.227,9.227,0,0,1,4.6-.054l9.368-8.842A5.5,5.5,0,0,1,24.241,0h0A4.08,4.08,0,0,1,28.43,3.955a4.9,4.9,0,0,1-1.573,3.587l-.8.752a2.46,2.46,0,0,1-1.675.654H22.507v1.118A2.306,2.306,0,0,1,20.137,12.3H18.953v1.774a2.16,2.16,0,0,1-.694,1.581l-.77.727a7.761,7.761,0,0,1-.056,4.339A8.8,8.8,0,0,1,9.818,26.8q-.463.045-.929.046Zm0-14.539a6.384,6.384,0,0,0-6.494,5.586A6.22,6.22,0,0,0,7.7,24.5a6.543,6.543,0,0,0,7.459-4.382,5.719,5.719,0,0,0-.118-3.691,1.074,1.074,0,0,1,.282-1.158l1.265-1.2V12.3a2.306,2.306,0,0,1,2.369-2.237h1.185V8.947A2.306,2.306,0,0,1,22.507,6.71h1.879l.8-.752a2.74,2.74,0,0,0,.879-2,1.772,1.772,0,0,0-1.818-1.718,3.077,3.077,0,0,0-2.124.831l-9.869,9.316a1.235,1.235,0,0,1-1.227.265A6.817,6.817,0,0,0,8.883,12.3ZM5.922,20.131a1.187,1.187,0,1,0,1.185-1.118A1.153,1.153,0,0,0,5.922,20.131Z"
                            transform="translate(-0.009 0)" fill="#fff" />
                    </svg>
                    <span class="flex-1 ml-3 whitespace-nowrap">Mots-clés</span>
                </a>
            </li>
            <li>
                <a href="{{ route('user') }}"
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-100 dark:hover:bg-gradient-to-r from-orangedg to-orangefd">
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                        xmlns:svgjs="http://svgjs.com/svgjs" width="25" height="25" x="0"
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
            <li>
                <a href="{{ route('setting') }}"
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gradient-to-r from-orangedg to-orangefd">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                        viewBox="0 0 24.827 28.537">
                        <path id="Tracé_45" data-name="Tracé 45"
                            d="M26.125,21.4a3.388,3.388,0,0,0,4.71,1.31l0,0,.512-.306a10.244,10.244,0,0,0,3.274,1.955v.61a3.451,3.451,0,1,0,6.9,0v-.61A10.244,10.244,0,0,0,44.8,22.4l.514.307A3.39,3.39,0,0,0,50.025,21.4a3.637,3.637,0,0,0-1.265-4.875h0l-.51-.3a11.186,11.186,0,0,0,0-3.912l.51-.3a3.637,3.637,0,0,0,1.265-4.875,3.39,3.39,0,0,0-4.714-1.308l-.512.306a10.243,10.243,0,0,0-3.277-1.951v-.61a3.451,3.451,0,1,0-6.9,0v.61a10.243,10.243,0,0,0-3.274,1.957l-.514-.308a3.389,3.389,0,0,0-4.714,1.308,3.637,3.637,0,0,0,1.265,4.875h0l.51.3a11.186,11.186,0,0,0,0,3.912l-.51.3A3.642,3.642,0,0,0,26.125,21.4ZM38.074,9.513a4.68,4.68,0,0,1,4.6,4.756,4.6,4.6,0,1,1-9.2,0A4.68,4.68,0,0,1,38.074,9.513Z"
                            transform="translate(-25.66)" fill="#fff" />
                    </svg>
                    <span class="flex-1 ml-3 whitespace-nowrap">Réglages</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
