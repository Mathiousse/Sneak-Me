<x-app-layout>
    <x-slot name="header">
        {{ __('Catégories') }}
    </x-slot>

    <h2 class="font-medium">Liste des catégories</h2>
    <br>

    <a href="{{ route('categories.create') }}" type="button"
        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Ajouter
        une catégorie
    </a>


    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        {{ __('Nom de la catégorie') }}
                    </th>
                    {{-- <th scope="col" class="px-6 py-3">
                        {{ __('Nombre de produits associés') }}
                    </th> --}}
                    <th scope="col" class="px-6 py-3">
                        {{ __('Produits associés') }}
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $category->name }}
                        </th>
                        {{-- <td class="px-6 py-4">
                            {{ count($category->products) }}
                        </td> --}}
                        <td>
                            <br>
                            @foreach ($category->products as $product)
                                {{ $product->name }}
                                <br>
                            @endforeach
                            <br>
                        </td>
                        <td class="px-6 py-4">
                            <a href="{{ route('categories.edit', $category) }}"
                                class="edit font-medium text-blue-600 dark:text-blue-500 hover:underline">Éditer</a>
                            <form action="{{ route('categories.destroy', $category) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette catégorie ?')"
                                    class="delete font-medium text-red-600 dark:text-red-500 hover:underline">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
