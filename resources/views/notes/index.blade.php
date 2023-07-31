<x-app-layout>
    <div class="py-0">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 border-solid border-2 border-black mt-2 ">
                    <div class="pt-8">
                        <h1 class="text-black text-4xl font-mono text-center">BLOG MANAGEMENT</h1>
                    </div>

                    <x-alert-success>
                        {{ session('success') }}
                    </x-alert-success> 

                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-4">          
                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                            <div class="m-3 text-right">
                                <a href="{{ route("notes.create") }}" class="btn-link btn-lg mb-0">Add New</a>
                            </div>
                            <table class="table-fixed w-full text-xl text-left text-gray-500 dark:text-gray-400">
                                <thead class="text-xl text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-3 py-1 text-center w-1/2">
                                            Blog Title
                                        </th>
                                        <th scope="col" class="px-3 py-1 text-center w-1/4">
                                            Date Posted
                                        </th>
                                        <th scope="col" class="px-3 py-1 text-center w-1/4">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>

                                        @forelse ($notes[0] as $note)
                
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        
                                        <th scope="row" class="truncate px-6 py-1 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            <h2 class="flex font-bold text-m">
                                                <a href="{{ route('notes.show', $note) }}">
                                                    "{{ Str::limit($note->blog_title, 100)}}"
                                                </a>
                                            </h2>
                                        </th>
                                        <td class="flex px-6 py-1 justify-center">
                                            {{  $note->created_at }}
                                        </td>
                                        <td class="px-6 py-1">
                                            <div class="flex justify-center">
                                                <div class="btn-link my-auto mt-0 px-7">
                                                    <a href="{{ route('notes.edit', $note) }}"> Edit </a>
                                                </div>
                                                <div class="my-auto mt-0">
                                                    <form action="{{ route('notes.destroy', $note) }}" method="post">
                                                        @method('delete')
                                                        @csrf 
                                                        <button data-modal-target="popup-modal" data-modal-toggle="popup-modal" class="btn btn-danger ml-4 px-5" type="button">
                                                        Delete
                                                        </button>
  
                                                        <div id="popup-modal" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                                            <div class="relative w-full max-w-md max-h-full">
                                                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                                    <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="popup-modal">
                                                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                                        </svg>
                                                                        <span class="sr-only">Close modal</span>
                                                                    </button>
                                                                    <div class="p-6 text-center">
                                                                        <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                                                        </svg>
                                                                        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Sure ka na ba?</h3>
                                                                        <button data-modal-hide="popup-modal" type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                                                            Oo, Sure na sure na!
                                                                        </button>
                                                                        <button data-modal-hide="popup-modal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Ay!, Huwag pala muna!</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
  
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                        </tr>

                                        @empty


                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        
                                            <th scope="row" class="px-6 py-1 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center">
                                                ---
                                            </th>
                                            <td class="px-6 py-1 text-center">
                                                ---
                                            </td>
                                            <td class="px-6 py-1 text-center">
                                                ---
                                            </td>
                                            </tr>
                
                                        @endforelse
                
                                </tbody>
                            </table>
                        </div>
                        {{ $notes[0]->links() }}
                    </div>
        </div>
    </div>
</x-app-layout>
