<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add New Property') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <form action="{{route('update-property', $property->id)}}" method="post" enctype= multipart/form-data>
            @csrf
                <div class="p-6 bg-white border-b border-gray-200 flex-row">

                    <div class="flex-1 px-4">
                        <label class="civanoglu-label" for="name">Title</label>
                        <input class="civanoglu-input" type="text" id="name" name="name" value="{{$property->name}}">
                        @error('name')
                        <p class="text-red-500 mt-2 text-sm">{{$message}}</p>
                        @enderror
                    </div>
                </div>
                <div class="p-6 bg-white border-b border-gray-200 flex-row">
                    <div class="flex-1 px-4">
                        <label class="civanoglu-label" for="featured_image">Featured Image</label>
                        <input class="civanoglu-input" type="file" id="featured_image" name="featured_image">
                        <div class="mt-3">
                        <img src="/uploads/{{$property->featured_image}}" alt="">
                        </div>
                        @error('featured_image')
                        <p class="text-red-500 mt-2 text-sm">{{$message}}</p>
                        @enderror
                    </div>
                </div>
                <div class="p-6 bg-white border-b border-gray-200 flex-row">
                    <div class="flex-1 px-4">
                        <label class="civanoglu-label" for="gallery_images">Gallery Images</label>
                        <input class="civanoglu-input" type="file" id="gallery_images" name="gallery_images[]" multiple required>
                        <div class="mtfdfghfh">
                        @foreach($property->gallery as $gallery)
                        <div class="cdfdgf">
                            <img src="/uploads/{{$gallery->name}}" alt="">
                            <form method="post" action="{{route('delete-media', $gallery->id)}}" class="absulate">@csrf
                                <button type="submit">Delete</button>
                            </form>
                        </div>
                        @endforeach
                        </div>
                        @error('gallery_images')
                        <p class="text-red-500 mt-2 text-sm">{{$message}}</p>
                        @enderror
                    </div>
                </div>
                <div class="p-6 bg-white border-b border-gray-200 flex-row">
                    <div class="flex-1 px-4">
                        <label class="civanoglu-label" for="location_id">Location</label>
                        <select name="location_id" id="location_id">
                            <option value="">Select Location</option>
                            @foreach($locations as $location)
                            <option {{$property->location->id == $location->id ? 'selected="selected"' : ''}} value="{{$location->id}}">{{$location->name}}</option>
                            @endforeach
                            <option>New York</option>
                        </select>
                        @error('location_id')
                        <p class="text-red-500 mt-2 text-sm">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="flex-1 px-4">
                        <label class="civanoglu-label" for="price">Price</label>
                        <input class="civanoglu-input" type="number" id="price" name="price" value="{{$property->price}}">
                        @error('price')
                        <p class="text-red-500 mt-2 text-sm">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="flex-1 px-4">
                        <label class="civanoglu-label" for="status">Status</label>
                        <select name="status" id="status">
                            <option value="">Select Status</option>
                            <option {{$property->status == 0 ? 'selected="selected"' : ''}} value="0">Rent</option>
                            <option {{$property->status == 1 ? 'selected="selected"' : ''}} value="1">Sell</option>
                        </select>
                        @error('status')
                        <p class="text-red-500 mt-2 text-sm">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="flex-1 px-4">
                        <label class="civanoglu-label" for="type">Type</label>
                        <select name="type" id="type">
                            <option value="">Select Type</option>
                            <option {{$property->type == 0 ? 'selected="selected"' : ''}} value="0">land</option>
                            <option {{$property->type == 1 ? 'selected="selected"' : ''}} value="1">apartment</option>
                            <option {{$property->type == 2 ? 'selected="selected"' : ''}} value="2">villa</option>
                        </select>
                        @error('type')
                        <p class="text-red-500 mt-2 text-sm">{{$message}}</p>
                        @enderror
                    </div>
                </div>
                <div class="p-6 bg-white border-b border-gray-200 flex-row">
                    <div class="flex-1 px-4">
                        <label class="civanoglu-label" for="bedrooms">Bedrooms</label>
                        <select name="bedrooms" id="bedrooms">
                            <option value="">Select bedrooms</option>
                            @for($x = 0; $x <= 3; $x++)
                                <option {{$property->bedrooms == $x ? 'selected="selected"' : ''}} value="{{$x}}">{{$x}}</option>
                            @endfor
                        </select>
                        @error('bedrooms')
                        <p class="text-red-500 mt-2 text-sm">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="flex-1 px-4">
                        <label class="civanoglu-label" for="bathrooms">Bathrooms</label>
                        <select name="bathrooms" id="bathrooms">
                            <option value="">Select bathrooms</option>
                            @for($x = 0; $x <= 8; $x++)
                                <option {{$property->bathrooms == $x ? 'selected="selected"' : ''}} value="{{$x}}">{{$x}}</option>
                            @endfor
                        </select>
                        @error('bathrooms')
                        <p class="text-red-500 mt-2 text-sm">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="flex-1 px-4">
                        <label class="civanoglu-label" for="net_sqm">Net Sqm</label>
                        <input class="civanoglu-input" type="number" id="net_sqm" name="net_sqm" value="{{$property->net_sqm}}">
                        @error('net_sqm')
                        <p class="text-red-500 mt-2 text-sm">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="flex-1 px-4">
                        <label class="civanoglu-label" for="gross_sqm">Gross Sqm</label>
                        <input class="civanoglu-input" type="number" id="gross_sqm" name="gross_sqm" value="{{$property->gross_sqm}}">
                        @error('gross_sqm')
                        <p class="text-red-500 mt-2 text-sm">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="flex-1 px-4">
                        <label class="civanoglu-label" for="pool">pool</label>
                        <select name="pool" id="pool">
                            <option value="">Select pool</option>
                            <option {{$property->pool == 0 ? 'selected="selected"' : ''}} value="0">no</option>
                            <option {{$property->pool == 1 ? 'selected="selected"' : ''}} value="1">private</option>
                            <option {{$property->pool == 2 ? 'selected="selected"' : ''}} value="2">public</option>
                            <option {{$property->pool == 3 ? 'selected="selected"' : ''}} value="3">both</option>
                        </select>
                        @error('pool')
                        <p class="text-red-500 mt-2 text-sm">{{$message}}</p>
                        @enderror
                    </div>
                </div>
                <div class="p-6 bg-white border-b border-gray-200 flex-row">
                    <div class="flex-1 px-4">
                        <label class="civanoglu-label" for="overview">overview</label>
                        <textarea class="civanoglu-input" name="overview" id="overview" cols="30" rows="3">{{$property->overview}}</textarea>
                        @error('overview')
                        <p class="text-red-500 mt-2 text-sm">{{$message}}</p>
                        @enderror
                    </div>
                </div>
                <div class="p-6 bg-white border-b border-gray-200 flex-row">
                    <div class="flex-1 px-4">
                        <label class="civanoglu-label" for="why_buy">why_buy</label>
                        <textarea class="civanoglu-input" name="why_buy" id="why_buy" cols="30" rows="3">{{$property->why_buy}}</textarea>
                        @error('why_buy')
                        <p class="text-red-500 mt-2 text-sm">{{$message}}</p>
                        @enderror
                    </div>
                </div>
                <div class="p-6 bg-white border-b border-gray-200 flex-row">
                    <div class="flex-1 px-4">
                        <label class="civanoglu-label" for="description">description</label>
                        <textarea class="civanoglu-input" name="description" id="description" cols="30" rows="3">{{$property->description}}</textarea>
                        @error('description')
                        <p class="text-red-500 mt-2 text-sm">{{$message}}</p>
                        @enderror
                    </div>
                </div>
                <div class="p-6 bg-white border-b border-gray-200 flex-row">
                <button class="btn" type="submit">Save Property</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</x-app-layout>
