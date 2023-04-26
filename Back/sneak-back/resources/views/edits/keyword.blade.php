<x-app-layout>
    <x-slot name="header">
        {{ __('Mot-Clés') }}
    </x-slot>

    <h2 class="font-medium">{{ __('Les Mot-Clés du Chatbot') }}</h2>
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
        <form method="POST" action="{{ route('keyword.update', $keyword->id) }}">
            @csrf
            @method('PUT')
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
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($responses as $response)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                                <input type="text" name="name" id="name" placeholder="Nom"
                                    value="{{ $keyword->name }}" class="bg-gray-800 text-white py-2 px-4 rounded-md">
                            </td>
                            <td class="px-6 py-4">
                                @foreach (explode('---', $response->message) as $responseSingle)
                                    {{ $responseSingle }}
                                    <br>
                                @endforeach

                            </td>
                            <td class="px-6 py-4">
                                @foreach ($response->keywords as $keyword)
                                    {{ $keyword->keyword }}
                                    <br>
                                @endforeach
                            </td>
                            <td class="px-6 py-4">
                                {{ $response->type }}
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex flex-row">
                                    <button type="submit" class="bg-gray-800 text-white py-2 px-4 rounded-md">
                                        Modifier
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </form>
    </div>
</x-app-layout>
