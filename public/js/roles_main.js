$(document).ready(function(){ 


    $(document).on('click', '.pagination a', function(e){
  
      e.preventDefault();
  
      var page = $(this).attr('href').split('page=')[1];
  
      fetchPaginatedRoles(page);
  
    });
  
  
    $(document).on('click', '#btn_create_role', function(){ insertRole(); });  
  
    $(document).on('click', '#btn_update_role', function(){ updateRole(); });  
  
  
  
    $('#modal_create_role').on('hidden.bs.modal', function () {  
  
      $('[id^=role_create_error_div_]').html('');
      $('#form_role_create').trigger("reset");
  
    }); // end on('hidden.bs.modal'
  
  
  
    $(document).on('click', '#btn_close_modal_create_role', function(){
  
      $('#modal_create_role').modal('hide');
  
    });
  
  
    
    $('#modal_edit_role').on('show.bs.modal', function (e) 
    {        
  
      var role_id_update_role = $(e.relatedTarget).data('update_role_id');   
  
      //console.log(role_id_update_role);
  
      $.ajax({            
  
            type : 'GET',         
  
            url :  './roles/fetch/{id}',
  
            data    : 'id='+ role_id_update_role, // pass role id        
  
            success : function(data) 
  
            { 
               
              //console.log(data);
  
              $('#input_text_role_name_edit_role').val(data.name);
  
              $('#input_text_role_description_edit_role').val(data.description);
  
              $('#input_hidden_role_id_edit_role').val(role_id_update_role);
  
            },
  
            error   : function() 
  
            { 
              
              console.log('some error occured while fetching role'); 
  
            }
  
        }); 
  
  
    });  // end on('show.bs.modal'
  
  
  
    $('#modal_edit_role').on('hidden.bs.modal', function () {  
  
      $('[id^=role_update_error_div_]').html('');
      $('#form_role_edit').trigger("reset");
  
    }); // end on('hidden.bs.modal'
  
  
  
    $(document).on('click', '#btn_close_modal_edit_role', function(){
  
      $('#modal_edit_role').modal('hide');
  
    });
  
  
  
  
    $('#modal_view_role').on('show.bs.modal', function (e) 
    {        
  
      var view_role_id = $(e.relatedTarget).data('view_role_id');   
  
      //console.log(view_role_id);
  
      $.ajax({            
  
            type : 'GET',         
  
            url :  './roles/fetch/{id}',
  
            data    : 'id='+ view_role_id, //Pass $role id           
  
            success : function(data) 
  
            { 
               
              //console.log(result);
  
              $('#input_text_role_name_view_role').val(data.name);
  
              $('#input_text_role_description_view_role').val(data.description);
  
            },
  
            error   : function() 
  
            { 
              
              console.log('some error occured while fetching role'); 
  
            }
  
        }); 
  
  
    });  // end on('show.bs.modal'
  
  
  
    $(document).on('click', '#btn_close_modal_view_role', function(){
  
      $('#modal_view_role').modal('hide');
  
    });
  
    
  
  
    $(document).on('keyup', '[id^=search_text_]' ,function(e) {
  
        $.ajax({
  
          url : './roles/indexsearch',
  
          data : { 
  
            'search_role_name' : $('input[name=search_role_name]').val(),
  
          }
  
        }).done(function(data){
  
            $('#table_paginted_roles tbody').html(data);
  
        });
        
    });  // end on('keyup'
  
  
     
  });  // end $(document).ready(
  
  
  
  function insertRole()
  {  
  
        $.ajax({
  
          type : 'POST',
  
          url  : './roles/create',
  
          data : {
  
          '_token' : $('input[name=_token]').val(),
  
          'rolename' : $('input[name=role_name_create_role]').val(),
  
          'roledescription' : $('input[name=role_description_create_role]').val(),
      

          'actions' : JSON.stringify(['com.ind', 'com.cre', 'com.upd'])

          
  
          },
  
  
          success : function(data){
  
  
              $('[id^=role_create_error_div_]').html('');
  
              if(data.errors)
              {
                  
                $.each(data.errors , function( key, value ) {
  
                  if(data.errors[key])
                  {
                    $('#role_create_error_div_'+key).html(value[0]).addClass('text-danger');
                  }  
                  
                });
      
              }
  
              else  // saved company so reload paginated records
              {
                
                  $.ajax({
  
                    url : './roles/ajaxpagination?page=1',
              
                  }).done(function(data){
              
                      $('#table_paginted_roles tbody').html(data);
                  });
  
              }
  
  
          }  // end success
  
  
        });  // end $.ajax({
  
  
  }  // end function insertRole()
  
  
  
  function updateRole()
  {
  
        $.ajax({
  
          type : 'POST',
  
          url  : './roles/update',
  
          data : {
  
          '_token' : $('input[name=_token]').val(),
  
          'id' : $('#input_hidden_role_id_edit_role').val(), 
  
          'rolename' : $('input[name=role_name_edit_role]').val(),
  
          'roledescription' : $('input[name=role_description_edit_description]').val(),
  
          },
  
  
          success : function(data){ 
            
              //console.log(data.errors);
  
  
              $('[id^=role_update_error_div_]').html('');
  
              if(data.errors)
              {
                  
                $.each(data.errors , function( key, value ) {
  
                  if(data.errors[key])
                  {
                    $('#role_update_error_div_'+key).html(value[0]).addClass('text-danger');
                  }  
                  
                });
      
              }
  
              else  // saved role so reload paginated records
              {
                
                  $.ajax({
  
                    url : './role/ajaxpagination?page=1',
              
                  }).done(function(data){
              
                    $('#table_paginted_roles tbody').html(data);
  
                    $('#modal_edit_role').modal('hide');
  
                  });
  
              }
  
  
          }  // end success
  
  
        });  // end $.ajax({
  
  
  }  // end function updateRole()
  
  
  
  function fetchPaginatedRoles(page)
  {
  
      $.ajax({
  
        url : './roles/ajaxpagination?page='+page,
  
        data : {
  
          'search_role_name' : $('input[name=search_role_name]').val(),
  
        }
  
      }).done(function(data){
  
        $('#table_paginted_roles tbody').html(data);
  
      });
  
  }   // end function fetchPaginatedRoles()