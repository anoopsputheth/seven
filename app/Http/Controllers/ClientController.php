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

        $clients =  Client::orderBy('lastname', 'asc')->paginate(2);

        return view('clients.index', array('clients' =>  $clients, 'search_client_name' => '', 'search_client_zip' => '', 'search_client_city' => '', 'search_client_state' => '', 'search_client_phone' => '', 'search_client_email' => ''));

    }


    public function indexsearch(Request $request)
    {

        $searchmap = array();

        if(!empty($request->input('search_client_name')))
        {   
            array_push($searchmap, array(\DB::raw('concat(firstname, " ", lastname)'),   'like', '%'.$request->input('search_client_name').'%'));
          
        }


        if(!empty($request->input('search_client_phone')))
        {  
            array_push($searchmap, array('phone_1',   'like', '%'.$request->input('search_client_phone').'%'));
        }


        if(!empty($request->input('search_client_email')))
        {  
            array_push($searchmap, array('email_1',   'like', '%'.$request->input('search_client_email').'%'));
        }
        

        $clients =  Client::where($searchmap)->orderBy('firstname', 'asc')->paginate(2);

        return view('clients.paginated_data', array('clients' =>  $clients, 'search_client_name' => $request->input('search_client_name'), 'search_client_phone' => $request->input('search_client_phone'), 'search_client_email' => $request->input('search_client_email')));

    }



    public function ajaxpagination(Request $request)
    { 

        if($request->ajax())
        {

            $searchmap = array();

            if(!empty($request->input('search_client_name')))
            {   
                array_push($searchmap, array(\DB::raw('concat(firstname, " ", lastname)'),   'like', '%'.$request->input('search_client_name').'%'));
            
            }


            if(!empty($request->input('search_client_phone')))
            {  
                array_push($searchmap, array('phone_1',   'like', '%'.$request->input('search_client_phone').'%'));
            }


            if(!empty($request->input('search_client_email')))
            {  
                array_push($searchmap, array('email_1',   'like', '%'.$request->input('search_client_email').'%'));
            }


            $clients =  Client::where($searchmap)->orderBy('firstname', 'asc')->paginate(2);

            return view('clients.paginated_data', array('clients' =>  $clients, 'search_client_name' => $request->input('search_client_name'), 'search_client_phone' => $request->input('search_client_phone'), 'search_client_email' => $request->input('search_client_email')));

        }

    }



    public function insert(Request $request)
    {

        $validation_messages = [

            'required' => ':attribute field is required.',
            'required_if' => ':attribute field is required.',
            'email' => ':attribute must be a valid email address.',

        ];


        $validator = Validator::make($request->all(), [

            'firstname' => 'required_if:clienttype,4',
            'lastname' => 'required_if:clienttype,4',
            'businessname' => 'required_if:clienttype,3',
            'clienttype' => 'required',
            'company' => 'required',
            'email1' => 'required|email',
            'email2' => 'sometimes|nullable|email',
            'email3' => 'sometimes|nullable|email',
            'businesscategory' => 'required',
           

        ], $validation_messages);


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
        $client->fax = $request->fax;
        $client->client_referral = $request->clientreferral;
        $client->business_category_id = $request->businesscategory;
        $client->office_working_day_start = $request->officestartday;
        $client->office_working_day_end = $request->officeendday;
        $client->office_working_hour_start = $request->officestarthour;
        $client->office_working_hour_end = $request->officeendhour;
        $client->daily_backup = $request->dailybackup;
        $client->weekly_backup = $request->weeklybackup;
        $client->description = $request->description;
        
        
        $client->save();

        return response()->json($client);


    }


    public function fetch(Request $request)
    {
        $client =  Client::find($request->id);
        return response()->json($client);
    }


    public function update(Request $request)
    {

        $validator = Validator::make($request->all(), [

            'companyname' => 'required|unique:companies,name,'.$request->id.'',
            'contactperson' => 'required',
            'companyphone' => 'required',
            'companyemail' => 'required|email'

        ]);


        if ($validator->fails())
        {
            return Response::json(array(
                'success' => false,
                'errors' => $validator->getMessageBag()->toArray()

            )); // 400 being the HTTP code for an invalid request.
        }


        $company = Company::find($request->id);

        //return response()->json($company);

        $company->name = $request->companyname;
        $company->contact_person = $request->contactperson;
        $company->address = $request->companyaddress;
        $company->phone = $request->companyphone;
        $company->fax = $request->companyfax;
        $company->email = $request->companyemail;
        $company->zip = $request->companyzip;
        $company->city = $request->companycity;
        $company->state = $request->companystate;
        $company->description = $request->companydescription;

        $company->save();

        return response()->json($company);

    }  // end function update()

}
