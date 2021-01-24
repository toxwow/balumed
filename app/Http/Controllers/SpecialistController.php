<?php

namespace App\Http\Controllers;

use App\Service;
use App\Specialist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class SpecialistController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show', 'index']]);
    }

    public function adminSpecialist()
    {

        $specialists = Specialist::with('services')->get();
        return view('admin.specialist.index', [  'specialists' => $specialists]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $specialists = Specialist::with('services')->where('status', '=', '1')->get();

        return view('pages._specialists', [ 'specialists' => $specialists]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $services = Service::all();
        return view('admin.specialist.create', ['services' => $services]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        {
            $request->validate([
                'name' => 'required',
                'slug' => 'required|unique:specialists',
                'description' => 'required',
                'titlePerson' => 'required',
                'photo' => 'required|mimes:jpeg,png,bmp,tiff|max:4096',
            ],[
                'name.required' => 'Pole nazwa jest wymagane',
                'slug.unique' => 'Istnieje już slug o tej nazwie',
                'slug.required' => 'Pole slug jest wymagane',
                'titlePerson.required' => 'Pole tytuł naukowy jest wymagane',
                'description.required' => 'Pole opis wspisu jest wymagane',
                'photo.required' => 'Zdjęcie jest wymagane',
                'photo.mimes' => 'Zły format zdjęcia',
                'photo.max' => 'Zdjęcie jest za duże',
            ]);
            $photo =  $request->file('photo');
            Storage::putFile('public/files/shares/specjalisci/', $request->file('photo'));

            $specialist = new Specialist([
                'photo' => $photo->hashName(),
                'name' => $request->get('name'),
                'titlePerson' => $request->get('titlePerson'),
                'slug' => $request->get('slug'),
                'status' => $request->get('status'),
                'description' => $request->get('description')
            ]);
            $specialist->save();
            $specialist->services()->attach($request->get('services'));

            return redirect()->route('adminSpecialist')->with('status', 'Pomyślnie dodano specjalistę');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Specialist  $specialist
     * @return \Illuminate\Http\Response
     */
    public function show(Specialist $specialist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Specialist  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $specialist = Specialist::find($id);
        $services = Service::all();
        return view('admin.specialist.update', ['specialist'=> $specialist, 'services' => $services]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Specialist  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($request->api == 'statusChange') {
            Specialist::where('id', $request->id)->update(['status' => $request->status]);
        }else {
            $request->validate([
                'name' => 'required',
                'slug' => 'required',
                'description' => 'required',
            ], [
                'name.required' => 'Pole nazwa jest wymagane',
                'slug.unique' => 'Istnieje już slug o tej nazwie',
                'slug.required' => 'Pole slug jest wymagane',
                'titlePerson.required' => 'Pole tytuł naukowy jest wymagane',
                'description.required' => 'Pole opis wspisu jest wymagane',
            ]);

            $photoImage = $request->file('photo');
            $specialist = Specialist::find($id);
            $specialist->name = $request->get('name');
            $specialist->titlePerson = $request->get('titlePerson');
            $specialist->slug = $request->get('slug');
            $specialist->status = $request->get('status');
            $specialist->description = $request->get('description');

            if (!empty($photoImage)) {
                Storage::delete('public/files/shares/specjalisci/' . $specialist->icon);
                Storage::putFile('public/files/shares/specjalisci/', $request->file('photo'));
                $specialist->photo = $photoImage->hashName();
            }
            $specialist->services()->detach();
            $specialist->services()->attach($request->get('services'));
            $specialist->save();

            return redirect()->route('adminSpecialist')->with('status', 'Pomyślnie zaktualizowno rekord');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Specialist  $specialist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request  $request, Specialist $specialist)
    {
        if($request->api == 'deleteService') {
            $specialist = Specialist::find($request->id);
            $specialist->services()->detach();
            $specialist->delete();
        }
    }
}
