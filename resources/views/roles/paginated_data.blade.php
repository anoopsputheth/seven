

    @foreach($roles as $role)

<tr> 

     <td width="22%"> {{ $role->name }} </td>

    
     <td width="14%"> 

     <a href="#modal_view_role" data-toggle="modal" data-view_role_id="<?= $role->id; ?>"><button class="btn btn-info btn-sm">View</button></a> 

     <a href="#modal_edit_role" data-toggle="modal" data-update_role_id="<?= $role->id; ?>"><button class="btn btn-warning btn-sm">Edit</button></a>
     
     <a href="#modal_delete_role" data-toggle="modal" data-delete_role_id="<?= $role->id; ?>"><button class="btn btn-danger btn-sm">Delete</button></a>
     </td>


</tr>

@endforeach


<tr> <td colspan="4"> {!! $roles->links() !!} </td> </tr>









