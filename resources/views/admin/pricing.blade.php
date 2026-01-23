<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pricing') }}
        </h2>
        <a href="{{route('add-pricing')}}">Add New</a>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Description</th>
                                <th>Features</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pricing_list as $pricing)
                            <tr>
                                <td>{{$pricing->name}}</td>
                                <td>{{$pricing->price}}</td>
                                <td>{{$pricing->description}}</td>
                                <td>{{$pricing->features}}</td>
                                <td>
                                    <a href="{{route('edit-pricing',$pricing->id)}}">Edit</a>
                                    <form method="post" action="{{route('delete-pricing', $pricing->id)}}" class="absulate">@csrf
                                        <button type="submit">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                    {{ $pricing_list->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
