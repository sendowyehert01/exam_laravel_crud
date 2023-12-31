<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Creating a Blog Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                        <form action="{{ route('notes.store') }}" method="post">
                            @csrf
                            <x-text-input :value="@old('blog_title')" type="text" field="blog_title" name="blog_title" placeholder="Blog Title" class="w-full"/>
                            
                            <x-text-input value="{{ $username }}" type="hidden" field="blog_writer" name="blog_writer" placeholder="Blog Writer" class="w-full"/>

                            <x-primary-button class="mt-6"> Save Blog </x-primary-button>
                        </form>
                    </div>
        </div>
    </div>
</x-app-layout>
