<x-app-layout>
    <div class="flex">
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
                {{ __('My Account') }}
            </h2>
        </x-slot>
        <div class="text-right sm:absolute sm:top-12 sm:right-0 p-1 text-right z-10 mt-2 mr-5">
            <a href="/notes" class="btn-link btn-lg m-3">{{ __('BLOG MANAGEMENT') }}</a>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
