<?php

namespace App\Http\Controllers;

use App\Info;
use App\Post;
use App\Service;
use App\Specialist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\In;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $services = Service::all()->where('status', '=', '1' )->where('main', '=', '1' );
        $specialists = Specialist::with('services')->where('homepage', '=', '1')->get();
        $articles = Post::all()->where('status', '=', '1' )->where("type", "!=", "2")->sortByDesc('updated_at');

        return view('pages._home', [ 'services' => $services, 'specialists' => $specialists, 'articles' => $articles]);
    }

    public function galery()
    {
        return view('pages._galery');
    }

    public function admin()
    {
        $user = Auth::user();
        return view('admin.main');
    }

}
