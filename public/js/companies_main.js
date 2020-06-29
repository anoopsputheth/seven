$(document).ready(function(){ 


  $(document).on('click', '.pagination a', function(e){

    e.preventDefault();

    var page = $(this).attr('href').split('page=')[1];

    fetchPaginatedCompanies(page);

  });


  $(document).on('click', '#btn_create_company', function(){ saveCompany(); });  
  
  
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
          },
          error   : function(result) 
          { 
          alert('error'+result); 
          }

      }); 

  });  // end on('show.bs.modal'

   
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



function fetchPaginatedCompanies(page)
{

    $.ajax({

      url : '/seven/public/companies/ajaxpagination?page='+page,

    }).done(function(data){

        $('#table_paginated_data').html(data);
    });

}