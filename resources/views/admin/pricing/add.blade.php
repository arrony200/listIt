<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add New Pricing Plan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <form action="{{route('create-pricing')}}" method="post" enctype="multipart/form-data">
            @csrf
                <div class="p-6 bg-white border-b border-gray-200 flex-row">
                    <div class="flex-1 px-4 w-3/6">
                        <label class="civanoglu-label" for="name">Name</label>
                        <input class="civanoglu-input" type="text" id="name" name="name">
                        @error('name')
                        <p class="text-red-500 mt-2 text-sm">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="flex-1 px-4">
                        <label class="civanoglu-label" for="price">Price</label>
                        <input class="civanoglu-input" type="text" id="price" name="price">
                        @error('price')
                        <p class="text-red-500 mt-2 text-sm">{{$message}}</p>
                        @enderror
                    </div>
                </div>
                <div class="p-6 bg-white border-b border-gray-200 flex-row">
                    <div class="flex-1 px-4">
                        <label class="civanoglu-label" for="description">Description</label>
                        <textarea class="civanoglu-input" name="description" id="description" cols="30" rows="3"></textarea>
                        @error('description')
                        <p class="text-red-500 mt-2 text-sm">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="flex-1 px-4">
                        <label class="civanoglu-label" for="features">Features</label>
                        <textarea class="civanoglu-input" name="features" id="features" cols="30" rows="3"></textarea>
                        @error('features')
                        <p class="text-red-500 mt-2 text-sm">{{$message}}</p>
                        @enderror
                    </div>
                </div>

                <div class="p-6 bg-white border-b border-gray-200 flex-row">
                <button class="btn" type="submit">Save Pricing</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</x-app-layout>
