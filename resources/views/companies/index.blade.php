@extends('layouts.app')


@section('content')


  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_create_company">
    Create Company
  </button>
 

  <div class="table-responsive" id="table_paginated_data">  

  
  <h1 > Companies </h1>


  <div>

  <table width="100%" class="table">

    <tr> <th>Company Name</th> <th>Contact Person</th> <th>Phone</th> <th>Email</th> <th>Action</th> </tr>

    <tbody><tr> 
    
      <td>{{  Form::text('search_company_name', $search_company_name , array('id' => 'search_text_company_name', 'class' => 'form-control')) }}</td> 

      <td>{{  Form::text('search_contact_person', $search_contact_person , array('id' => 'search_text_contact_person', 'class' => 'form-control')) }}</td>

      <td>{{  Form::text('search_phone', '' , array('id' => 'search_text_phone', 'class' => 'form-control')) }}</td> 

      <td>{{  Form::text('search_email', '' , array('id' => 'search_text_email', 'class' => 'form-control')) }}</td> 

      <td> &nbsp; </td> 

    </tr></tbody>

    </table>

    
    <div>

    <table id="tab_r" width="100%" class="table">

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

                      <div id="errordiv_companyname"></div>
                      
    
                      <br />


                      {{  Form::label('contact_person') }}

                      {{  Form::text('contact_person', '' , array('id' => 'input_text_contact_person', 'class' => 'form-control')) }}

                      <div id="errordiv_contactperson"></div>

                      <br />


                      {{  Form::label('address') }}

                      {{  Form::text('company_address', '' , array('id' => 'input_text_company_address', 'class' => 'form-control')) }}

                      <br />


                      {{  Form::label('phone') }}

                      {{  Form::text('company_phone', '' , array('id' => 'input_text_company__phone', 'class' => 'form-control')) }}

                      <div id="errordiv_companyphone"></div>

                      <br />


                      {{  Form::label('fax') }}

                      {{  Form::text('company_fax', '' , array('id' => 'input_text_company_fax', 'class' => 'form-control')) }}

                      <br />


                      {{  Form::label('email') }}

                      {{  Form::text('company_email', '' , array('id' => 'input_text_company_email', 'class' => 'form-control')) }}

                      <div id="errordiv_companyemail"></div>


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

                      <div id="errordiv_edit_companyname"></div>
                      
    
                      <br />


                      {{  Form::label('contact_person') }}

                      {{  Form::text('contact_person_edit', '' , array('id' => 'input_text_contact_person_edit', 'class' => 'form-control')) }}

                      <div id="errordiv_edit_contactperson"></div>


                      <br />


                      {{  Form::label('address') }}

                      {{  Form::text('address_edit', '' , array('id' => 'input_text_company_address_edit', 'class' => 'form-control')) }}


                      <br />


                      {{  Form::label('phone') }}

                      {{  Form::text('company_phone_edit', '' , array('id' => 'input_text_company_phone_edit', 'class' => 'form-control')) }}

                      <div id="errordiv_edit_companyphone"></div>

                      <br />


                      {{  Form::label('fax') }}

                      {{  Form::text('company_fax_edit', '' , array('id' => 'input_text_company_fax_edit', 'class' => 'form-control')) }}

                      <br />


                      {{  Form::label('email') }}

                      {{  Form::text('company_email_edit', '' , array('id' => 'input_text_company_email_edit', 'class' => 'form-control')) }}

                      <div id="errordiv_edit_companyemail"></div>


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

 


