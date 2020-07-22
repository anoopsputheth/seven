

    @foreach($clients as $client)

<tr> 
     
 @php  $clientname = ($client->client_type_id == 3) ? $client->businessname :  $client->firstname. ' '.$client->lastname; @endphp   

     <td width="20%"> {{ $clientname }} </td>

     <td width="10%"> {{ $client->zip }} </td>

     <td width="10%"> {{ $client->city }} </td>

     <td width="10%"> {{ $client->state }} </td>

     <td width="15%"> {{ $client->phone }} </td>

     <td width="20%"> {{ $client->email }} </td>

     <td width="15%"> 

     <a href="#modal_view_client" data-toggle="modal" data-view_client_id="<?= $client->id; ?>"><button class="btn btn-info btn-sm">View</button></a> 

     <a href="#modal_edit_client" data-toggle="modal" data-update_client_id="<?= $client->id; ?>"><button class="btn btn-warning btn-sm">Edit</button></a>
     
     <a href="#modal_delete_client" data-toggle="modal" data-delete_client_id="<?= $client->id; ?>"><button class="btn btn-danger btn-sm">Delete</button></a>
     
     </td>


</tr>

@endforeach


<tr> <td colspan="4"> {!! $clients->links() !!} </td> </tr>









