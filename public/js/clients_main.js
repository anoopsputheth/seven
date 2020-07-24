$(document).ready(function(){ 


    $(document).on('click', '.pagination a', function(e){
  
      e.preventDefault();
  
      var page = $(this).attr('href').split('page=')[1];
  
      fetchPaginatedClients(page);
  
    });
  
  
    $(document).on('click', '#btn_create_client', function(){ insertClient(); });  
  
    $(document).on('click', '#btn_update_client', function(){ updateClient(); });  
  
  
  
    $('#modal_create_client').on('hidden.bs.modal', function () {  
  
      $('[id^=client_create_error_div_]').html('');
      $('#form_client_create').trigger("reset");
  
    }); // end on('hidden.bs.modal'


    
    $("#input_select_client_client_type_create_client").change(function() {
      
      if($('option:selected', this).text() == 'Personal')
      {
   
          $('#input_text_client_businessname_create_client').val('').attr('readonly', true);

          $('#input_text_client_first_name_create_client').attr('readonly', false);
          $('#input_text_client_last_name_create_client').attr('readonly', false);
         
      }
      else if($('option:selected', this).text() == 'Business')
      {
          
          $('#input_text_client_businessname_create_client').attr('readonly', false);

          $('#input_text_client_first_name_create_client').val('').attr('readonly', true);
          $('#input_text_client_last_name_create_client').val('').attr('readonly', true);

      }
      else
      {
          
          $('#input_text_client_businessname_create_client').val('').attr('readonly', false);
          $('#input_text_client_first_name_create_client').val('').attr('readonly', false);
          $('#input_text_client_last_name_create_client').val('').attr('readonly', false);

      }

    });



    $('#input_select_client_client_type_update_client').change(function() { 
      
      if($('option:selected', this).text() == 'Personal')
      {
   
          $('#input_text_client_businessname_update_client').val('').attr('readonly', true);

          $('#input_text_client_first_name_update_client').attr('readonly', false);
          $('#input_text_client_last_name_update_client').attr('readonly', false);
         
      }
      else if($('option:selected', this).text() == 'Business')
      {
          
          $('#input_text_client_businessname_update_client').attr('readonly', false);

          $('#input_text_client_first_name_update_client').val('').attr('readonly', true);
          $('#input_text_client_last_name_update_client').val('').attr('readonly', true);

      }
      else
      {
          
          $('#input_text_client_businessname_update_client').val('').attr('readonly', false);
          $('#input_text_client_first_name_update_client').val('').attr('readonly', false);
          $('#input_text_client_last_name_update_client').val('').attr('readonly', false);

      }

    });

    
    
  
  
  
    $(document).on('click', '#btn_close_modal_create_client', function(){
  
      $('#modal_create_client').modal('hide');
  
    });


    $(document).on('click', '#btn_close_modal_update_client', function(){
  
      $('#modal_update_client').modal('hide');
  
    });
  
  
    
    $('#modal_update_client').on('show.bs.modal', function (e) 
    {        
  
      var client_id_update_client = $(e.relatedTarget).data('update_client_id');   
  
      //console.log(client_id_update_client);
  
      $.ajax({            
  
            type : 'GET',         
  
            url :  './clients/fetch/{id}',
  
            data    : 'id='+ client_id_update_client, // pass client id        
  
            success : function(data) 
  
            { 
               
              //console.log(data);
  
              $('#input_text_client_first_name_update_client').val(data.firstname);
  
              $('#input_text_client_last_name_update_client').val(data.lastname);
  
              $('#input_text_client_businessname_update_client').val(data.businessname);
  
              $('#input_select_client_client_type_update_client').val(data.client_type_id);

              $('#input_text_client_company_update_client').val(data.company_id);

              $('#input_text_client_address_update_client').val(data.address);

              $('#input_text_client_zip_update_client').val(data.zip);

              $('#input_text_client_city_update_client').val(data.city);

              $('#input_text_client_state_update_client').val(data.state);

              $('#input_text_client_contact_person_1_update_client').val(data.contact_person_1);

              $('#input_text_client_contact_person_2_update_client').val(data.contact_person_2);

              $('#input_text_client_contact_person_3_update_client').val(data.contact_person_3);

              $('#input_text_client_phone_1_update_client').val(data.phone_1);

              $('#input_text_client_phone_2_update_client').val(data.phone_2);

              $('#input_text_client_cellno_update_client').val(data.cell_no);

              $('#input_text_client_email1_update_client').val(data.email_1);

              $('#input_text_client_email2_update_client').val(data.email_2);

              $('#input_text_client_email3_update_client').val(data.email_3);

              $('#input_text_client_fax_update_client').val(data.fax);

              $('#input_text_client_referral_update_client').val(data.client_referral);
              
              $('#input_select_client_business_category_update_client').val(data.business_category_id);

              $('#input_select_client_office_working_day_start_update_client').val(data.office_working_day_start);

              $('#input_select_client_office_working_day_end_update_client').val(data.office_working_day_end);

              $('#input_select_client_office_working_hour_start_update_client').val(data.office_working_hour_start);

              $('#input_select_client_office_working_hour_end_update_client').val(data.office_working_hour_end);

              $('#input_select_client_charging_method_update_client').val(data.charging_method_id);

              $('#input_text_client_charging_rate_update_client').val(data.charging_rate);

              var is_daily_backup_enabled = (data.daily_backup == 'yes') ? true : false;

              $('#input_select_client_daily_backup_update_client').prop('checked', is_daily_backup_enabled);

              var is_weekly_backup_enabled = (data.weekly_backup == 'yes') ? true : false;
              
              $('#input_select_client_weekly_backup_update_client').prop('checked', is_weekly_backup_enabled);

              $('#input_text_client_description_update_client').val(data.description);

              $('#input_hidden_client_id_update_client').val(client_id_update_client);



                if($('#input_select_client_client_type_update_client').val() == '4')
                {  
            
                  $('#input_text_client_businessname_update_client').attr('readonly', true);

                  $('#input_text_client_first_name_update_client').attr('readonly', false);
                  $('#input_text_client_last_name_update_client').attr('readonly', false);

                }
                else
                {

                  $('#input_text_client_businessname_update_client').attr('readonly', false);

                  $('#input_text_client_first_name_update_client').attr('readonly', true);
                  $('#input_text_client_last_name_update_client').attr('readonly', true);

                }
                  
            },
  
            error   : function() 
  
            { 
              
              console.log('some error occured while fetching client'); 
  
            }
  
        }); 
  
  
    });  // end on('show.bs.modal'
  
  
  
    $('#modal_update_client').on('hidden.bs.modal', function () {  
  
      $('[id^=client_update_error_div_]').html('');
      $('#form_client_update').trigger("reset");
  
    }); // end on('hidden.bs.modal'
  
  
  
    $(document).on('click', '#btn_close_modal_update_client', function(){
  
      $('#modal_update_client').modal('hide');
  
    });
  
  
  
  
    $('#modal_view_company').on('show.bs.modal', function (e) 
    {        
  
      var view_company_id = $(e.relatedTarget).data('view_company_id');   
  
      //console.log(view_company_id);
  
      $.ajax({            
  
            type : 'GET',         
  
            url :  './companies/fetch/{id}',
  
            data    : 'id='+ view_company_id, //Pass $user_id           
  
            success : function(data) 
  
            { 
               
              //console.log(result);
  
              $('#input_text_company_name_view_company').val(data.name);
  
              $('#input_text_contact_person_view_company').val(data.contact_person);
  
              $('#input_text_company_address_view_company').val(data.address);
  
              $('#input_text_company_phone_view_company').val(data.phone);
  
              $('#input_text_company_fax_view_company').val(data.fax);
  
              $('#input_text_company_email_view_company').val(data.email);
  
              $('#input_text_company_zip_view_company').val(data.zip);
  
              $('#input_text_company_city_view_company').val(data.city);
  
              $('#input_text_company_state_view_company').val(data.state);
  
              $('#input_text_company_description_view_company').val(data.description);
  
             
  
            },
  
            error   : function() 
  
            { 
              
              console.log('some error occured while fetching company'); 
  
            }
  
        }); 
  
  
    });  // end on('show.bs.modal'
  
  
  
    $(document).on('click', '#btn_close_modal_view_company', function(){
  
      $('#modal_view_company').modal('hide');
  
    });
  
    
  
  
    $(document).on('keyup', '[id^=search_text_]' ,function(e) {
  
        $.ajax({
  
          url : './clients/indexsearch',
  
          data : { 
  
            'search_client_name' : $('input[name=search_client_name]').val(),
            'search_client_phone' : $('input[name=search_client_phone]').val(),
            'search_client_email' : $('input[name=search_client_email]').val(),
  
          }
  
        }).done(function(data){
  
            $('#table_paginted_clients tbody').html(data);
  
        });
        
    });  // end on('keyup'
  
  
     
  });  // end $(document).ready(
  
  
  
  function insertClient()
  {
  
        $.ajax({
  
          type : 'POST',
  
          url  : './clients/create',
  
          data : {
  
          '_token' : $('input[name=_token]').val(),
  
          'firstname' : $('input[name=client_first_name_create_client]').val(),
  
          'lastname' : $('input[name=client_last_name_create_client]').val(),
  
          'businessname' : $('input[name=client_businessname_create_client]').val(),

          'clienttype' :  $('[name=client_client_type_create_client]').val(),

          'company' :  $('[name=client_company_create_client]').val(),

          'address' :  $('[name=client_address_create_client]').val(),

          'zip' :  $('[name=client_zip_create_client]').val(),

          'city' :  $('[name=client_city_create_client]').val(),

          'state' :  $('[name=client_state_create_client]').val(),

          'contactperson1' :  $('[name=client_contact_person_1_create_client]').val(),

          'contactperson2' :  $('[name=client_contact_person_2_create_client]').val(),

          'contactperson3' :  $('[name=client_contact_person_3_create_client]').val(),

          'phone1' :  $('[name=client_phone_1_create_client]').val(),

          'phone2' :  $('[name=client_phone_2_create_client]').val(),

          'cellno' :  $('[name=client_cellno_create_client]').val(),

          'email1' :  $('[name=client_email1_create_client]').val(),

          'email2' :  $('[name=client_email2_create_client]').val(),

          'email3' :  $('[name=client_email3_create_client]').val(),

          'fax' :     $('[name=client_fax_create_client]').val(),

          'clientreferral' :  $('[name=client_referral_create_client]').val(),

          'businesscategory' :  $('[name=client_business_category_create_client]').val(),

          'officestartday' :  $('[name=client_office_working_day_start_create_client]').val(),

          'officeendday' :  $('[name=client_office_working_day_end_create_client]').val(),

          'officestarthour' :  $('[name=client_office_working_hour_start_create_client]').val(),

          'officeendhour' :  $('[name=client_office_working_hour_end_create_client]').val(),

          'dailybackup' :  $('[name=client_daily_backup_create_client]').is(":checked") ? 'yes' : 'no',

          'weeklybackup' :  $('[name=client_weekly_backup_create_client]').is(":checked") ? 'yes' : 'no',

          'description' :  $('[name=client_description_create_client]').val(),
          
  
          },
  
  
          success : function(data){  console.log(data);
  
  
              $('[id^=client_create_error_div_]').html('');
  
              if(data.errors)
              {
                  
                $.each(data.errors , function( key, value ) {
  
                  if(data.errors[key])
                  {
                    $('#client_create_error_div_'+key).html(value[0]).addClass('text-danger');
                  }  
                  
                });
      
              }
  
              else  // saved client so reload paginated records
              {
                
                  $.ajax({
  
                    url : './clients/ajaxpagination?page=1',
              
                  }).done(function(data){
              
                      $('#table_paginted_clients tbody').html(data);
                  });
  
              }
  
  
          }  // end success
  
  
        });  // end $.ajax({
  
  
  }  // end function insertClient()
  
  
  
  function updateClient()
  {
  
        $.ajax({
  
          type : 'POST',
  
          url  : './clients/update',
  
          data : {
  
            '_token' : $('input[name=_token]').val(),

            'id' : $('#input_hidden_client_id_update_client').val(), 
  
            'firstname' : $('input[name=client_first_name_update_client]').val(),
    
            'lastname' : $('input[name=client_last_name_update_client]').val(),
    
            'businessname' : $('input[name=client_businessname_update_client]').val(),
  
            'clienttype' :  $('[name=client_client_type_update_client]').val(),
  
            'company' :  $('[name=client_company_update_client]').val(),
  
            'address' :  $('[name=client_address_update_client]').val(),
  
            'zip' :  $('[name=client_zip_update_client]').val(),
  
            'city' :  $('[name=client_city_update_client]').val(),
  
            'state' :  $('[name=client_state_update_client]').val(),
  
            'contactperson1' :  $('[name=client_contact_person_1_update_client]').val(),
  
            'contactperson2' :  $('[name=client_contact_person_2_update_client]').val(),
  
            'contactperson3' :  $('[name=client_contact_person_3_update_client]').val(),
  
            'phone1' :  $('[name=client_phone_1_update_client]').val(),
  
            'phone2' :  $('[name=client_phone_2_update_client]').val(),
  
            'cellno' :  $('[name=client_cellno_update_client]').val(),
  
            'email1' :  $('[name=client_email1_update_client]').val(),
  
            'email2' :  $('[name=client_email2_update_client]').val(),
  
            'email3' :  $('[name=client_email3_update_client]').val(),
  
            'fax' :     $('[name=client_fax_update_client]').val(),
  
            'clientreferral' :  $('[name=client_referral_update_client]').val(),

            'chargingmethod' :  $('[name=client_charging_method_update_client]').val(),

            'chargingrate' :  $('[name=client_charging_rate_update_client]').val(),
  
            'businesscategory' :  $('[name=client_business_category_update_client]').val(),
  
            'officestartday' :  $('[name=client_office_working_day_start_update_client]').val(),
  
            'officeendday' :  $('[name=client_office_working_day_end_update_client]').val(),
  
            'officestarthour' :  $('[name=client_office_working_hour_start_update_client]').val(),
  
            'officeendhour' :  $('[name=client_office_working_hour_end_update_client]').val(),
  
            'dailybackup' :  $('[name=client_daily_backup_update_client]').is(":checked") ? 'yes' : 'no',
  
            'weeklybackup' :  $('[name=client_weekly_backup_update_client]').is(":checked") ? 'yes' : 'no',
  
            'description' :  $('[name=client_description_update_client]').val(),
            
  
          },
  
  
          success : function(data){ 
            
              //console.log(data.errors);
  
  
              $('[id^=client_update_error_div_]').html('');
  
              if(data.errors)
              {
                  
                $.each(data.errors , function( key, value ) {
  
                  if(data.errors[key])
                  {
                    $('#client_update_error_div_'+key).html(value[0]).addClass('text-danger');
                  }  
                  
                });
      
              }
  
              else  // saved client so reload paginated records
              {
                
                  $.ajax({
  
                    url : './clients/ajaxpagination?page=1',
              
                  }).done(function(data){
              
                    $('#table_paginted_clients tbody').html(data);
  
                    $('#modal_update_client').modal('hide');
  
                  });
  
              }
  
  
          }  // end success
  
  
        });  // end $.ajax({
  
  
  }  // end function updateClient)
  
  
  
  function fetchPaginatedClients(page)
  {
  
      $.ajax({
  
        url : './clients/ajaxpagination?page='+page,
  
        data : {
  
            'search_client_name' : $('input[name=search_client_name]').val(),
            'search_client_phone' : $('input[name=search_client_phone]').val(),
            'search_client_email' : $('input[name=search_client_email]').val(),
  
        }
  
      }).done(function(data){
  
        $('#table_paginted_clients tbody').html(data);
  
      });
  
  }   // end function fetchPaginatedClients()