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

        return view('clients.index', array('clients' =>  $clients, 'search_client_name' => '', 'search_client_zip' => '', 'search_client_city' => '', 'search_client_state' => '', 'search_client_phone' => '', 'search_client_email' => ''));

    }



    public function insert(Request $request)
    {

        $validator = Validator::make($request->all(), [

            'firstname' => 'required',
            'lastname' => 'required',
            'businessname' => 'required',
            'clienttype' => 'required',
            'company' => 'required',
            'email1' => 'required|email',
           

        ]);


        if ($validator->fails())
        {
            return Response::json(array(
                'success' => false,
                'errors' => $validator->getMessageBag()->toArray()

            )); // 400 being the HTTP code for an invalid request.
        }


        $client = new Client;

        $client->firstname = $request->firstname;
        $client->lastname = $request->lastname;
        $client->businessname = $request->businessname;
        $client->client_type_id = $request->clienttype;
        $client->company_id = $request->company;
        $client->address = $request->address;
        $client->zip = $request->zip;
        $client->city = $request->city;
        $client->state = $request->state;
        $client->contact_person_1 = $request->contactperson1;
        $client->contact_person_2 = $request->contactperson2;
        $client->contact_person_3 = $request->contactperson3;
        $client->phone_1 = $request->phone1;
        $client->phone_2 = $request->phone2;
        $client->cell_no = $request->cellno;
        $client->email_1 = $request->email1;
        $client->email_2 = $request->email2;
        $client->email_3 = $request->email3;

        $client->daily_backup = 'yes';
        $client->weekly_backup = 'yes';
        $client->business_category_id = 1;






        $client->save();

        return response()->json($client);




    }

}
