<x-app-layout>
    <x-slot name="header">
        {{ __('Response') }}
    </x-slot>

    <h2 class="font-medium">{{ __('Les réponses du Chatbot') }}</h2>
    <br>

    <a href="{{ route('response.create') }}" type="button"
        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Ajouter
        une réponse
    </a>

    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Réponse*
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Mots-Clés
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Type de réponse
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
                            {{ $response->message }}
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
                            <a href="{{ route('response.edit', $response) }}"
                                class="edit font-medium text-blue-600 dark:text-blue-500 hover:underline">Éditer</a>
                            <form action="{{ route('response.destroy', $response) }}" method="POST" class="inline">
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
        <br>
        <i class="text-sm">*Séparez les réponses avec "---" Ex. "Salut---Bonjour" => "Salut" ou "Bonjour"). Le
            chatbot affichera aléatoirement l'un ou l'autre des messages.
        </i>
        <br>
        <i class="text-sm">*Séparez avec "|||" deux réponses en messages différents envoyés par le chatbot. Ex:
            "Salut|||Ca
            va ?", le chatbot répond "Salut", puis "Ca va ?""
        </i>
    </div>
</x-app-layout>
