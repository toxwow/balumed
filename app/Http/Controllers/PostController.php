<?php

namespace App\Http\Controllers;

use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show', 'index']]);
    }

    public function adminPost()
    {
        $posts = Post::with('tags')->orderByDesc('created_at')->paginate('5');
        return view('admin.post.index', ['posts'=>$posts]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('tags')->orderByDesc('created_at')->where('status', '=', '1' )->get();

        return view('pages._posts', [ 'posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all()->where('type', '=', '1');
        return view('admin.post.create', ['tags'=>$tags]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:blogs|min:5',
            'slug' => 'required|unique:blogs',
            'description' => 'required',
            'contents' => 'required',
            'photo' => 'required|mimes:jpeg,png,bmp,tiff|max:4096',
        ],[
            'title.required' => 'Pole tytuł jest wymagane',
            'title.unique' => 'Istnieje już tytuł o tej nazwie',
            'title.min' => 'Tytuł musi składać się z minimum 5 znaków',
            'slug.unique' => 'Istnieje już slug o tej nazwie',
            'slug.required' => 'Pole slug jest wymagane',
            'description.required' => 'Pole opis wspisu jest wymagane',
            'contents.required' => 'Pole treść jest wymagane',
            'photo.required' => 'Zdjęcie jest wymagane',
            'photo.mimes' => 'Zły format zdjęcia',
            'photo.max' => 'Zdjęcie jest za duże',
        ]);

        $photo =  $request->file('photo');
        Storage::putFile('public/files/shares/aktualnosci/', $request->file('photo'));

        $post = new Post([
            'photo' => $photo->hashName(),
            'title' => $request->get('title'),
            'slug' => $request->get('slug'),
            'status' => $request->get('status'),
            'description' => $request->get('description'),
            'contents' => $request->get('contents'),
        ]);
        $post->save();
        $post->tags()->attach($request->get('tags'));

        return redirect()->route('adminPost')->with('status', 'Pomyślnie dodano aktualności');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = Post::with('tags')->where('slug', '=', $slug)->first();
        if(empty($post)){
            abort(404);
        }
        else{
            return view('pages._post', [ 'post' => $post]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tags = Tag::all()->where('type', '=', '1');
        $post = Post::find($id);
        return view('admin.post.update', ['post'=> $post, 'tags'=>$tags]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if($request->api == 'statusChange'){
            Post::where('id', $request->id)->update(['status' => $request->status]);
        }
        else if($request->api == 'typeChange'){
            Post::where('id', $request->id)->update(['type' => $request->status]);
        }
        else{
            $request->validate([
                'title' => 'required|min:5',
                'slug' => 'required',
                'description' => 'required',
                'contents' => 'required',
            ],[
                'title.required' => 'Pole tytuł jest wymagane',
                'title.unique' => 'Istnieje już tytuł o tej nazwie',
                'title.min' => 'Tytuł musi składać się z minimum 5 znaków',
                'slug.unique' => 'Istnieje już slug o tej nazwie',
                'slug.required' => 'Pole slug jest wymagane',
                'description.required' => 'Pole opis wspisu jest wymagane',
                'contents.required' => 'Pole treść jest wymagane',
            ]);
            $photoImage = $request->file('photo');

            $post = Post::find($id);
            $post->title = $request->get('title');
            $post->slug = $request->get('status');
            $post->status = $request->get('status');
            $post->description = $request->get('description');
            $post->contents = $request->get('contents');

            if(!empty($photoImage)){
                Storage::delete('public/files/shares/aktualnosci/'.$post->photo);
                Storage::putFile('public/files/shares/aktualnosci/', $request->file('photo'));
                $post->photo = $photoImage->hashName();

            }
            $post->save();
            $post->tags()->detach();
            $post->tags()->attach($request->get('tags'));
            return redirect()->route('adminPost')->with('status', 'Pomyślnie zaktualizowno rekord');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if($request->api == 'deletePost') {
            $blog = Post::find($request->id);
            $blog->delete();
        }
    }
}
