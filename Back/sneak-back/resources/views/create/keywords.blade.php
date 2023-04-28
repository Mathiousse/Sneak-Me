<x-app-layout>
    <x-slot name="header">
        {{ __('Mot-Clés') }}
    </x-slot>

    <h2 class="font-medium">{{ __('Les Mot-Clés du Chatbot') }}</h2>
    <br>

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
        <form enctype='multipart/form-data' method="post" action="{{ route('keywords.store') }}">
            @csrf
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Mot clé
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                            <input type="text" id="keyword" name="keyword"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Mot clé" required>
                        </td>
                        <td class="px-6 py-4">
                            <button type="submit"
                                class="edit font-medium text-green-600 dark:text-green-500 hover:underline">Ajouter
                            </button>
                        </td>
                    </tr>
                </tbody>

            </table>
        </form>
    </div>
</x-app-layout>
