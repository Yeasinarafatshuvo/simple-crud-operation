<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        @if (session()->has('status'))
        <div class="alert alert-success">
             {{ session('status') }}
        </div>
     @endif
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th>NAME</th>
                                <th>TITLE</th>
                                <th>BODY</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                                <tr>
                                    <td>{{ $post->user->name }}</td>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ $post->body }}</td>
                                    @can('isAdmin', $post)
                                    <td>
                                        <a href="{{ url('/post/edit', $post->id) }}" class="btn btn-info btn-sm">Edit</a>
                                        <a href="{{ url('/post/delete', $post->id) }}" class="btn btn-danger btn-sm">Delete</a>
                                    </td>
                                    @endcan
                                    
                                </tr>
                            @endforeach
                           
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
