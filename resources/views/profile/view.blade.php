<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 border-solid border-2 border-black">
            <div class="p-4">
                <div>
                        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
                            {{ __('My Account') }}
                        </h2>
                </div>
                <div class="sm:static sm:top-12 sm:right-0 p-1 text-right z-10 mt-2 mr-5">
                    <a href="/edit-profile" class="btn-link btn-lg m-3">{{ __('EDIT ACCOUNT') }}</a>
                </div>
                <div class="max-w-xl">
                    <header>
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ __('Profile Information') }}
                        </h2>
                    </header>

                    <section>
                        <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
                            @csrf
                            @method('patch')
                    
                            <div>
                                <x-input-label for="name" :value="__('First Name')" />
                                <h1 id="name" name="name" class="underline mt-1 text-xl font-bold w-full">{{ $user->name }}</h1>
                            </div>
                    
                            <div>
                                <x-input-label for="lastname" :value="__('Last Name')" />
                                <h1 id="lastname" name="lastname" class="underline mt-1 text-xl font-bold w-full">{{ $user->lastname }}</h1>
                            </div>
                    
                            <div>
                                <x-input-label for="email" :value="__('Email')" />
                                <h1 id="email" name="email" class="underline mt-1 text-xl font-bold w-full">{{ $user->email }}</h1>
                            </div>
                        </form>
                    </section>
                            <div class="mt-14">
                                <h1>Date Created: <strong class="underline">{{ $user->created_at }}</strong></h1>
                            </div>

                </div>
                <div class="sm:static sm:top-12 sm:right-0 p-1 text-right z-10 mt-2 mr-5">
                    <a href="/notes" class="btn-link btn-lg m-3">{{ __('BLOG MANAGEMENT') }}</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
