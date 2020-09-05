@extends('layouts.app')


@section('content')

<div id="div_container_btn_create" class="class_container_btn_create">

  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_create_role">
    Create Role
  </button>

</div>
 

  <div class="table-responsive" id="table_paginated_data">  

  
  <h1 > Roles </h1>


  <div>

  <table width="100%" class="table" border="0">

    <thead> <tr> <th>Role Name</th>  <th>Action</th> </tr> </thead>

    <tbody><tr> 
    
      <td width="22%">{{  Form::text('search_role_name', $search_role_name , array('id' => 'search_text_role_name', 'class' => 'form-control')) }}</td> 

    
      <td  width="14%"> &nbsp; </td> 

    </tr></tbody>

    </table>

   </div>

    
    <div>

    <table id="table_paginted_roles" width="100%" class="table"  border="0">

    <tbody>

    @include('roles.paginated_data')

    </tbody>

    </table>

    </div>



  </div>

         
         
 

          <!-- Modal Div Start -->
          <div class="modal fade" id="modal_create_role" tabindex="-1" role="dialog" aria-labelledby="modal_create_role_label" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">


                    <div class="modal-header">
                      <h5 class="modal-title" id="modal_create_company_label">CREATE ROLE</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>


                    <div class="modal-body">

                      {{ Form::open(array('id' => 'form_role_create')) }}

                      
                      {{  Form::label('role_name') }} 

                      {{  Form::text('role_name_create_role', '' , array('id' => 'input_text_role_name_create_role', 'class' => 'form-control')) }}

                      <div id="role_create_error_div_rolename"></div>
                      
    
                      <br />


                      {{  Form::label('role_description') }}

                      {{  Form::text('role_description_create_role', '' , array('id' => 'input_text_role_description_create_role', 'class' => 'form-control')) }}

                      
                      <br />  <br /> 


                      {{  Form::label('role') }}

                      <br />


                      {!! Form::checkbox('role_view_role_create_role', 'role.index', null, array('id' => 'input_chkbox_role_view_role_create_role')) !!}

                      {{  Form::label('view_role') }}


                      &nbsp; &nbsp;


                      {!! Form::checkbox('role_create_role_create_role', 'role.create', null, array('id' => 'input_chkbox_role_create_role_create_role')) !!}

                      {{  Form::label('create_role') }}


                      &nbsp; &nbsp;


                      {!! Form::checkbox('role_update_role_create_role', 'role.update', null, array('id' => 'input_chkbox_role_update_role_create_role')) !!}

                      {{  Form::label('update_role') }}


                      &nbsp; &nbsp;


                      {!! Form::checkbox('role_delete_role_create_role', 'role.delete', null, array('id' => 'input_chkbox_role_update_role_create_role')) !!}

                      {{  Form::label('delete_role') }}



                      <br />  <br /> 



                      {{  Form::label('company') }}

                      <br />


                      {!! Form::checkbox('role_view_company_create_role', 'company.index', null, array('id' => 'input_chkbox_role_view_company_create_role')) !!}

                      {{  Form::label('view_company') }}


                      &nbsp; &nbsp;


                      {!! Form::checkbox('role_create_company_create_role', 'company.create', null, array('id' => 'input_chkbox_role_create_company_create_role')) !!}

                      {{  Form::label('create_company') }}


                      &nbsp; &nbsp;


                      {!! Form::checkbox('role_update_company_create_role', 'company.update', null, array('id' => 'input_chkbox_role_update_company_create_role')) !!}

                      {{  Form::label('update_company') }}


                      &nbsp; &nbsp;


                      {!! Form::checkbox('role_delete_company_create_role', 'company.delete', null, array('id' => 'input_chkbox_role_update_company_create_role')) !!}

                      {{  Form::label('delete_company') }}



                      <br />  <br /> 


                      {{  Form::label('client') }}

                      <br />


                      {!! Form::checkbox('role_view_client_create_role', 'client.index', null, array('id' => 'input_chkbox_role_view_client_create_role')) !!}

                      {{  Form::label('view_client') }}


                      &nbsp; &nbsp;


                      {!! Form::checkbox('role_create_client_create_role', 'client.create', null, array('id' => 'input_chkbox_role_create_client_create_role')) !!}

                      {{  Form::label('create_client') }}


                      &nbsp; &nbsp;


                      {!! Form::checkbox('role_update_client_create_role', 'client.update', null, array('id' => 'input_chkbox_role_update_client_create_role')) !!}

                      {{  Form::label('update_client') }}


                      &nbsp; &nbsp;


                      {!! Form::checkbox('role_delete_client_create_role', 'client.delete', null, array('id' => 'input_chkbox_role_update_client_create_role')) !!}

                      {{  Form::label('delete_client') }}



                      {{ Form::close() }}
                      
                    </div>


                    <div class="modal-footer">
                      

                    
                      {{  Form::button('Close', ['id' => 'btn_close_modal_create_role', 'class' => 'btn btn-danger btn-sm']) }}

                      {{  Form::button('Create', ['id' => 'btn_create_role', 'class' => 'btn btn-success btn-sm'])  }}

                    </div>


              </div>
            </div>
          </div>

        <!-- Modal Div End -->



        <!-- Modal Div Start -->
        <div class="modal fade" id="modal_view_role" tabindex="-1" role="dialog" aria-labelledby="modal_view_role_label" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">


                    <div class="modal-header">
                      <h5 class="modal-title" id="modal_view_role_label">VIEW ROLE</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>


                    <div class="modal-body">

                      {{ Form::open(array('id' => 'form_role_view')) }}

                      
                      {{  Form::label('role_name') }} 

                      {{  Form::text('role_name_view_role', '' , array('id' => 'input_text_role_name_view_role', 'class' => 'form-control', 'disabled')) }}
                      
    
                      <br />


                      {{  Form::label('role_description') }}

                      {{  Form::text('role_description_view_role', '' , array('id' => 'input_text_role_description_view_role', 'class' => 'form-control', 'disabled')) }}


                      <br />
                      

                      {{ Form::close() }}
                      
                    </div>


                    <div class="modal-footer">
                      

                    
                      {{  Form::button('Close', ['id' => 'btn_close_modal_view_role', 'class' => 'btn btn-danger btn-sm']) }}

                     

                    </div>


              </div>
            </div>
          </div>

        <!-- Modal Div End -->




        <!-- Modal Div Start -->
        <div class="modal fade" id="modal_edit_role" tabindex="-1" role="dialog" aria-labelledby="modal_edit_role_label" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">


                    <div class="modal-header">
                      <h5 class="modal-title" id="modal_create_company_label">EDIT ROLE</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>


                    <div class="modal-body">

                      {{ Form::open(array('id' => 'form_role_edit')) }}

                      
                      {{  Form::label('role_name') }} 

                      {{  Form::text('role_name_edit_role', '' , array('id' => 'input_text_role_name_edit_role', 'class' => 'form-control')) }}

                      <div id="role_update_error_div_rolename"></div>
                      
    
                      <br />


                      {{  Form::label('role_description') }}

                      {{  Form::text('role_description_edit_role', '' , array('id' => 'input_text_role_description_edit_role', 'class' => 'form-control')) }}


                      {{ Form::hidden('role_id_edit_role', '', array('id' => 'input_hidden_role_id_edit_role')) }}

                      {{ Form::close() }}
                      
                    </div>


                    <div class="modal-footer">
                      

                    
                      {{  Form::button('Close', ['id' => 'btn_close_modal_edit_role', 'class' => 'btn btn-danger btn-sm']) }}

                      {{  Form::button('Update', ['id' => 'btn_update_role', 'class' => 'btn btn-success btn-sm'])  }}

                    </div>


              </div>
            </div>
          </div>

        <!-- Modal Div End -->

 

  <script src="{!!url('/js/jquery.3.5.1.min.js')!!}"></script>

  <script src="{!!url('/js/roles_main.js')!!}"></script>

 @endsection

 


