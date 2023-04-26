<x-app-layout>
    <x-slot name="header">
        {{ __('Produits') }}
    </x-slot>

    <h2 class="font-medium">{{ __('Vos produits') }}</h2>
    <br>

    <a href="{{ route('products.create') }}" type="button"
        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Ajouter
        un produit
    </a>

    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Image
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nom du produit
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Quantité
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Prix
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Catégories
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700  dark:hover:bg-gray-900">
                        <td class="w-32 p-4">
                            <img src="{{ asset(Storage::url($product->image)) }}" alt="image produit">
                        </td>
                        <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                            <p>{{ $product->name }}</p>
                        </td>
                        <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                            <p>{{ $product->stock }}</p>
                        </td>
                        <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                            <p>{{ $product->price / 100 }} €</p>
                        </td>
                        <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                            @foreach ($product->categories as $category)
                                <span
                                    class="bg-blue-100 text-blue-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">{{ $category->name }}
                                </span>
                            @endforeach
                        </td>
                        <td class="px-6 py-4">
                            <a href="{{ route('products.edit', $product) }}"
                                class="edit font-medium text-blue-600 dark:text-blue-500 hover:underline">Éditer</a>
                            <form action="{{ route('products.destroy', $product) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce produit ?')"
                                    class="delete font-medium text-red-600 dark:text-red-500 hover:underline">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
