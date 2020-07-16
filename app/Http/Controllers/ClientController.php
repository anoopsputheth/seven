<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Client;

use Validator;

use Response;




class ClientController extends Controller
{
    
    
    public function index()
    {

        $clients =  Client::orderBy('lastname', 'asc')->paginate(15);

        return view('clients.index', array('clients' =>  $clients, 'search_firstname' => '', 'search_lastname' => ''));

    }

}
