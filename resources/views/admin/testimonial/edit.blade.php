<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Testimonial') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <form action="{{route('update-testimonial', $testimonial->id)}}" method="post" enctype="multipart/form-data">
            @csrf
                <div class="p-6 bg-white border-b border-gray-200 flex-row">
                    <div class="flex-1 px-4 w-3/6">
                        <label class="civanoglu-label" for="name">Name</label>
                        <input class="civanoglu-input" type="text" id="name" name="name" value="{{$testimonial->name}}">
                        @error('name')
                        <p class="text-red-500 mt-2 text-sm">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="flex-1 px-4">
                        <label class="civanoglu-label" for="designation">Designation</label>
                        <input class="civanoglu-input" type="text" id="designation" name="designation" value="{{$testimonial->designation}}">
                        @error('designation')
                        <p class="text-red-500 mt-2 text-sm">{{$message}}</p>
                        @enderror
                    </div>
                </div>
                <div class="p-6 bg-white border-b border-gray-200 flex-row">
                    <div class="flex-1 px-4">
                        <label class="civanoglu-label" for="review">Review</label>
                        <textarea class="civanoglu-input" name="review" id="review" cols="30" rows="3">{{$testimonial->review}}</textarea>
                        @error('review')
                        <p class="text-red-500 mt-2 text-sm">{{$message}}</p>
                        @enderror
                    </div>
                </div>

                <div class="p-6 bg-white border-b border-gray-200 flex-row">
                <button class="btn" type="submit">Save Testimonial</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</x-app-layout>
