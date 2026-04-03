<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div>
            <x-input-label for="name" value="Ho ten" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="email" value="Dia chi email" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="diachi" value="Dia chi" />
            <x-text-input id="diachi" class="block mt-1 w-full" type="text" name="diachi" :value="old('diachi')" autocomplete="street-address" />
            <x-input-error :messages="$errors->get('diachi')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="nghenghiep" value="Nghe nghiep" />
            <x-text-input id="nghenghiep" class="block mt-1 w-full" type="text" name="nghenghiep" :value="old('nghenghiep')" />
            <x-input-error :messages="$errors->get('nghenghiep')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="phai" value="Phai" />
            <select id="phai" name="phai" class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                <option value="">-- Chon phai --</option>
                <option value="nam" @selected(old('phai') === 'nam')>Nam</option>
                <option value="nu" @selected(old('phai') === 'nu')>Nu</option>
                <option value="khac" @selected(old('phai') === 'khac')>Khac</option>
            </select>
            <x-input-error :messages="$errors->get('phai')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="password" value="Mat khau" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="password_confirmation" value="Nhap lai mat khau" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                Da co tai khoan?
            </a>

            <x-primary-button class="ms-4">
                DANG KY
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
