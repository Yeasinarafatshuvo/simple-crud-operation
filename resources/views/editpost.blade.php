<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Post') }}
        </h2>
    </x-slot>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1>Edit Post </h1>
                    <form action="" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" id="title" class="form-control" name="title" value="{{ $post->title }}" >
                        </div>
                        <div class="form-group">
                            <label for="body">Enter your Description</label>
                            <textarea name="body" id="body" cols="30" rows="3" class="form-control" >{{ $post->body }}</textarea>
                        </div>
                        
                        <button type="submit" class="btn btn-primary btn-block">Update</button>
                    </form>  
                   
                </div>
            </div>
        </div>
   
</x-app-layout>
