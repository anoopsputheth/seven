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


                      <br />

      
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

 


