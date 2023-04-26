<x-app-layout>
    <x-slot name="header">
        {{ __('Response') }}
    </x-slot>

    <h2 class="font-medium">{{ __('Les réponses du Chatbot') }}</h2>
    <br>

    <a href="{{ route('keyword.create') }}" type="button"
        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Ajouter
        un mot clé
    </a>

    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Réponse
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Type de réponse
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Mots-Clés
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($responses as $response)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ dd($response) }}
                        </th>
                        <td class="px-6 py-4">
                            @foreach ($response->keywords as $keyword)
                                <span
                                    class="py-0.5 my-1 bg-blue-100 text-blue-800 text-xs font-medium mr-2 px-2.5 rounded dark:bg-blue-900 dark:text-blue-300">{{ $keyword->keyword }}
                                </span>
                            @endforeach
                        </td>
                        <td class="px-6 py-4">
                            {{ $response->type }}
                        </td>
                        <td class="px-6 py-4">
                            <a href="{{ route('keyword.edit', $response) }}"
                                class="edit font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                Éditer</a>
                            <a onclick="deleteThing" href="#"
                                class="delete font-medium text-red-600 dark:text-red-500 hover:underline">Supprimer</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
