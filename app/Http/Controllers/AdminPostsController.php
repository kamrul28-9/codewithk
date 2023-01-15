<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Post;
use App\Models\Photo;
use App\Models\Category;
use App\Http\Requests\PostsCreateRequest;
use Illuminate\Http\Request;

class AdminPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      $posts = Post::all();

      return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

      //create method to pass in the categories
      $categories = Category::pluck('name', 'id')->all();

        return view('admin.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostsCreateRequest $request)
    {
        //return $request->all(); // by hitting submit button, check data are recieving.

        $input = $request->all();
        $user = Auth::user();

       if($file = $request->file('photo_id')){
         //return "its work";
         $name = time() . $file->getClientOriginalName();

              $file->move('images', $name);

              $photo = Photo::create(['file'=>$name]);

              $input['photo_id'] = $photo->id;
          }

          $user->posts()->create($input);
          return redirect('/admin/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $post = Post::findOrFail($id);
        $categories = Category::pluck('name','id')->all();
        return view('admin.posts.edit', compact('post','categories'));
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
        $input = $request->all();

        if($file = $request->file('photo_id')){
          $name = time() . $file->getClientOriginalName();

               $file->move('images', $name);

               $photo = Photo::create(['file'=>$name]);

               $input['photo_id'] = $photo->id;
           }

           Auth::user()->posts()->whereId($id)->first()->update($input);
           return redirect('/admin/posts');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      //return('Post Destroyed'); //for checkou

      $post = Post::findOrFail($id);

      unlink(public_path() . $post->photo->file);

        return redirect('/admin/posts');
    }
}
