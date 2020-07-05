$(document).ready(function(){ 


  $(document).on('click', '.pagination a', function(e){

    e.preventDefault();

    var page = $(this).attr('href').split('page=')[1];

    fetchPaginatedCompanies(page);

  });


  $(document).on('click', '#btn_create_company', function(){ saveCompany(); });  

  $(document).on('click', '#btn_update_company', function(){ updateCompany(); });  
  
  
  $('#modal_edit_company').on('show.bs.modal', function (e) 
  {        

    var company_id = $(e.relatedTarget).data('company_id');   

    console.log(company_id);

    $.ajax({            

          type : 'GET',            
          url : '/seven/public/fetchcompany/{id}',    
          data    : 'id='+ company_id, //Pass $user_id            
          success : function(result) 
          { 
             console.log(result);
            $('#input_text_company_name_edit').val(result.name);

            $('#input_text_contact_person_edit').val(result.contact_person);

            $('#input_text_company_address_edit').val(result.address);

            $('#input_text_company_phone_edit').val(result.phone);

            $('#input_text_company_fax_edit').val(result.fax);

            $('#input_text_company_email_edit').val(result.email);

            $('#input_text_company_zip_edit').val(result.zip);

            $('#input_text_company_city_edit').val(result.city);

            $('#input_text_company_state_edit').val(result.state);

            $('#input_text_company_description_edit').val(result.description);

            $('#input_hidden_company_id').val(company_id);

          },
          error   : function(result) 
          { 
          alert('error'+result); 
          }

      }); 

  });  // end on('show.bs.modal'



  $("#search_text_company_name").on("keyup", function(e) {

      $.ajax({

        url : '/seven/public/companies/indexs',

        data : { 

          'search_company_name' : $('input[name=search_company_name]').val(),

        }

      }).done(function(data){

          $('#table_paginated_data').html(data);
      });
      
  });


   
});  // end $(document).ready(



function saveCompany()
{

      $.ajax({

        type : 'POST',

        url  : 'createcompany',

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
                  $('#errordiv_'+key).html(value[0]).addClass('text-danger');
                }  
                
              });
    
            }

            else  // saved company so reload paginated records
            {
              
                $.ajax({

                  url : '/seven/public/companies/ajaxpagination?page=1',
            
                }).done(function(data){
            
                    $('#table_paginated_data').html(data);
                });

            }


        }  // end success


      });  // end $.ajax({


}  // end function saveCompany()



function updateCompany()
{

      $.ajax({

        type : 'POST',

        url  : 'editcompany',

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


            $('[id^=errordiv_edit_]').html('');

            if(data.errors)
            {
                
              $.each(data.errors , function( key, value ) {

                if(data.errors[key])
                {
                  $('#errordiv_edit_'+key).html(value[0]).addClass('text-danger');
                }  
                
              });
    
            }

            else  // saved company so reload paginated records
            {
              
                $.ajax({

                  url : '/seven/public/companies/ajaxpagination?page=1',
            
                }).done(function(data){
            
                    $('#table_paginated_data').html(data);
                });

            }


        }  // end success


      });  // end $.ajax({


}  // end function saveCompany()



function fetchPaginatedCompanies(page)
{

    $.ajax({

      url : '/seven/public/companies/ajaxpagination?page='+page,

    }).done(function(data){

        $('#table_paginated_data').html(data);
    });

}