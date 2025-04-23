<section class="bg-[#fdfcf9] p-6 rounded-xl shadow-lg border border-[#e0dbce]">
    <header>
        <h2 class="text-lg font-semibold text-gray-800">
            {{ __('Profile Information') }}
        </h2>
        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('Name')" class="text-gray-700" />
            <x-text-input
                id="name"
                name="name"
                type="text"
                class="mt-1 block w-full rounded-md bg-white border border-gray-300 text-gray-800 shadow-sm focus:border-[#c0b49a] focus:ring-[#c0b49a]"
                :value="old('name', $user->name)"
                required
                autofocus
                autocomplete="name"
            />
            <x-input-error class="mt-2 text-red-500" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" class="text-gray-700" />
            <x-text-input
                id="email"
                name="email"
                type="email"
                class="mt-1 block w-full rounded-md bg-white border border-gray-300 text-gray-800 shadow-sm focus:border-[#c0b49a] focus:ring-[#c0b49a]"
                :value="old('email', $user->email)"
                required
                autocomplete="username"
            />
            <x-input-error class="mt-2 text-red-500" :messages="$errors->get('email')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button class="bg-[#c0b49a] hover:bg-[#b2a68c] text-white shadow-sm">
                {{ __('Save') }}
            </x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >
                    {{ __('Saved.') }}
                </p>
            @endif
        </div>
    </form>
</section>
