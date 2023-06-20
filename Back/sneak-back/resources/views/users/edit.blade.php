<x-app-layout>
    <x-slot name="header">
        {{ __('Utilisateurs') }}
    </x-slot>

    <h2 class="font-medium">Liste des utilisateurs</h2>
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
        <form method="POST" action="{{ route('user.update', $user->id) }}">
            @csrf
            @method('PUT')
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            {{ __('Prénom') }}
                        </th>
                        <th scope="col" class="px-6 py-3">
                            {{ __('Nom') }}
                        </th>
                        <th scope="col" class="px-6 py-3">
                            {{ __('Email') }}
                        </th>
                        <th scope="col" class="px-6 py-3">
                            {{ __('téléphone') }}
                        </th>
                        <th scope="col" class="px-6 py-3">
                            {{ __('Action') }}
                        </th>
                    </tr>
                </thead>
                <tbody>

                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700  dark:hover:bg-gray-900">
                        <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                            <input type="text" name="surname" id="surname" placeholder="Prénom"
                                value="{{ $user->surname }}" class="bg-gray-800 text-white py-2 px-4 rounded-md">
                        </td>
                        <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                            <input type="text" name="name" id="name" value="{{ $user->name }}"
                                class="bg-gray-800 text-white py-2 px-4 rounded-md">
                        </td>
                        <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                            <input type="text" name="email" id="email" value="{{ $user->email }}"
                                class="bg-gray-800 text-white py-2 px-4 rounded-md">
                        </td>
                        <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                            <input type="text" name="phone" id="phone" value="{{ $user->phone }}"
                                class="bg-gray-800 text-white py-2 px-4 rounded-md">
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
