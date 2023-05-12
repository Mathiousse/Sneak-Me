<x-app-layout>
    <x-slot name="header">
        {{ __('Catégories') }}
    </x-slot>

    <h2 class="font-medium">Liste des catégories</h2>
    <br>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <div class="relative overflow-x-auto">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="text-xl font-medium text-white">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="{{ route('categories.update', $category->id) }}">
            @csrf
            @method('PUT')
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
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-900">
                        <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                            <input type="text" name="name" id="name" placeholder="Catégorie"
                                value="{{ $category->name }}" class="bg-gray-800 text-white py-2 px-4 rounded-md">
                        </td>
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
                            <div class="flex flex-row">
                                <button type="submit" class="bg-gray-800 text-white py-2 px-4 rounded-md">
                                    Modifier
                                </button>
                            </div>
                        </td>
                    </tr>

                </tbody>
            </table>
        </form>
    </div>
</x-app-layout>
