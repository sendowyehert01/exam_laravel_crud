<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 border-solid border-2 border-black">
            <div class="p-4">
                <div>
                        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
                            {{ __('My Account') }}
                        </h2>
                </div>
                <div class="w-full">

                    <div >
                        <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                            @csrf
                        </form>
                    
                        <form method="post" action="{{ route('profile.updateProfile') }}" class="mt-6 space-y-6">
                            @csrf
                            @method('patch')

                            <div class="sm:static sm:top-12 sm:right-0 p-1 text-right z-10 mt-2 mr-5">

                                <div >
                                    <input type="submit" class="btn-link btn-lg m-3" class="" value="{{ __('Save') }}"/>
                                </div>

                                @if (session('status') === 'profile-updated')
                                    <p
                                        x-data="{ show: true }"
                                        x-show="show"
                                        x-transition
                                        x-init="setTimeout(() => show = false, 2000)"
                                        class="text-sm text-gray-600"
                                    >{{ __('Saved.') }}</p>
                                @endif
                            </div>

                            <header>
                                <h2 class="text-lg font-medium text-gray-900">
                                    {{ __('Profile Information') }}
                                </h2>
                            </header>
                    
                            <div>
                                <x-input-label for="name" :value="__('First Name')" />
                                <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
                                <x-input-error class="mt-2" :messages="$errors->get('name')" />
                            </div>
                    
                            <div>
                                <x-input-label for="name" :value="__('Last Name')" />
                                <x-text-input id="lastname" name="lastname" type="text" class="mt-1 block w-full" :value="old('lastname', $user->lastname)" required autofocus autocomplete="lastname" />
                                <x-input-error class="mt-2" :messages="$errors->get('lastname')" />
                            </div>
                    
                            <div>
                                <x-input-label for="email" :value="__('Email')" />
                                <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
                                <x-input-error class="mt-2" :messages="$errors->get('email')" />
                    
                                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                                    <div>
                                        <p class="text-sm mt-2 text-gray-800">
                                            {{ __('Your email address is unverified.') }}
                    
                                            <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                {{ __('Click here to re-send the verification email.') }}
                                            </button>
                                        </p>
                    
                                        @if (session('status') === 'verification-link-sent')
                                            <p class="mt-2 font-medium text-sm text-green-600">
                                                {{ __('A new verification link has been sent to your email address.') }}
                                            </p>
                                        @endif
                                    </div>
                                @endif
                            </div>
                        </form>
                        <div class="mt-14">
                            <h1>Date Created: <strong class="underline">{{ $user->created_at }}</strong></h1>
                        </div>
                    </div>
                    

                </div>
                <div class="sm:static sm:top-12 sm:right-0 p-1 text-right z-10 mt-2 mr-5">
                    <a href="/notes" class="btn-link btn-lg m-3">{{ __('BLOG MANAGEMENT') }}</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
