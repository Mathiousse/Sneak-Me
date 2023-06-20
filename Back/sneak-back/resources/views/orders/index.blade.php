<x-app-layout>
    <x-slot name="header">
        {{ __('Commandes') }}
    </x-slot>

    {{ __('Commandes effectuées') }}
    <br>
    <br>


    <div class="overflow-x-auto">
        <div class="table-container">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Numéro de commande
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Utilisateur
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Status
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Prix
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Articles
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Quantité
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Total
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                                {{ $order->id }}
                            </td>
                            <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                                {{ $order->user->email }}
                            </td>
                            <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                                {{ $order->status ? 'Terminée' : 'En cours' }}
                            </td>
                            <td class="px-6 py-4 font-medium text-gray-900 dark:text-white prices">
                                @foreach ($order->items as $item)
                                    {{ $total = (intval($item->quantity) * intval($item->product->price)) / 100 }} €
                                    <br>
                                @endforeach
                            </td>
                            {{-- [{"id":1,"order_id":1,"product_id":1,"quantity":3,"price":0,"created_at":"2023-06-19T09:21:15.000000Z","updated_at":"2023-06-19T09:21:15.000000Z"}] --}}
                            <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                                {{-- {{ $order->items }} --}}
                                @foreach ($order->items as $item)
                                    {{ $item->product->name }}
                                    <br>
                                @endforeach
                            </td>
                            <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                                {{-- {{ $order->items }} --}}
                                @foreach ($order->items as $item)
                                    {{ $item->quantity }}
                                    <br>
                                @endforeach
                            </td>
                            <td class="px-6 py-4 font-medium text-gray-900 dark:text-white total">
                                0
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex flex-col sm:flex-row">
                                    <a href="{{ route('orders.index', $order) }}"
                                        class="edit font-medium text-blue-600 dark:text-blue-500 hover:underline mb-2 sm:mb-0 sm:mr-2">
                                        Éditer
                                    </a>
                                    <form action="{{ route('orders.index', $order) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce mot-clé ?')"
                                            class="delete font-medium text-red-600 dark:text-red-500 hover:underline">
                                            Supprimer
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    </div>
    <script>
        function closeToast() {
            // target element that will be dismissed
            const targetEl = document.querySelector('#toast-target');

            // optional trigger element
            const triggerEl = document.querySelector('#toast-trigger');

            // options object
            const options = {
                transition: 'transition-opacity',
                duration: 1000,
                timing: 'ease-out',

                // callback functions
                onHide: (context, targetEl) => {
                    console.log('element has been dismissed')
                }
            };

            const dismiss = new Dismiss(targetEl, triggerEl, options);

            dismiss.hide()
        }

        let prices = document.querySelector(".prices").textContent.match(/\d+/g).map(Number),
            total = 0
        prices.forEach(price => {
            total += price
        });
        document.querySelector(".total").textContent = total + " €"
    </script>
    <style>
        @media (max-width: 640px) {
            .table-container {
                overflow-x: scroll;
            }
        }
    </style>

</x-app-layout>
