<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pagges') }}
        </h2>
        <a href="{{route('add-page')}}">Add New</a>
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
                            @foreach($pages as $page)
                            <tr>
                                <td>{{$page->name}}</td>
                                
                                <td>
                                    <a href="{{route('edit-page',$page->id)}}">Edit</a>
                                    <a target="_blank" href="{{route('page',$page->slug)}}">View</a>
                                    <form method="post" action="{{route('delete-page', $page->id)}}" class="absulate">@csrf
                                        <button type="submit">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                           
                        </tbody>
                    </table>
                    {{ $pages->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
