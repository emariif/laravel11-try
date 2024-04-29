<x-app title="{{ $user->name }}">
    <x-slot name="heading">
        {{ $user->name }}
    </x-slot>
    <p>{{ $user->email }}</p>
    <p>Registered at {{ $user->created_at->diffForHumans() }}</p>

    <form :action="route('user.destroy', $user->id)" method="post" class="mt-6">
        @method('delete')
        @csrf
        <x-button type="submit">
            Delete
        </x-button>
    </form>
</x-app>