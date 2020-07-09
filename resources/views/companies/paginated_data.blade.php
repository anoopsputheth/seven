<h1 > Companies </h1>

<table width="100%" class="table">

   <tr> <th>Company Name</th> <th>Contact Person</th> <th>Phone</th> <th>Email</th> <th>Action</th> </tr>

   <tr> 
   
     <td>{{  Form::text('search_company_name', $search_company_name , array('id' => 'search_text_company_name', 'class' => 'form-control')) }}</td> 

     <td>{{  Form::text('search_contact_person', '' , array('id' => 'search_text_contact_person', 'class' => 'form-control')) }}</td>

     <td>{{  Form::text('search_phone', '' , array('id' => 'search_text_phone', 'class' => 'form-control')) }}</td> 

     <td>{{  Form::text('search_email', '' , array('id' => 'search_text_email', 'class' => 'form-control')) }}</td> 

     <td> &nbsp; </td> 

   </tr>

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


</table>






