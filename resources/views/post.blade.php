<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Post') }}
        </h2>
    </x-slot>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1>Add Post </h1> {{ $user }}
                    <form action="" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" id="title" class="form-control" name="title" placeholder="Enter your title">
                        </div>
                        <div class="form-group">
                            <label for="body">Enter your Description</label>
                            <textarea name="body" id="body" cols="30" rows="3" class="form-control"></textarea>
                        </div>
                        
                        <button type="submit" class="btn btn-primary btn-block">Submit</button>
                    </form>  
                    @if (session()->has('status'))
                       <div class="alert alert-success">
                            {{ session('status') }}
                       </div>
                    @endif
                </div>
            </div>
        </div>
   
</x-app-layout>
