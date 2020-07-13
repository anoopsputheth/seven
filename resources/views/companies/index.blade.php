@extends('layouts.app')


@section('content')

<div id="div_container_btn_create" class="class_container_btn_create">

  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_create_company">
    Create Company
  </button>

</div>
 

  <div class="table-responsive" id="table_paginated_data">  

  
  <h1 > Companies </h1>


  <div>

  <table width="100%" class="table">

    <tr> <th>Company Name</th> <th>Contact Person</th> <th>Phone</th> <th>Email</th> <th>Action</th> </tr>

    <tbody><tr> 
    
      <td>{{  Form::text('search_company_name', $search_company_name , array('id' => 'search_text_company_name', 'class' => 'form-control')) }}</td> 

      <td>{{  Form::text('search_contact_person', $search_contact_person , array('id' => 'search_text_contact_person', 'class' => array('form-control', 'class_box_search'))) }}</td>

      <td>{{  Form::text('search_phone', '' , array('id' => 'search_text_phone', 'class' => array('form-control', 'class_box_search'))) }}</td> 

      <td>{{  Form::text('search_email', '' , array('id' => 'search_text_email', 'class' => array('form-control', 'class_box_search'))) }}</td> 

      <td> &nbsp; </td> 

    </tr></tbody>

    </table>

    
    <div>

    <table id="table_paginted_companies" width="100%" class="table">

    <tbody>

    @include('companies.paginated_data')

    </tbody>

    </table>


    </div>

  </div>

         
         
 

          <!-- Modal Div Start -->
          <div class="modal fade" id="modal_create_company" tabindex="-1" role="dialog" aria-labelledby="modal_create_company_label" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">


                    <div class="modal-header">
                      <h5 class="modal-title" id="modal_create_company_label">CREATE COMPANY</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>


                    <div class="modal-body">

                      {{ Form::open(array('id' => 'form_company_create')) }}

                      
                      {{  Form::label('company_name') }} 

                      {{  Form::text('company_name', '' , array('id' => 'input_text_company_name', 'class' => 'form-control')) }}

                      <div id="company_create_error_div_companyname"></div>
                      
    
                      <br />


                      {{  Form::label('contact_person') }}

                      {{  Form::text('contact_person', '' , array('id' => 'input_text_contact_person', 'class' => 'form-control')) }}

                      <div id="company_create_error_div_contactperson"></div>

                      <br />


                      {{  Form::label('address') }}

                      {{  Form::text('company_address', '' , array('id' => 'input_text_company_address', 'class' => 'form-control')) }}

                      <br />


                      {{  Form::label('phone') }}

                      {{  Form::text('company_phone', '' , array('id' => 'input_text_company__phone', 'class' => 'form-control')) }}

                      <div id="company_create_error_div_companyphone"></div>

                      <br />


                      {{  Form::label('fax') }}

                      {{  Form::text('company_fax', '' , array('id' => 'input_text_company_fax', 'class' => 'form-control')) }}

                      <br />


                      {{  Form::label('email') }}

                      {{  Form::text('company_email', '' , array('id' => 'input_text_company_email', 'class' => 'form-control')) }}

                      <div id="company_create_error_div_companyemail"></div>


                      <br />


                      {{  Form::label('zip') }}

                      {{  Form::text('company_zip', '' , array('id' => 'input_text_company_zip', 'class' => 'form-control')) }}
                      

                      <br />

                      {{  Form::label('city') }}

                      {{  Form::text('company_city', '' , array('id' => 'input_text_company_city', 'class' => 'form-control')) }}


                      <br />

                      {{  Form::label('state') }}

                      {{  Form::text('company_state', '' , array('id' => 'input_text_company_state', 'class' => 'form-control')) }}


                     
                      <br />
                   
                      {{  Form::label('description') }}

                      {!! Form::textarea('company_description', '', array('id' => 'input_text_company_description', 'class' => 'form-control', 'rows' => 4, 'cols' => 54)) !!}

      
                      {{ Form::close() }}
                      
                    </div>


                    <div class="modal-footer">
                      

                    
                      {{  Form::button('Close', ['id' => 'btn_close_modal_create_company', 'class' => 'btn btn-danger btn-sm']) }}

                      {{  Form::button('Create', ['id' => 'btn_create_company', 'class' => 'btn btn-success btn-sm'])  }}

                    </div>


              </div>
            </div>
          </div>

        <!-- Modal Div End -->



        <!-- Modal Div Start -->
        <div class="modal fade" id="modal_view_company" tabindex="-1" role="dialog" aria-labelledby="modal_view_company_label" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">


                    <div class="modal-header">
                      <h5 class="modal-title" id="modal_view_company_label">VIEW COMPANY</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>


                    <div class="modal-body">

                      {{ Form::open(array('id' => 'form_company_view')) }}

                      
                      {{  Form::label('company_name_view') }} 

                      {{  Form::text('company_name_view', '' , array('id' => 'input_text_company_name_view', 'class' => 'form-control', 'disabled')) }}
                      
    
                      <br />


                      {{  Form::label('contact_person_view') }}

                      {{  Form::text('contact_person_view', '' , array('id' => 'input_text_contact_person_view', 'class' => 'form-control', 'disabled')) }}


                      <br />


                      {{  Form::label('address_view') }}

                      {{  Form::text('address_view', '' , array('id' => 'input_text_company_address_view', 'class' => 'form-control', 'disabled')) }}


                      <br />


                      {{  Form::label('phone_view') }}

                      {{  Form::text('company_phone_view', '' , array('id' => 'input_text_company_phone_view', 'class' => 'form-control', 'disabled')) }}

                      
                      <br />


                      {{  Form::label('fax_view') }}

                      {{  Form::text('company_fax_view', '' , array('id' => 'input_text_company_fax_view', 'class' => 'form-control', 'disabled')) }}

                      <br />


                      {{  Form::label('email_view') }}

                      {{  Form::text('company_email_view', '' , array('id' => 'input_text_company_email_view', 'class' => 'form-control', 'disabled')) }}


                      <br />


                      {{  Form::label('zip_view') }}

                      {{  Form::text('company_zip_view', '' , array('id' => 'input_text_company_zip_view', 'class' => 'form-control', 'disabled')) }}
                      

                      <br />

                      {{  Form::label('city_view') }}

                      {{  Form::text('company_city_view', '' , array('id' => 'input_text_company_city_view', 'class' => 'form-control', 'disabled')) }}


                      <br />

                      {{  Form::label('state_view') }}

                      {{  Form::text('company_state_view', '' , array('id' => 'input_text_company_state_view', 'class' => 'form-control', 'disabled')) }}


                      <br />
                   
                      {{  Form::label('description_view') }}

                      {!! Form::textarea('company_description_view', '', array('id' => 'input_text_company_description_view', 'class' => 'form-control', 'rows' => 4, 'cols' => 54, 'disabled')) !!}

                      

                      {{ Form::close() }}
                      
                    </div>


                    <div class="modal-footer">
                      

                    
                      {{  Form::button('Close', ['id' => 'btn_close_modal_view_company', 'class' => 'btn btn-danger btn-sm']) }}

                     

                    </div>


              </div>
            </div>
          </div>

        <!-- Modal Div End -->




        <!-- Modal Div Start -->
        <div class="modal fade" id="modal_edit_company" tabindex="-1" role="dialog" aria-labelledby="modal_edit_company_label" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">


                    <div class="modal-header">
                      <h5 class="modal-title" id="modal_create_company_label">EDIT COMPANY</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>


                    <div class="modal-body">

                      {{ Form::open(array('id' => 'form_company_edit')) }}

                      
                      {{  Form::label('company_name') }} 

                      {{  Form::text('company_name_edit', '' , array('id' => 'input_text_company_name_edit', 'class' => 'form-control')) }}

                      <div id="company_update_error_div_companyname"></div>
                      
    
                      <br />


                      {{  Form::label('contact_person') }}

                      {{  Form::text('contact_person_edit', '' , array('id' => 'input_text_contact_person_edit', 'class' => 'form-control')) }}

                      <div id="company_update_error_div_contactperson"></div>


                      <br />


                      {{  Form::label('address') }}

                      {{  Form::text('address_edit', '' , array('id' => 'input_text_company_address_edit', 'class' => 'form-control')) }}


                      <br />


                      {{  Form::label('phone') }}

                      {{  Form::text('company_phone_edit', '' , array('id' => 'input_text_company_phone_edit', 'class' => 'form-control')) }}

                      <div id="company_update_error_div_companyphone"></div>

                      <br />


                      {{  Form::label('fax') }}

                      {{  Form::text('company_fax_edit', '' , array('id' => 'input_text_company_fax_edit', 'class' => 'form-control')) }}

                      <br />


                      {{  Form::label('email') }}

                      {{  Form::text('company_email_edit', '' , array('id' => 'input_text_company_email_edit', 'class' => 'form-control')) }}

                      <div id="company_update_error_div_companyemail"></div>


                      <br />


                      {{  Form::label('zip') }}

                      {{  Form::text('company_zip_edit', '' , array('id' => 'input_text_company_zip_edit', 'class' => 'form-control')) }}
                      

                      <br />

                      {{  Form::label('city') }}

                      {{  Form::text('company_city_edit', '' , array('id' => 'input_text_company_city_edit', 'class' => 'form-control')) }}


                      <br />

                      {{  Form::label('state') }}

                      {{  Form::text('company_state_edit', '' , array('id' => 'input_text_company_state_edit', 'class' => 'form-control')) }}


                      <br />
                   
                      {{  Form::label('description') }}

                      {!! Form::textarea('company_description_edit', '', array('id' => 'input_text_company_description_edit', 'class' => 'form-control', 'rows' => 4, 'cols' => 54)) !!}

                       
                      {{ Form::hidden('company_id_edit', '', array('id' => 'input_hidden_company_id')) }}

                      {{ Form::close() }}
                      
                    </div>


                    <div class="modal-footer">
                      

                    
                      {{  Form::button('Close', ['id' => 'btn_close_modal_edit_company', 'class' => 'btn btn-danger btn-sm']) }}

                      {{  Form::button('Update', ['id' => 'btn_update_company', 'class' => 'btn btn-success btn-sm'])  }}

                    </div>


              </div>
            </div>
          </div>

        <!-- Modal Div End -->

 




  <script src="{!!url('/js/jquery.3.5.1.min.js')!!}"></script>

  <script src="{!!url('/js/companies_main.js')!!}"></script>

 @endsection

 


