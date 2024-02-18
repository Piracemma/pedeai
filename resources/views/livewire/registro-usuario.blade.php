<div>
    <form wire:submit="save">

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input wire:model.live="name" id="name" class="block mt-1 w-full" type="text" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="username" :value="__('Username')" />
            <x-text-input wire:model.live="username" id="username" class="block mt-1 w-full" type="text" :value="old('username')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('username')" class="mt-2" />
        </div>

        <!-- Vendedor -->
        <div class="mt-4">
            <x-input-label for="vendedor" :value="__('Vendedor?')" />
            <div class="mt-2">
                <div class="inline-block mx-2">
                    <input type="radio" name="vendedor" wire:model.live="vendedor" value="false">
                    <p class="inline-block font-medium text-sm text-gray-700 dark:text-gray-300">Não</p>
                </div>
                <div class="inline-block mx-2">
                    <input type="radio" name="vendedor" wire:model.live="vendedor" value="true">
                    <p class="inline-block font-medium text-sm text-gray-700 dark:text-gray-300">Sim</p>
                </div>
            </div>
            <x-input-error :messages="$errors->get('vendedor')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Password')" />

            <x-text-input wire:model.live="password_confirmation" id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Confirm Password')" />

            <x-text-input wire:model.live="password" id="password" class="block mt-1 w-full"
                            type="password" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</div>
