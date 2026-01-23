<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('locations') }}
        </h2>
        <a href="{{route('add-location')}}">Add New</a>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                 
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($locations as $location)
                            <tr>
                                <td>{{$location->name}}</td>
                                
                                <td>
                                    <a href="{{route('edit-location',$location->id)}}">Edit</a>
                                    <a target="_blank" href="{{route('single-property',$location->id)}}">View</a>
                                    <form method="post" action="{{route('delete-location', $location->id)}}" class="absulate">@csrf
                                        <button type="submit">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                           
                        </tbody>
                    </table>
                    {{ $locations->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
