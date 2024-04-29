<x-app title="{{ $user->name }}">
    <x-slot name="heading">
        {{ $user->name }}
    </x-slot>
    <p>{{ $user->email }}</p>
    <p>Registered at {{ $user->created_at->diffForHumans() }}</p>
</x-app>