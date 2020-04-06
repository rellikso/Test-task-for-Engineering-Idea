<?php

namespace App\Http\Controllers;

use App\Bulletin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Session;

class BulletinController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  Request  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(Request $data)
    {
        return Validator::make($data, [
            'header' => ['required', 'string', 'max:255'],
            'image' => ['image|mimes:jpeg,png,jpg,gif,svg'],
            'text' => ['required', 'string'],
        ]);
    }

    /**
     * Create a new bulletin instance.
     *
     * @param  array $data
     * @return \App\Bulletin
     */
    protected function create(Request $data)
    {
        if ($data->image) {
            $imageName = time().'.'.$data->image->getClientOriginalExtension();
            $path = str_replace($_SERVER['DOCUMENT_ROOT'], '', public_path('images')) . '/' . $imageName;
            $data->image->move(public_path('images'), $imageName);
        } else {
            $path = $imageName = '';
        }


        if (Bulletin::create([
            'user_id' => $data->user_id,
            'src' => $path,
            'header' => $data->header,
            'text' => nl2br($data->text),
        ])) {
            Session::flash('flash_message', 'Bulletin added successfully.');
            Session::flash('flash_type', 'alert-success');
        } else {
            Session::flash('flash_message', 'Bulletin wasn\'t added. Something went wrong.');
            Session::flash('flash_type', 'alert-error');
        }

        return redirect('add');
    }

    /**
     * Show the add bulletin form.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();

        return view('addbulletin')->with('user', $user);
    }
}
