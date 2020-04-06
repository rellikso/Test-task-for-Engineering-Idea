<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the bulletin board.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $bulletins = DB::table('bulletins')
            ->join('users', 'users.id', '=', 'bulletins.user_id')
            ->select('bulletins.*', 'users.first_name', 'users.last_name')
            ->paginate(10);

        return view('home', ['bulletins' => $bulletins]);
    }

    /**
     * Show the current bulletin.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function view($id)
    {
        $bulletin = DB::table('bulletins')
            ->join('users', 'users.id', '=', 'bulletins.user_id')
            ->select('bulletins.*', 'users.first_name', 'users.last_name')
            ->where('bulletins.id', $id)
            ->first();

        return view('view', ['bulletin' => $bulletin]);
    }
}
