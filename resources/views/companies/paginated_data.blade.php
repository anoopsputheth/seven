

    @foreach($companies as $company)

    <tr> 
    
         <td width="22%"> {{ $company->name }} </td>

         <td width="22%"> {{ $company->contact_person }} </td>

         <td width="22%"> {{ $company->phone }} </td>

         <td width="22%"> {{ $company->email }} </td>

         <td width="14%"> 

         <a href="#modal_view_company" data-toggle="modal" data-view_company_id="<?= $company->id; ?>"><button class="btn btn-info btn-sm">View</button></a> 

         <a href="#modal_edit_company" data-toggle="modal" data-update_company_id="<?= $company->id; ?>"><button class="btn btn-warning btn-sm">Edit</button></a>
         
         <a href="#modal_delete_company" data-toggle="modal" data-delete_company_id="<?= $company->id; ?>"><button class="btn btn-danger btn-sm">Delete</button></a>
         </td>


    </tr>

    @endforeach


    <tr> <td colspan="4"> {!! $companies->links() !!} </td> </tr>









