<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = $request->user()->email;
       
        return view('post', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $user = $request->user();
        $post = new Post();
        $post->title = $request->title;
        $post->body = $request->body;
        $user->post()->save($post);
        return redirect(route('post_index'))->with('status', 'Post Added');
    }

    
     
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //for using policies
       // $this->authorize('isAdmin', Post::class);
        if(Auth::user()->cannot('isAdmin', Post::class))
        {
            abort(403, 'You don not own this post');
        }
        $post = Post::find($id);

        //for use Gate
        // if(Gate::denies('isAdmin', $post))
        // {
        //     abort(403, 'You are not authorized');
        // }
        return view('editpost', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //using policies 
        //$this->authorize('isAdmin', Post::class);


        $post = Post::find($id);
        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();
        return redirect(route('dashboard'))->with('status', 'Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::destroy($id);
        return redirect(route('dashboard'))->with('status', 'Post deleted successfully');
        
    }
}
