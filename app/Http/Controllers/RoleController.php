<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Role;

use Validator;

use Response;

use DB;




class RoleController extends Controller
{
    
    
    public function index()
    {  

        $roles =  Role::orderBy('name', 'asc')->paginate(15);

        return view('roles.index', array('roles' =>  $roles, 'search_role_name' => ''));

    }



    public function indexsearch(Request $request)
    {

        $searchmap = array();

        if(!empty($request->input('search_role_name')))
        {   
            array_push($searchmap, array('name',   'like', '%'.$request->input('search_role_name').'%'));
        }

      
        $roles =  Role::where($searchmap)->orderBy('name', 'asc')->paginate(15);

        return view('roles.paginated_data', array('roles' =>  $roles, 'search_role_name' => $request->input('search_role_name')));

    }



    public function ajaxpagination(Request $request)
    { 

        if($request->ajax())
        {

            $searchmap = array();

            if(!empty($request->input('search_role_name')))
            {  
                array_push($searchmap, array('name',   'like', '%'.$request->input('search_role_name').'%'));
                   
            }


            $roles =  Role::where($searchmap)->orderBy('name', 'asc')->paginate(15);

            return view('roles.paginated_data', array('roles' => $companies, 'search_role_name' => $request->input('search_role_name')));

        }

    }


    
    public function insert(Request $request)
    {   

        $validation_messages = [

            'required' => ':attribute field is required.',
        ];
        

        $validator = Validator::make($request->all(), [

            'rolename' => 'required|unique:roles,name',

        ], $validation_messages);


        if ($validator->fails())
        {
            return Response::json(array(
                'success' => false,
                'errors' => $validator->getMessageBag()->toArray()

            )); // 400 being the HTTP code for an invalid request.
        }


        $role = new Role;

        $role->name = $request->rolename;
        $role->description = $request->roledescription;
        
        $role->save();

$a=array("ss","ll");
        foreach(JSON.parse($request->actions) as $action)
        {

            DB::table('role_action')->insert([

                ['role_id' => 44, 'action' => $action],
               
            ]);

        }

        

        return response()->json($role);


    }  // end function insert()



    public function fetch(Request $request)
    {
        $role =  Role::find($request->id);
        return response()->json($role);
    }



    public function update(Request $request)
    {

        $validator = Validator::make($request->all(), [

            'rolename' => 'required|unique:roles,name,'.$request->id.'',
            
        ]);


        if ($validator->fails())
        {
            return Response::json(array(
                'success' => false,
                'errors' => $validator->getMessageBag()->toArray()

            )); // 400 being the HTTP code for an invalid request.
        }


        $role = Role::find($request->id);

        //return response()->json($role);

        $role->name = $request->rolename;
        $role->description = $request->roledescription;
      
        $role->save();

        return response()->json($role);

    }  // end function update()


}
