$(document).ready(function(){ 


  $(document).on('click', '.pagination a', function(e){

    e.preventDefault();

    var page = $(this).attr('href').split('page=')[1];

    fetchPaginatedCompanies(page);

  });


  $(document).on('click', '#btn_create_company', function(){ insertCompany(); });  

  $(document).on('click', '#btn_update_company', function(){ updateCompany(); });  



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

            $('#input_text_company_name_view').val(data.name);

            $('#input_text_contact_person_view').val(data.contact_person);

            $('#input_text_company_address_view').val(data.address);

            $('#input_text_company_phone_view').val(data.phone);

            $('#input_text_company_fax_view').val(data.fax);

            $('#input_text_company_email_view').val(data.email);

            $('#input_text_company_zip_view').val(data.zip);

            $('#input_text_company_city_view').val(data.city);

            $('#input_text_company_state_viewt').val(data.state);

            $('#input_text_company_description_view').val(data.description);

           

          },

          error   : function() 

          { 
            
            console.log('some error occured while fetching company'); 

          }

      }); 


  });  // end on('show.bs.modal'

  
  
  $('#modal_edit_company').on('show.bs.modal', function (e) 
  {        

    var company_id = $(e.relatedTarget).data('company_id');   

    //console.log(company_id);

    $.ajax({            

          type : 'GET',         

          url :  './companies/fetch/{id}',

          data    : 'id='+ company_id, //Pass $user_id           

          success : function(data) 

          { 
             
            //console.log(result);

            $('#input_text_company_name_edit').val(data.name);

            $('#input_text_contact_person_edit').val(data.contact_person);

            $('#input_text_company_address_edit').val(data.address);

            $('#input_text_company_phone_edit').val(data.phone);

            $('#input_text_company_fax_edit').val(data.fax);

            $('#input_text_company_email_edit').val(data.email);

            $('#input_text_company_zip_edit').val(data.zip);

            $('#input_text_company_city_edit').val(data.city);

            $('#input_text_company_state_edit').val(data.state);

            $('#input_text_company_description_edit').val(data.description);

            $('#input_hidden_company_id').val(company_id);

          },

          error   : function() 

          { 
            
            console.log('some error occured while fetching company'); 

          }

      }); 


  });  // end on('show.bs.modal'

  

  $(document).on('keyup', '[id^=search_text_]' ,function(e) {

      $.ajax({

        url : './companies/indexsearch',

        data : { 

          'search_company_name' : $('input[name=search_company_name]').val(),
          'search_contact_person' : $('input[name=search_contact_person]').val(),

        }

      }).done(function(data){

          $('#table_paginted_companies tbody').html(data);

      });
      
  });  // end on('keyup'


   
});  // end $(document).ready(



function insertCompany()
{

      $.ajax({

        type : 'POST',

        url  : './companies/create',

        data : {

        '_token' : $('input[name=_token]').val(),

        'companyname' : $('input[name=company_name]').val(),

        'contactperson' : $('input[name=contact_person]').val(),

        'companyaddress' : $('input[name=company_address]').val(),

        'companyphone' : $('input[name=company_phone]').val(),

        'companyfax' : $('input[name=company_fax]').val(),

        'companyemail' : $('input[name=company_email]').val(),

        'companyzip' : $('input[name=company_zip]').val(),

        'companycity' : $('input[name=company_city]').val(),

        'companystate' : $('input[name=company_state]').val(),

        'companydescription' : $('textarea[name=company_description]').val(),

        },


        success : function(data){


            $('[id^=errordiv_]').html('');

            if(data.errors)
            {
                
              $.each(data.errors , function( key, value ) {

                if(data.errors[key])
                {
                  $('#company_create_error_div_'+key).html(value[0]).addClass('text-danger');
                }  
                
              });
    
            }

            else  // saved company so reload paginated records
            {
              
                $.ajax({

                  url : './companies/ajaxpagination?page=1',
            
                }).done(function(data){
            
                    $('#table_paginted_companies tbody').html(data);
                });

            }


        }  // end success


      });  // end $.ajax({


}  // end function insertCompany()



function updateCompany()
{

      $.ajax({

        type : 'POST',

        url  : './companies/update',

        data : {

        '_token' : $('input[name=_token]').val(),

        'id' : $('#input_hidden_company_id').val(), 

        'companyname' : $('input[name=company_name_edit]').val(),

        'contactperson' : $('input[name=contact_person_edit]').val(),

        'companyaddress' : $('input[name=company_address_edit]').val(),

        'companyphone' : $('input[name=company_phone_edit]').val(),

        'companyfax' : $('input[name=company_fax_edit]').val(),

        'companyemail' : $('input[name=company_email_edit]').val(),

        'companyzip' : $('input[name=company_zip_edit]').val(),

        'companycity' : $('input[name=company_city_edit]').val(),

        'companystate' : $('input[name=company_state_edit]').val(),

        'companydescription' : $('textarea[name=company_description_edit]').val(),

        },


        success : function(data){  console.log(data.errors);


            $('[id^=company_update_error_div_]').html('');

            if(data.errors)
            {
                
              $.each(data.errors , function( key, value ) {

                if(data.errors[key])
                {
                  $('#company_update_error_div_'+key).html(value[0]).addClass('text-danger');
                }  
                
              });
    
            }

            else  // saved company so reload paginated records
            {
              
                $.ajax({

                  url : './companies/ajaxpagination?page=1',
            
                }).done(function(data){
            
                  $('#table_paginted_companies tbody').html(data);

                });

            }


        }  // end success


      });  // end $.ajax({


}  // end function updateCompany()



function fetchPaginatedCompanies(page)
{

    $.ajax({

      url : './companies/ajaxpagination?page='+page,

      data : {

        'search_company_name' : $('input[name=search_company_name]').val(),
        'search_contact_person' : $('input[name=search_contact_person]').val(),

      }

    }).done(function(data){

      $('#table_paginted_companies tbody').html(data);

    });

}   // end function fetchPaginatedCompanies()