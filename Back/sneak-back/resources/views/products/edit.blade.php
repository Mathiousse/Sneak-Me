<x-app-layout>
    <x-slot name="header">
        {{ __('Produits') }}
    </x-slot>

    <h2 class="font-medium">{{ __('Vos produits') }}</h2>
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
        <form enctype="multipart/form-data" method="POST" action="{{ route('products.update', $product->id) }}">
            @csrf
            @method('PUT')
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
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700  dark:hover:bg-gray-900">
                        <td class="w-32 p-4">
                            <img src="{{ asset(Storage::url($product->image)) }}" alt="image produit">
                            <input
                                class="block p-2 w-auto text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                id="image_input" type="file" name="imageFile">
                        </td>
                        <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                            <input type="text" name="name" id="name" placeholder="Nom"
                                value="{{ $product->name }}" class="bg-gray-800 text-white py-2 px-4 rounded-md">
                        </td>
                        <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                            <input type="number" name="stock" id="stock" value="{{ $product->stock }}"
                                class="bg-gray-800 text-white py-2 px-4 rounded-md">
                        </td>
                        <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                            <input type="number" name="price" id="price" placeholder="Prix"
                                value="{{ $product->price }}" class="bg-gray-800 text-white py-2 px-4 rounded-md">
                        </td>
                        <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                            {{-- @foreach ($categories as $category)
                                <div class="flex">
                                    <input id="default-checkbox" type="checkbox" value=""
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="default-checkbox"
                                        class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $category->name }}</label>
                                </div>
                            @endforeach --}}

                            @foreach ($categories as $category)
                                <div>
                                    <input type="checkbox" id="{{ $category->id }}" name="categories[]"
                                        value="{{ $category->id }}"
                                        {{ $product->categories->contains($category) ? 'checked' : '' }}>
                                    <label for="{{ $category->id }}">{{ $category->name }}</label>
                                </div>
                            @endforeach
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
