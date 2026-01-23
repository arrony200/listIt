<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add New Page') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <form action="{{route('create-page')}}" method="post" enctype="multipart/form-data">
            @csrf
                <div class="p-6 bg-white border-b border-gray-200 flex-row">
                    <div class="flex-1 px-4">
                        <label class="civanoglu-label" for="name">Page Name</label>
                        <input class="civanoglu-input" type="text" id="name" name="name">
                        @error('name')
                        <p class="text-red-500 mt-2 text-sm">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="flex-1 px-4">
                        <label class="civanoglu-label" for="name">Page Slug</label>
                        <input class="civanoglu-input" type="text" id="slug" name="slug">
                        @error('slug')
                        <p class="text-red-500 mt-2 text-sm">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="flex-1 px-4">
                        <label class="civanoglu-label" for="name">Page Content</label>
                        <input class="civanoglu-input" type="text" id="content" name="content">
                        @error('content')
                        <p class="text-red-500 mt-2 text-sm">{{$message}}</p>
                        @enderror
                    </div>
                </div>

                <div class="p-6 bg-white border-b border-gray-200 flex-row">
                <button class="btn" type="submit">Save Page</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</x-app-layout>
