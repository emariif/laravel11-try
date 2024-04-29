<x-app title="{{ $page_meta['title'] }}">
    <x-slot name="heading">
        {{ $page_meta['title'] }}
    </x-slot>
    <form action="{{ $page_meta['url'] }}" method="post" class="space-y-6">
        @method($page_meta['method'])
        @csrf
        <div>
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="px-4 py-2 rounded-lg border block mt-1" value="{{ old('name', $user->name) }}">
            @error('name')
                <p class="text-red-500 text-sm mt-1" id="name-error">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="px-4 py-2 rounded-lg border block mt-1" value="{{ old('email', $user->email) }}">
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

        <x-button>{{ $page_meta['submit_text'] }}</x-button>
    </form>

    @push('other-scripts')
        <script>
            const name = document.getElementById('name');
            const nameError = document.getElementById('name-error');
            name.addEventListener('input', function() {
                if (name.value !== '') {
                    nameError.setAttribute('hidden', '');
                } else {
                    nameError.removeAttribute('hidden');
                }
            });
        </script>
    @endpush
</x-app>
