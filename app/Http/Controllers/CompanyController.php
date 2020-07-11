<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Company;

use Validator;

use Response;




class CompanyController extends Controller
{
    
    
    public function index()
    {

        $companies =  Company::orderBy('name', 'asc')->paginate(5);

        return view('companies.index', array('companies' =>  $companies, 'search_company_name' => '', 'search_contact_person' => ''));

    }



    public function indexsearch(Request $request)
    {

        $searchmap = array();

        if(!empty($request->input('search_company_name')))
        {   
            array_push($searchmap, array('name',   'like', '%'.$request->input('search_company_name').'%'));
        }


        if(!empty($request->input('search_contact_person')))
        {  
            array_push($searchmap, array('contact_person',   'like', '%'.$request->input('search_contact_person').'%'));
        }
        

        $companies =  Company::where($searchmap)->orderBy('name', 'asc')->paginate(5);

        return view('companies.paginated_data', array('companies' =>  $companies, 'search_company_name' => $request->input('search_company_name'), 'search_contact_person' => $request->input('search_contact_person')));

    }



    public function ajaxpagination(Request $request)
    { 

        if($request->ajax())
        {

            $searchmap = array();

            if(!empty($request->input('search_company_name')))
            {  
                array_push($searchmap, array('name',   'like', '%'.$request->input('search_company_name').'%'));
                   
            }


            if(!empty($request->input('search_contact_person')))
            {   
                array_push($searchmap, array('contact_person',   'like', '%'.$request->input('search_contact_person').'%'));
                
            }


            $companies =  Company::where($searchmap)->orderBy('name', 'asc')->paginate(5);

            return view('companies.paginated_data', array('companies' => $companies, 'search_company_name' => $request->input('search_company_name'), 'search_contact_person' => $request->input('search_contact_person')));

        }

    }


    
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [

            'companyname' => 'required|unique:companies,name',
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


        $company = new Company;

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

    }  // end function store()



    public function edit(Request $request)
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

    }  // end function edit()


    public function fetch(Request $request)
    {
        $company =  Company::find($request->id);
        return response()->json($company);
    }


}
