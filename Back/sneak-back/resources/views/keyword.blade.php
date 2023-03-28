<x-app-layout>
    <x-slot name="header">
        {{ __('Mot-Clés') }}
    </x-slot>

    <h2>{{ __('Les Mot-Clés du Chatbot') }}</h2>
    <br>

    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Nom de la réponse
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Réponses
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Mot-Clés
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Type de réponse
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($responses as $response)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $response->name }}
                        </th>
                        <td class="px-6 py-4">
                            @foreach (explode('---', $response->message) as $responseSingle)
                                {{ $responseSingle }}
                                <br>
                            @endforeach

                        </td>
                        <td class="px-6 py-4">
                            @foreach ($response->keywords as $keyword)
                                {{ $keyword->keyword }},
                            @endforeach
                        </td>
                        <td class="px-6 py-4">
                            {{ $response->type }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
