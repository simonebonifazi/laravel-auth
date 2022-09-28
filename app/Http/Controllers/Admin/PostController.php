<?php

namespace App\Http\Controllers\Admin;

//importo modello
use App\Models\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Category;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('updated_at', 'DESC')->orderBy('created_at', 'DESC')->orderBy('title')->get();
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()

    {
        //passo un post vuoto per favorire unificazione form
        $post = new Post();
        $categories = Category::select('id', 'label')->get();

        return view('admin.posts.create' , compact('post', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $post = new Post();

        $post->fill($data);
        //slug   
        $post->slug = Str::slug($post->title , '-');

        $post->save();

        return redirect()->route('admin.posts.show', $post->id)
        ->with('message', 'Il post è stato creato con successo!')
        ->with('type', 'success');
    }

    /**
     * Display the specified resource.
     *
     * @param  Post $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Post $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Post $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $data = $request->all();

        //slug in maniera alternativa, non ho ancora post per cui devo prendere il title dalla request
        $data['slug'] = Str::slug($request->title , '-'); // o anche( $data['title'], '-')
        
        $post->update($data);
        

        return redirect()->route('admin.posts.show', $post)
        ->with('message', 'Il post è stato aggiornato correttamente')
        ->with('type', 'success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Post $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post )
    {
         $post->delete();

        return redirect()->route('admin.posts.index')
        ->with('message', 'Il post è stato eliminato correttamente')
        ->with('type', 'success');
    }
}