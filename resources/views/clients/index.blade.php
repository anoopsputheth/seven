@extends('layouts.app')


@section('content')

<div id="div_container_btn_create" class="class_container_btn_create">

  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_create_client">
    Create Client
  </button>

</div>
 

  <div class="table-responsive" id="table_paginated_data">  

  
  <h1 > Clients </h1>


  <div>

  <table width="100%" class="table" border="0">

    <thead> <tr> <th>Client Name</th> <th>Zip</th> <th>City</th> <th>State</th> <th>Phone</th> <th>Email</th> <th>Action</th> </tr> </thead>

    <tbody><tr> 
    
      <td width="20%">{{  Form::text('search_client_name', $search_client_name , array('id' => 'search_text_client_name', 'class' => 'form-control')) }}</td> 

      <td width="10%">{{  Form::text('search_client_zip', $search_client_zip , array('id' => 'search_text_client_zip', 'class' => array('form-control', 'class_box_search'))) }}</td>

      <td width="10%">{{  Form::text('search_client_city', $search_client_city , array('id' => 'search_text_client_city', 'class' => array('form-control', 'class_box_search'))) }}</td>

      <td width="10%">{{  Form::text('search_client_state', $search_client_state , array('id' => 'search_text_client_state', 'class' => array('form-control', 'class_box_search'))) }}</td>

      <td width="15%">{{  Form::text('search_client_phone', $search_client_phone , array('id' => 'search_text_client_phone', 'class' => array('form-control', 'class_box_search'))) }}</td> 

      <td width="20%">{{  Form::text('search_client_email', $search_client_email , array('id' => 'search_text_client_email', 'class' => array('form-control', 'class_box_search'))) }}</td> 

      <td  width="15%"> &nbsp; </td> 

    </tr></tbody>

    </table>

   </div>

    
    <div>

    <table id="table_paginted_clients" width="100%" class="table"  border="0">

    <tbody>

    @include('clients.paginated_data')

    </tbody>

    </table>

    </div>



  </div>

         
         
 

          <!-- Modal Div Start -->
          <div class="modal fade" id="modal_create_client" tabindex="-1" role="dialog" aria-labelledby="modal_create_client_label" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">


                    <div class="modal-header">
                      <h5 class="modal-title" id="modal_create_client_label">CREATE CLIENT</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>


                    <div class="modal-body">


                    {{ Form::open(array('id' => 'form_client_create')) }}


                    <table width="100%">

                        <tr>
                        
                            <td>
                            
                             {{  Form::label('first_name') }} 

                             {{  Form::text('client_first_name_create_client', '' , array('id' => 'input_text_client_first_name_create_client', 'class' => 'form-control')) }}
                            
                             <div id="client_create_error_div_firstname"></div>

                             <br />

                            </td>  


                            <td> 
                            
                             {{  Form::label('last_name') }}

                             {{  Form::text('client_last_name_create_client', '' , array('id' => 'input_text_client_last_name_create_client', 'class' => 'form-control')) }}
                        
                             <div id="client_create_error_div_lastname"></div>

                             <br />

                            </td>  


                            <td colspan="2">  
                            
                             {{  Form::label('business_name') }}
 
                             {{  Form::text('client_businessname_create_client', '' , array('id' => 'input_text_client_businessname_create_client', 'class' => 'form-control')) }}
                        
                             <div id="client_create_error_div_businessname"></div>

                             <br /> 

                            </td>

                        </tr>

                   
                         
                        <tr>


                            <td>
                                
                             {{  Form::label('client_type') }}
 
                             {{  Form::select('client_client_type_create_client', App\ClientType::whereIn('id', array(3, 4))->pluck('name','id'), null, ['id' => 'input_select_client_client_type_create_client', 'placeholder' => 'Select Client Type', 'class' => 'form-control']) }}

                             <div id="client_create_error_div_clienttype"></div>

                             <br /> 
                                
                            </td>  


                            <td colspan="3"> 
                                
                             {{  Form::label('company') }}

                             {{  Form::select('client_company_create_client', App\Company::pluck('name','id'), null, ['id' => 'input_text_client_company_create_client', 'placeholder' => 'Select Company', 'class' => 'form-control']) }}

                             <div id="client_create_error_div_company"></div>

                             <br /> 
                                
                            </td>  
        

                        </tr>


                        <tr>


                            <td colspan="4">

                             {{  Form::label('address') }}

                             {{  Form::text('client_address_create_client', '' , array('id' => 'input_text_client_address_create_client', 'class' => 'form-control')) }}

                             <br />
                            
                            </td>

                       </tr>



                       <tr>


                            <td>


                             {{  Form::label('zip') }}

                             {{  Form::text('client_zip_create_client', '' , array('id' => 'input_text_client_zip_create_client', 'class' => 'form-control')) }}

                             <br />

                            </td>



                            <td>


                             {{  Form::label('city') }}

                             {{  Form::text('client_city_create_client', '' , array('id' => 'input_text_client_city_create_client', 'class' => 'form-control')) }}

                             <br />

                            </td>



                            <td colspan="2">


                             {{  Form::label('state') }}

                             {{  Form::text('client_state_create_client', '' , array('id' => 'input_text_client_state_create_client', 'class' => 'form-control')) }}

                             <br />

                            </td>


                       </tr>



                        <tr>


                            <td>


                             {{  Form::label('contact_person_1') }}

                             {{  Form::text('client_contact_person_1_create_client', '' , array('id' => 'input_text_client_contact_person_1_create_client', 'class' => 'form-control')) }}


                             <br />


                            </td>


                            <td>


                            
                            {{  Form::label('contact_person_2') }}

                            {{  Form::text('client_contact_person_2_create_client', '' , array('id' => 'input_text_client_contact_person_2_create_client', 'class' => 'form-control')) }}


                            <br />


                            </td>



                            <td colspan="2">


                            
                            {{  Form::label('contact_person_3') }}

                            {{  Form::text('client_contact_person_3_create_client', '' , array('id' => 'input_text_client_contact_person_3_create_client', 'class' => 'form-control')) }}


                            <br />


                            </td>


                        </tr>



                        <tr>


                            <td>


                             {{  Form::label('phone_1') }}

                             {{  Form::text('client_phone_1_create_client', '' , array('id' => 'input_text_client_phone_1_create_client', 'class' => 'form-control')) }}


                             <br />


                            </td>


                            <td>


                             {{  Form::label('phone_2') }}

                             {{  Form::text('client_phone_2_create_client', '' , array('id' => 'input_text_client_phone_2_create_client', 'class' => 'form-control')) }}

                             <br />


                            </td>



                            <td colspan="2">


                             {{  Form::label('cell_no') }}

                             {{  Form::text('client_cellno_create_client', '' , array('id' => 'input_text_client_cellno_create_client', 'class' => 'form-control')) }}


                             <br />


                            </td>


                        </tr>




                        <tr>


                            <td>


                             {{  Form::label('email_1') }}

                             {{  Form::text('client_email1_create_client', '' , array('id' => 'input_text_client_email1_create_client', 'class' => 'form-control')) }}

                              
                             <div id="client_create_error_div_email1"></div>

                             <br />


                            </td>


                            <td>


                             {{  Form::label('email_2') }}

                             {{  Form::text('client_email2_create_client', '' , array('id' => 'input_text_client_email2_create_client', 'class' => 'form-control')) }}

 
                             <div id="client_create_error_div_email2"></div>

                             <br />


                            </td>



                            <td colspan="2">


                             {{  Form::label('email_3') }}

                             {{  Form::text('client_email3_create_client', '' , array('id' => 'input_text_client_email3_create_client', 'class' => 'form-control')) }}

                             <div id="client_create_error_div_email3"></div>
 
                             <br />


                            </td>


                        </tr>



                        <tr>


                            <td>


                             {{  Form::label('fax') }}

                             {{  Form::text('client_fax_create_client', '' , array('id' => 'input_text_client_fax_create_client', 'class' => 'form-control')) }}


                             <br />


                            </td>


                            <td>


                             {{  Form::label('client_referral') }}

                             {!! Form::text('client_referral_create_client', '', array('id' => 'input_text_client_referral_create_client', 'class' => 'form-control', 'rows' => 4, 'cols' => 54)) !!}


                             <br />


                            </td>



                            <td colspan="2">


                             {{  Form::label('business_category') }}

                             {{  Form::select('client_business_category_create_client', App\BusinessCategory::pluck('name','id'), '3', ['id' => 'input_select_client_business_category_create_client', 'placeholder' => 'Select Business Category', 'class' => 'form-control']) }}

                             <div id="client_create_error_div_businesscategory"></div>
                           
                             <br />


                            </td>


                        </tr>




                        <tr>


                            <td>

                             {{  Form::label('office_working_day_start') }}

                             {!! Form::select('client_office_working_day_start_create_client', array('monday' => 'Monday', 'tuesday' => 'Tuesday', 'wednesday' => 'Wednesday', 'thursday' => 'Thursday', 'friday' => 'Friday'), 'monday', ['id' => 'input_select_client_office_working_day_start_create_client', 'class' => 'form-control']) !!}
                            
                             <br />

                            </td>



                            <td>


                            {{  Form::label('office_working_day_end') }}

                            {!! Form::select('client_office_working_day_end_create_client', array('monday' => 'Monday', 'tuesday' => 'Tuesday', 'wednesday' => 'Wednesday', 'thursday' => 'Thursday', 'friday' => 'Friday'), 'friday', ['id' => 'input_select_client_office_working_day_end_create_client', 'class' => 'form-control']) !!}
                            
                            <br />

                            </td>


                            <td>


                            {{  Form::label('work_hour_start') }}

                            {!! Form::select('client_office_working_hour_start_create_client', array('08:00 am' => '08:00 AM', '08:30 am' => '08:30 AM'), '08:30 am', ['id' => 'input_select_client_office_working_hour_start_create_client', 'class' => 'form-control']) !!}
                            
                            <br />

                            </td>


                            <td>

                            {{  Form::label('work_hour_end') }}

                            {!! Form::select('client_office_working_hour_end_create_client', array('08:00 am' => '08:00 AM', '08:30 am' => '08:30 AM'), '08:30 am', ['id' => 'input_select_client_office_working_hour_end_create_client', 'class' => 'form-control']) !!}
                
                            <br />

                            </td>


                        </tr>



                        <tr>


                            <td>

                          
                            {{  Form::label('charging_method') }}

                            {{  Form::select('client_charging_method_create_client', App\ChargingMethod::pluck('name','id'), '', ['id' => 'input_select_client_charging_method_create_client', 'placeholder' => 'Select Charging Method', 'class' => 'form-control']) }}

                            <br />

                            </td>



                            <td>


                            {{  Form::label('charging_rate') }}

                            {!! Form::text('client_charging_rate_create_client', '', array('id' => 'input_text_client_charging_rate_create_client', 'class' => 'form-control', 'rows' => 4, 'cols' => 54)) !!}

                            <br />

                            </td>


                            <td>


                            {{  Form::label('daily_backup') }}

                            {!! Form::checkbox('client_daily_backup_create_client', null, null, array('id' => 'input_select_client_daily_backup_create_client')) !!}

                            <br />

                            </td>


                            <td>

                            {{  Form::label('weekly_backup') }}

                            {!! Form::checkbox('client_weekly_backup_create_client', null, null, array('id' => 'input_select_client_weekly_backup_create_client')) !!}


                            <br />

                            </td>


                        </tr>




                        <tr>


                            <td colspan="4">

                             {{  Form::label('network_structure') }}

                             {!! Form::text('client_network_structure_create_client', '', array('id' => 'input_text_client_network_structure_create_client', 'class' => 'form-control', 'rows' => 4, 'cols' => 54)) !!}

                             <br />

                            </td>


                        </tr>



                        <tr>

                            <td colspan="4">

            
                             {{  Form::label('description') }}

                             {!! Form::textarea('client_description_create_client', '', array('id' => 'input_text_client_description_create_client', 'class' => 'form-control', 'rows' => 4, 'cols' => 54)) !!}

                             <br />

                            </td>

                        </tr>
            
            

                   </table>

 
                {{ Form::close() }}
                      
             </div>


                    <div class="modal-footer">
                      

                    
                      {{  Form::button('Close', ['id' => 'btn_close_modal_create_client', 'class' => 'btn btn-danger btn-sm']) }}

                      {{  Form::button('Create', ['id' => 'btn_create_client', 'class' => 'btn btn-success btn-sm'])  }}

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

                      
                      {{  Form::label('company_name') }} 

                      {{  Form::text('company_name_view_company', '' , array('id' => 'input_text_company_name_view_company', 'class' => 'form-control', 'disabled')) }}
                      
    
                      <br />


                      {{  Form::label('contact') }}

                      {{  Form::text('contact_person_view_company', '' , array('id' => 'input_text_contact_person_view_company', 'class' => 'form-control', 'disabled')) }}


                      <br />


                      {{  Form::label('address') }}

                      {{  Form::text('address_view_company', '' , array('id' => 'input_text_company_address_view_company', 'class' => 'form-control', 'disabled')) }}


                      <br />


                      {{  Form::label('phone') }}

                      {{  Form::text('company_phone_view_company', '' , array('id' => 'input_text_company_phone_view_company', 'class' => 'form-control', 'disabled')) }}

                      
                      <br />


                      {{  Form::label('fax') }}

                      {{  Form::text('company_fax_view_company', '' , array('id' => 'input_text_company_fax_view_company', 'class' => 'form-control', 'disabled')) }}

                      <br />


                      {{  Form::label('email') }}

                      {{  Form::text('company_email_view_company', '' , array('id' => 'input_text_company_email_view_company', 'class' => 'form-control', 'disabled')) }}


                      <br />


                      {{  Form::label('zip') }}

                      {{  Form::text('company_zip_view_company', '' , array('id' => 'input_text_company_zip_view_company', 'class' => 'form-control', 'disabled')) }}
                      

                      <br />

                      {{  Form::label('city') }}

                      {{  Form::text('company_city_view_company', '' , array('id' => 'input_text_company_city_view_company', 'class' => 'form-control', 'disabled')) }}


                      <br />

                      {{  Form::label('state') }}

                      {{  Form::text('company_state_view_company', '' , array('id' => 'input_text_company_state_view_company', 'class' => 'form-control', 'disabled')) }}


                      <br />
                   
                      {{  Form::label('description') }}

                      {!! Form::textarea('company_description_view_company', '', array('id' => 'input_text_company_description_view_company', 'class' => 'form-control', 'rows' => 4, 'cols' => 54, 'disabled')) !!}

                      

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
        <div class="modal fade" id="modal_update_client" tabindex="-1" role="dialog" aria-labelledby="modal_update_client_label" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">


                    <div class="modal-header">
                      <h5 class="modal-title" id="modal_update_client_label">EDIT CLIENT</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>


                    <div class="modal-body">

                      {{ Form::open(array('id' => 'form_client_update')) }}

                      
                      {{ Form::hidden('client_id_edit_client', '', array('id' => 'input_hidden_client_id_edit_client')) }}


                      <table width="100%">

                        <tr>
                        
                            <td>
                            
                             {{  Form::label('first_name') }} 

                             {{  Form::text('client_first_name_update_client', '' , array('id' => 'input_text_client_first_name_update_client', 'class' => 'form-control')) }}
                            
                             <div id="client_update_error_div_firstname"></div>

                             <br />

                            </td>  


                            <td> 
                            
                             {{  Form::label('last_name') }}

                             {{  Form::text('client_last_name_update_client', '' , array('id' => 'input_text_client_last_name_update_client', 'class' => 'form-control')) }}
                        
                             <div id="client_update_error_div_lastname"></div>

                             <br />

                            </td>  


                            <td colspan="2">  
                            
                             {{  Form::label('business_name') }}
 
                             {{  Form::text('client_businessname_update_client', '' , array('id' => 'input_text_client_businessname_update_client', 'class' => 'form-control')) }}
                        
                             <div id="client_update_error_div_businessname"></div>

                             <br /> 

                            </td>

                        </tr>

                   
                         
                        <tr>


                            <td>
                                
                             {{  Form::label('client_type') }}
 
                             {{  Form::select('client_client_type_update_client', App\ClientType::whereIn('id', array(3, 4))->pluck('name','id'), null, ['id' => 'input_select_client_client_type_update_client', 'placeholder' => 'Select Client Type', 'class' => 'form-control']) }}

                             <div id="client_update_error_div_clienttype"></div>

                             <br /> 
                                
                            </td>  


                            <td colspan="3"> 
                                
                             {{  Form::label('company') }}

                             {{  Form::select('client_company_update_client', App\Company::pluck('name','id'), null, ['id' => 'input_text_client_company_update_client', 'placeholder' => 'Select Company', 'class' => 'form-control']) }}

                             <div id="client_update_error_div_company"></div>

                             <br /> 
                                
                            </td>  
        

                        </tr>


                        <tr>


                            <td colspan="4">

                             {{  Form::label('address') }}

                             {{  Form::text('client_address_update_client', '' , array('id' => 'input_text_client_address_update_client', 'class' => 'form-control')) }}

                             <br />
                            
                            </td>

                       </tr>



                       <tr>


                            <td>


                             {{  Form::label('zip') }}

                             {{  Form::text('client_zip_update_client', '' , array('id' => 'input_text_client_zip_update_client', 'class' => 'form-control')) }}

                             <br />

                            </td>



                            <td>


                             {{  Form::label('city') }}

                             {{  Form::text('client_city_update_client', '' , array('id' => 'input_text_client_city_update_client', 'class' => 'form-control')) }}

                             <br />

                            </td>



                            <td colspan="2">


                             {{  Form::label('state') }}

                             {{  Form::text('client_state_update_client', '' , array('id' => 'input_text_client_state_update_client', 'class' => 'form-control')) }}

                             <br />

                            </td>


                       </tr>



                        <tr>


                            <td>


                             {{  Form::label('contact_person_1') }}

                             {{  Form::text('client_contact_person_1_update_client', '' , array('id' => 'input_text_client_contact_person_1_update_client', 'class' => 'form-control')) }}


                             <br />


                            </td>


                            <td>


                            
                            {{  Form::label('contact_person_2') }}

                            {{  Form::text('client_contact_person_2_update_client', '' , array('id' => 'input_text_client_contact_person_2_update_client', 'class' => 'form-control')) }}


                            <br />


                            </td>



                            <td colspan="2">


                            
                            {{  Form::label('contact_person_3') }}

                            {{  Form::text('client_contact_person_3_update_client', '' , array('id' => 'input_text_client_contact_person_3_update_client', 'class' => 'form-control')) }}


                            <br />


                            </td>


                        </tr>



                        <tr>


                            <td>


                             {{  Form::label('phone_1') }}

                             {{  Form::text('client_phone_1_update_client', '' , array('id' => 'input_text_client_phone_1_update_client', 'class' => 'form-control')) }}


                             <br />


                            </td>


                            <td>


                             {{  Form::label('phone_2') }}

                             {{  Form::text('client_phone_2_update_client', '' , array('id' => 'input_text_client_phone_2_update_client', 'class' => 'form-control')) }}

                             <br />


                            </td>



                            <td colspan="2">


                             {{  Form::label('cell_no') }}

                             {{  Form::text('client_cellno_update_client', '' , array('id' => 'input_text_client_cellno_update_client', 'class' => 'form-control')) }}


                             <br />


                            </td>


                        </tr>




                        <tr>


                            <td>


                             {{  Form::label('email_1') }}

                             {{  Form::text('client_email1_update_client', '' , array('id' => 'input_text_client_email1_update_client', 'class' => 'form-control')) }}

                              
                             <div id="client_create_error_div_email1"></div>

                             <br />


                            </td>


                            <td>


                             {{  Form::label('email_2') }}

                             {{  Form::text('client_email2_update_client', '' , array('id' => 'input_text_client_email2_update_client', 'class' => 'form-control')) }}

 
                             <div id="client_create_error_div_email2"></div>

                             <br />


                            </td>



                            <td colspan="2">


                             {{  Form::label('email_3') }}

                             {{  Form::text('client_email3_update_client', '' , array('id' => 'input_text_client_email3_update_client', 'class' => 'form-control')) }}

                             <div id="client_create_error_div_email3"></div>
 
                             <br />


                            </td>


                        </tr>



                        <tr>


                            <td>


                             {{  Form::label('fax') }}

                             {{  Form::text('client_fax_update_client', '' , array('id' => 'input_text_client_fax_update_client', 'class' => 'form-control')) }}


                             <br />


                            </td>


                            <td>


                             {{  Form::label('client_referral') }}

                             {!! Form::text('client_referral_update_client', '', array('id' => 'input_text_client_referral_update_client', 'class' => 'form-control', 'rows' => 4, 'cols' => 54)) !!}


                             <br />


                            </td>



                            <td colspan="2">


                             {{  Form::label('business_category') }}

                             {{  Form::select('client_business_category_update_client', App\BusinessCategory::pluck('name','id'), '3', ['id' => 'input_select_client_business_category_update_client', 'placeholder' => 'Select Business Category', 'class' => 'form-control']) }}

                             <div id="client_update_error_div_businesscategory"></div>
                           
                             <br />


                            </td>


                        </tr>




                        <tr>


                            <td>

                             {{  Form::label('office_working_day_start') }}

                             {!! Form::select('client_office_working_day_start_update_client', array('monday' => 'Monday', 'tuesday' => 'Tuesday', 'wednesday' => 'Wednesday', 'thursday' => 'Thursday', 'friday' => 'Friday'), 'monday', ['id' => 'input_select_client_office_working_day_start_update_client', 'class' => 'form-control']) !!}
                            
                             <br />

                            </td>



                            <td>


                            {{  Form::label('office_working_day_end') }}

                            {!! Form::select('client_office_working_day_end_update_client', array('monday' => 'Monday', 'tuesday' => 'Tuesday', 'wednesday' => 'Wednesday', 'thursday' => 'Thursday', 'friday' => 'Friday'), 'friday', ['id' => 'input_select_client_office_working_day_end_update_client', 'class' => 'form-control']) !!}
                            
                            <br />

                            </td>


                            <td>


                            {{  Form::label('work_hour_start') }}

                            {!! Form::select('client_office_working_hour_start_update_client', array('08:00 am' => '08:00 AM', '08:30 am' => '08:30 AM'), '08:30 am', ['id' => 'input_select_client_office_working_hour_start_update_client', 'class' => 'form-control']) !!}
                            
                            <br />

                            </td>


                            <td>

                            {{  Form::label('work_hour_end') }}

                            {!! Form::select('client_office_working_hour_end_update_client', array('08:00 am' => '08:00 AM', '08:30 am' => '08:30 AM'), '08:30 am', ['id' => 'input_select_client_office_working_hour_end_update_client', 'class' => 'form-control']) !!}
                
                            <br />

                            </td>


                        </tr>



                        <tr>


                            <td>

                          
                            {{  Form::label('charging_method') }}

                            {{  Form::select('client_charging_method_update_client', App\ChargingMethod::pluck('name','id'), '3', ['id' => 'input_select_client_charging_method_update_client', 'placeholder' => 'Select Charging Method', 'class' => 'form-control']) }}

                            <br />

                            </td>



                            <td>


                            {{  Form::label('charging_rate') }}

                            {!! Form::text('client_charging_rate_update_client', '', array('id' => 'input_text_client_charging_rate_update_client', 'class' => 'form-control', 'rows' => 4, 'cols' => 54)) !!}

                            <br />

                            </td>


                            <td>


                            {{  Form::label('daily_backup') }}

                            {!! Form::checkbox('client_daily_backup_update_client', null, null, array('id' => 'input_select_client_daily_backup_update_client')) !!}

                            <br />

                            </td>


                            <td>

                            {{  Form::label('weekly_backup') }}

                            {!! Form::checkbox('client_weekly_backup_update_client', null, null, array('id' => 'input_select_client_weekly_backup_update_client')) !!}


                            <br />

                            </td>


                        </tr>




                        <tr>


                            <td colspan="4">

                             {{  Form::label('network_structure') }}

                             {!! Form::text('company_description_update_company', '', array('id' => 'input_text_company_description_update_company', 'class' => 'form-control', 'rows' => 4, 'cols' => 54)) !!}

                             <br />

                            </td>


                        </tr>



                        <tr>

                            <td colspan="4">

            
                             {{  Form::label('description') }}

                             {!! Form::textarea('client_description_update_client', '', array('id' => 'input_text_client_description_update_client', 'class' => 'form-control', 'rows' => 4, 'cols' => 54)) !!}

                             <br />

                            </td>

                        </tr>
            
            

                   </table>

                      {{ Form::hidden('client_id_edit_client', '', array('id' => 'input_hidden_client_id_update_client')) }}

                      {{ Form::close() }}
                      
                    </div>


                    <div class="modal-footer">
                      

                    
                      {{  Form::button('Close', ['id' => 'btn_close_modal_update_client', 'class' => 'btn btn-danger btn-sm']) }}

                      {{  Form::button('Update', ['id' => 'btn_update_client', 'class' => 'btn btn-success btn-sm'])  }}

                    </div>


              </div>
            </div>
          </div>

        <!-- Modal Div End -->

 




  <script src="{!!url('/js/jquery.3.5.1.min.js')!!}"></script>

  <script src="{!!url('/js/clients_main.js')!!}"></script>

 @endsection

 


