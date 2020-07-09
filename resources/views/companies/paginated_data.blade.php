

    @foreach($companies as $company)

    <tr> 
    
         <td width="25%"> {{ $company->name }} </td>

         <td width="25%"> {{ $company->contact_person }} </td>

         <td width="25%"> {{ $company->phone }} </td>

         <td width="25%"> {{ $company->email }} </td>

         <td width="25%"> <a href="#modal_edit_company" data-toggle="modal" data-company_id="<?= $company->id; ?>"><button class="btn btn-warning btn-sm">Edit</button></a> </td>


    </tr>

    @endforeach


    <tr> <td colspan="4"> {!! $companies->links() !!} </td> </tr>









