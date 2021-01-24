<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show', 'index']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function adminBlog()
    {
        $blogs = Blog::with('tags')->orderByDesc('created_at')->paginate('5');
        return view('admin.blog.index', ['blogs'=>$blogs]);
    }

    public function index()
    {
        $posts = Blog::with('tags')->orderByDesc('created_at')->where('status', '=', '1' )->get();

        return view('pages._blogs', [ 'posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all()->where('type', '=', '0');
        return view('admin.blog.create', ['tags'=>$tags]);
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
        Storage::putFile('public/files/shares/blog/', $request->file('photo'));

        $blog = new Blog([
            'photo' => $photo->hashName(),
            'title' => $request->get('title'),
            'slug' => $request->get('slug'),
            'status' => $request->get('status'),
            'description' => $request->get('description'),
            'contents' => $request->get('contents'),
        ]);
        $blog->save();
        $blog->tags()->attach($request->get('tags'));
//        Blog::create($request->all());

        return redirect()->route('adminBlog')->with('status', 'Pomyślnie dodano wpis bloga');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Blog  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = Blog::with('tags')->where('slug', '=', $slug)->first();
        if(empty($post)){
            abort(404);
        }
        else{
            return view('pages._blog', [ 'post' => $post]);
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Blog  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tags = Tag::all()->where('type', '=', '0');
        $blog = Blog::find($id);
        return view('admin.blog.update', ['blog'=> $blog, 'tags' => $tags]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Blog  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {


        if($request->api == 'statusChange'){
            Blog::where('id', $request->id)->update(['status' => $request->status]);
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

            $blog = Blog::find($id);
            $blog->title = $request->get('title');
            $blog->slug = $request->get('status');
            $blog->status = $request->get('status');
            $blog->description = $request->get('description');
            $blog->contents = $request->get('contents');

            if(!empty($photoImage)){
                Storage::delete('public/files/shares/blog/'.$blog->photo);
                Storage::putFile('public/files/shares/blog/', $request->file('photo'));
                $blog->photo = $photoImage->hashName();

            }


            $blog->tags()->detach();
            $blog->tags()->attach($request->get('tags'));

            $blog->save();
//
//            $input = $request->all();
//            $selectBlog->update($input);
            return redirect()->route('adminBlog')->with('status', 'Pomyślnie zaktualizowno rekord');
        }



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Blog $blog)
    {
        if($request->api == 'deleteBlog') {
            $blog = Blog::find($request->id);
            $blog->delete();
        }


    }
}
