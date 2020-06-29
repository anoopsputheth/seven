<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use  Illuminate\Support\Facades\DB;

use App\User;

class UserController extends Controller
{


    public function uploadAvatar(Request $request)
    {

       
            if($request->hasFile('image'))
            {
               $filename = $request->image->getClientOriginalName();

               $request->image->storeAs('images', $filename, 'public');

               auth()->user()->update(['avatar' => $filename]);

               return redirect()->back();

            }

    }
   
    public function index()
    {

        DB::insert('insert into users (name, email, password) values (?,?,?)', [

            'Sarthak',
            'sarthak@bitfumes.com',
            'password'
        ]);

        return view('home');
    }

}
