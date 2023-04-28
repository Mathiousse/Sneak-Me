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
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="text-xl font-medium text-white">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="post" action="{{ route('response.store') }}">
            @csrf
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
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <textarea id="message" rows="4" name="message"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Réponse"></textarea>
                        </th>
                        <td class="px-6 py-4">
                            @foreach ($keywords as $keyword)
                                <div class="keyword">
                                    <input type="checkbox" id="{{ $keyword->id }}" name="keywords[]"
                                        value="{{ $keyword->id }}">
                                    <label for="{{ $keyword->id }}">{{ $keyword->keyword }}</label>
                                </div>
                            @endforeach
                        </td>
                        <td class="px-6 py-4">
                            <select id="type" name="type"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected>Choisir un type de réponse</option>
                                <option value="message">Message</option>
                            </select>
                        </td>
                        <td class="px-6 py-4">
                            <button type="submit" href=""
                                class="edit font-medium text-green-600 dark:text-green-500 hover:underline">
                                Valider
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
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
