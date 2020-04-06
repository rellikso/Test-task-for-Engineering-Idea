<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class AccountController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the user data.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();

        return view('account')->with('user', $user);
    }

    /**
     * Update the user data.
     */
    public function update(Request $request)
    {
        $user = Auth::user();

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;

        if ($request->password)
        {
            $user->password = bcrypt($request->password);
        }

        $user->save();

        Session::flash('flash_message', 'You\'ve just edited your profile.');
        Session::flash('flash_type', 'alert-info');
        return redirect('account');
    }
}
