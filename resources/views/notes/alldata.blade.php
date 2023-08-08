<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Blog App by Rosendo Galang</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body class="antialiased">

        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('All Data') }}
            </h2>
        </x-slot>

            <div class="py-1 bg-black">
                        @if (Route::has('login'))
                        <div class="sm:static sm:top-0 sm:right-0 p-0 text-right z-10 mt-1 mr-5">
                            @auth
                                <a href="{{ route('notes.index') }}" class="btn-link btn-lg mb-2 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Back to your Blogs {{ Auth::user()->name }}</a>
                            @else
                                <a href="{{ route('login') }}" class="btn-link btn-lg mb-2 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="btn-link btn-lg mb-2 ml-4 mr-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                                @endif
                            @endauth
                        </div>
                        @endif

            </div>


                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-5 border-solid border-2 border-black mt-2">          
                <div class="relative overflow-x-auto sm:rounded-lg">
                    <div class="mb-5 text-right">
                        <h1 class="text-black text-4xl font-mono text-center">Bulletin Board</h1>
                        <p class="text-lg font-mono"> Posts: {{ $allnotes[0]->total() }} </p>
                        <p class="text-lg font-mono"> Registered Users: {{ $allnotes[1]->count() }} </p>
                        <p class="text-lg font-mono"> Date Today: {{ $allnotes[2]->format('F j Y - l') }} </p>
                    </div>
                    <table class="table-fixed w-full text-m text-center text-gray-500 dark:text-gray-400">
                        <thead class="text-lg text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-3 py-3 w-1/8">
                                    ID
                                </th>
                                <th scope="col" class="px-3 py-3 w-1/2">
                                    Blog Title
                                </th>
                                <th scope="col" class="px-3 py-3 w-1/8">
                                    Blog Writer
                                </th>
                                <th scope="col" class="px-3 py-3 w-1/4">
                                    Date Posted
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            
                                
                                @forelse ($allnotes[0] as $note)
        
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                
                                <th scope="row" class="px-6 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $note->id }}
                                </th>
                                <td class="truncate px-6 py-2 text-left">
                                    "{{ $note->blog_title }}"
                                </td>
                                <td class="px-6 py-2">
                                    {{ $allnotes[1][$note->user_id-1]->name  }}
                                </td>
                                <td class="px-6 py-2">
                                    {{ $note->created_at }}
                                </td>
                                </tr>
        
                                @empty
        
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        ---
                                    </th>
                                    <td class="px-6 py-4">
                                        ---
                                    </td>
                                    <td class="px-6 py-4">
                                        ---
                                    </td>
                                    <td class="px-6 py-4">
                                        ---
                                    </td>
                                    </tr>
                                    
                                @endforelse 
        
                        </tbody>
                    </table>
        
                    <div >
                        {{ $allnotes[0]->links() }}
                    </div>
        
                </div>
                </div>

        </div>
    </body>
</html>


