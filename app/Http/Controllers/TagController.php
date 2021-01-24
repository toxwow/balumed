<?php

namespace App\Http\Controllers;

use App\Post;
use App\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{

    public function adminTag()
    {
        $tags = Tag::all();


        return view('admin.tag.index', ['tags' => $tags]);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tag.create');
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
            'name' => 'required',
            'slug' => 'required',
            'type' => 'required',
        ],[
            'name.required' => 'Pole nazwa jest wymagane',
            'slug.unique' => 'Istnieje już slug o tej nazwie',
            'slug.required' => 'Pole slug jest wymagane',
            'type.required' => 'Pole typ jest wymagane',
        ]);

        Tag::create($request->all());

        return redirect()->route('adminTag')->with('status', 'Pomyślnie dodano tag');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tag  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tag = Tag::find($id);
        return view('admin.tag.update', ['tag'=> $tag   ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tag  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            'name' => 'required',
            'type' => 'required',
        ],[
            'name.required' => 'Pole nazwa jest wymagane',
            'slug.unique' => 'Istnieje już slug o tej nazwie',
            'slug.required' => 'Pole slug jest wymagane',
            'type.required' => 'Pole typ jest wymagane',
        ]);
        $tag = Tag::find($id);
        $tag->update($request->all());
        return redirect()->route('adminTag')->with('status', 'Pomyślnie zaktualizowno rekord');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request  $request)
    {
        if($request->api == 'deleteTag') {
            $tag = Tag::find($request->id);
            $tag->delete();
        }
    }
}
