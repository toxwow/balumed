<?php

namespace App\Http\Controllers;

use App\Service;
use App\Specialist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show', 'index']]);
    }

    public function adminService()
    {
        $services = DB::table('services')->orderByDesc('priority')->get();
        return view('admin.service.index', ['services' => $services]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::all()->where('status', '=', '1');

        return view('pages._services', ['services' => $services]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.service.create');
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
            'slug' => 'required|unique:services',
            'intro' => 'required',
            'description' => 'required',
            'metaDescriptionService' => 'required',
            'pageTitleService' => 'required',
            'icon' => 'required|mimes:jpeg,png,bmp,tiff,svg|max:4096',
        ], [
            'name.required' => 'Pole nazwa jest wymagane',
            'slug.unique' => 'Istnieje już slug o tej nazwie',
            'slug.required' => 'Pole slug jest wymagane',
            'intro.required' => 'Pole wstępny opis jest wymagane',
            'metaDescriptionService.required' => 'Pole seo meta  jest wymagane',
            'pageTitleService.required' => 'Pole title seo jest wymagane',
            'description.required' => 'Pole opis wspisu jest wymagane',
            'icon.required' => 'Zdjęcie jest wymagane',
            'icon.mimes' => 'Zły format zdjęcia',
            'icon.max' => 'Zdjęcie jest za duże',
        ]);

        $photo =  $request->file('icon');
        Storage::putFile('public/files/shares/uslugi/icon', $request->file('icon'));

        $service = new Service([
            'icon' => $photo->hashName(),
            'name' => $request->get('name'),
            'intro' => $request->get('intro'),
            'pageTitleService' => $request->get('pageTitleService'),
            'metaDescriptionService' => $request->get('metaDescriptionService'),
            'slug' => $request->get('slug'),
            'status' => $request->get('status'),
            'description' => $request->get('description')
        ]);
        $service->save();
        //        Blog::create($request->all());

        return redirect()->route('adminService')->with('status', 'Pomyślnie dodano usługę');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Service  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $services = Service::all()->where('status', '=', '1')->sortByDesc('priority');
        $service = DB::table('services')->where('slug', $slug)->first();
        $specialists = DB::table('service_specialist')->where('service_id', '=', $service->id)->get();
        $specialistArray = array();
        foreach ($specialists as $specialist){
            array_push($specialistArray, Specialist::where('id', $specialist->specialist_id)->get());
        }
        if (empty($service)) {
            abort(404);
        } else {
            return view('pages._single_service', ['service' => $service, 'services' => $services, 'specialists' => $specialistArray]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Service  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $service = Service::find($id);
        return view('admin.service.update', ['service' => $service]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Service  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($request->api == 'statusChange') {
            Service::where('id', $request->id)->update(['status' => $request->status]);
        } elseif ($request->api == 'priorityChange') {
            Service::where('id', $request->id)->update(['priority' => $request->status]);
        } else {
            $request->validate([
                'name' => 'required',
                'slug' => 'required',
                'intro' => 'required',
                'description' => 'required',
                'pageTitleService' => 'required',
                'metaDescriptionService' => 'required',
            ], [
                'name.required' => 'Pole nazwa jest wymagane',
                'slug.unique' => 'Istnieje już slug o tej nazwie',
                'slug.required' => 'Pole slug jest wymagane',
                'metaDescriptionService.required' => 'Pole seo meta  jest wymagane',
                'pageTitleService.required' => 'Pole title seo jest wymagane',
                'intro.required' => 'Pole wstępny opis jest wymagane',
                'description.required' => 'Pole opis wspisu jest wymagane',
            ]);

            $photoImage = $request->file('icon');
            $service = Service::find($id);
            $service->name = $request->get('name');
            $service->slug = $request->get('slug');
            $service->intro = $request->get('intro');
            $service->metaDescriptionService = $request->get('metaDescriptionService');
            $service->pageTitleService = $request->get('pageTitleService');
            $service->status = $request->get('status');
            $service->main = $request->get('main');
            $service->priority = $service->priority;
            $service->description = $request->get('description');

            if (!empty($photoImage)) {
                Storage::delete('public/files/shares/uslugi/icon' . $service->icon);
                Storage::putFile('public/files/shares/uslugi/icon', $request->file('icon'));
                $service->icon = $photoImage->hashName();
            }


            $service->save();
            //
            //            $input = $request->all();
            //            $selectBlog->update($input);
            return redirect()->route('adminService')->with('status', 'Pomyślnie zaktualizowno rekord');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Service $service)
    {
        if ($request->api == 'deleteService') {
            $service = Service::find($request->id);
            $service->delete();
        }
    }
}
