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
    @if (session()->has('success'))
        <div id="toast-target"
            class="flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800 fixed bottom-5 right-5"
            role="alert">
            <div
                class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                        clip-rule="evenodd"></path>
                </svg>
                <span class="sr-only">Check icon</span>
            </div>
            <div class="ml-3 text-sm font-normal"> {{ session()->get('success') }} </div>
            <button type="button" onclick="closeToast()" id="toast-trigger"
                class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700"
                data-dismiss-target="#toast-success" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>
    @endif
    <div class="relative overflow-x-auto">
        <div class="block sm:overflow-auto">
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
                                        onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette réponse ?')"
                                        class="delete font-medium text-red-600 dark:text-red-500 hover:underline">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
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
    <script>
        function closeToast() {
            // target element that will be dismissed
            const targetEl = document.querySelector('#toast-target');

            // optional trigger element
            const triggerEl = document.querySelector('#toast-trigger');

            // options object
            const options = {
                transition: 'transition-opacity',
                duration: 1000,
                timing: 'ease-out',

                // callback functions
                onHide: (context, targetEl) => {
                    console.log('element has been dismissed')
                }
            };

            const dismiss = new Dismiss(targetEl, triggerEl, options);

            dismiss.hide()
        }
    </script>
</x-app-layout>
