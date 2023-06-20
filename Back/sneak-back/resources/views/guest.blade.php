<x-guest-layout>
    Vous n'êtes pas administrateur, vous n'avez donc pas accès au dashboard.
    <br>
    <br>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
            this.closest('form').submit();">
            {{ __('Déconnexion') }}
        </x-dropdown-link>
    </form>
</x-guest-layout>
