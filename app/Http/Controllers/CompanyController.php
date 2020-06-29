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

        $companies =  Company::paginate(15);

        return view('companies.index', compact('companies'));

    }


    public function ajaxpagination(Request $request)
    { 

        if($request->ajax())
        {
            $companies =  Company::paginate(15);

            return view('companies.paginated_data', compact('companies'));

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


    public function fetch(Request $request)
    {
        $company =  Company::find($request->id);;
        return response()->json($company);
    }


}
