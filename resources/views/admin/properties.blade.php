<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Properties') }}
        </h2>
        <a href="{{route('add-property')}}">Add New</a>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Location</th>
                                <th>Price</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($properties as $property)
                            <tr>
                                <td>{{$property->name}}</td>
                                <td>{{$property->location->name}}</td>
                                <td>${{number_format($property->price,2,',',',')}}</td>
                                <td>
                                    <a href="{{route('edit-property',$property->id)}}">Edit</a>
                                    <a target="_blank" href="{{route('single-property',$property->id)}}">View</a>
                                    <form method="post" action="{{route('delete-property', $property->id)}}" class="absulate">@csrf
                                        <button type="submit">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                           
                        </tbody>
                    </table>
                    {{ $properties->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
