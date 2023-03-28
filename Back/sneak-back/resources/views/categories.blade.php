<x-app-layout>
    <x-slot name="header">
        {{ __('Catégories') }}
    </x-slot>

    <h2 class="font-medium">Liste des catégories</h2>
    <br>


    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        {{ __('Nom de la catégorie') }}
                    </th>
                    <th scope="col" class="px-6 py-3">
                        {{ __('Nombre de produits associés') }}
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $category->name }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $category->products }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
@foreach ($categories as $category)
    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
        </th>
        <td class="px-6 py-4">
            {{ dd($category->products) }}
        </td>
    </tr>
@endforeach
