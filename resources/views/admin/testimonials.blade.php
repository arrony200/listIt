<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('testimonial') }}
        </h2>
        <a href="{{route('add-testimonial')}}">Add New</a>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Designation</th>
                                <th>Review</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($testimonials as $testimonial)
                            <tr>
                                <td>{{$testimonial->name}}</td>
                                <td>{{$testimonial->designation}}</td>
                                <td>{{$testimonial->review}}</td>
                                <td>
                                    <a href="{{route('edit-testimonial',$testimonial->id)}}">Edit</a>
                                    <form method="post" action="{{route('delete-testimonial', $testimonial->id)}}" class="absulate">@csrf
                                        <button type="submit">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                    {{ $testimonials->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
