<x-guest-layout>
    <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{ old('name', $user->name) }}" required />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" value="{{ old('email', $user->email) }}" required />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Avatar -->
        <div class="mt-4">
            <x-input-label for="avatar" :value="__('Avatar')" />
            <input type="file" id="avatar" name="avatar" class="block mt-1 w-full">
            <x-input-error :messages="$errors->get('avatar')" class="mt-2" />
            
            @if ($user->avatar)
                <img src="{{ asset('storage/' . $user->avatar) }}" alt="Avatar" class="mt-2 w-24 h-24 rounded-full">
            @endif
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('New Password (leave blank to keep current password)')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm New Password')" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Save Changes') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>

