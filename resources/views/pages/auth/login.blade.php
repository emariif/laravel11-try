<x-app title="Login">
    <x-slot name="heading">
        Login
    </x-slot>
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <div>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="px-4 py-2 rounded-lg border block mt-1" value="{{ old('email') }}">
            @error('email')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="px-4 py-2 rounded-lg border block mt-1">
            @error('password')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        <x-button class="mt-4">Login</x-button>
    </form>
</x-app>