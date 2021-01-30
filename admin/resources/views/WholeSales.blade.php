@extends('Layout.app')
@section('title','Home')
@section('content')

<div id="mainDivMessage" class="container-fluid d-none">
        <div class="row">
            <div class="col-md-12 p-5">
                <table id="messageDataTable" class="table table-striped table-sm table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th class="th-sm">NO</th>
                            <th class="th-sm">Name</th>
                            <th class="th-sm">Email</th>
                            <th class="th-sm">Mobile</th>
                            <th class="th-sm">Massage</th>
                            <th class="th-sm">Delete</th>
                        </tr>
                    </thead>
                    <tbody id="message_table">


                    </tbody>
                </table>

            </div>
        </div>
    </div>
    <div id="loadDivMessage" class="container">
        <div class="row">
            <div class="col-md-12 p-5 text-center">
                <img class="loding-icon m-5" src="{{ asset('loader.svg') }}" alt="">

            </div>
        </div>
    </div>
    <div id="wrongDivMessage" class="container d-none">
        <div class="row">
            <div class="col-md-12 p-5 text-center">
                <h3>Something Went Wrong!</h3>
            </div>
        </div>
    </div>


      <!-- Modal Message Delete -->
      <div class="modal fade" id="deleteModalMessage" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">

              <div class="modal-body p-3 text-center">
                  <h5 class="mt-4">Do you want to Delete</h5>
                  <h5 id="messageDeleteId" class="mt-4  "></h5>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">No</button>
                  <button data-id="" id="confirmDeleteMessage" type="button" class="btn btn-sm btn-danger">Yes</button>
              </div>
          </div>
      </div>
  </div>
  <!-- Modal Message Delete -->



@endsection



@section('script')
    <script type="text/javascript">
        getContactData();
//message table
 function getContactData() {
axios.get('/getContactData')
    .then(function(response) {
        if (response.status = 200) {
            $('#mainDivMessage').removeClass('d-none');
            $('#loadDivMessage').addClass('d-none');
            $('#messageDataTable').DataTable().destroy();
            $('#message_table').empty();
            var dataJSON = response.data;
            $.each(dataJSON, function(i, item) {
                $('<tr>').html(
                    "<td>" +i+ " </td>" +
                    "<td class='text-center'>" + dataJSON[i].name + " </td>" +
                    "<td class='text-center'>" + dataJSON[i].email + " </td>" +
                    "<td class='text-center'>" + dataJSON[i].mobile + " </td>" +
                    "<td class='text-center'>" + dataJSON[i].msg + " </td>" +
                    "<td class='text-center'><a class='delDataMessage'  data-id=" + dataJSON[i].id + " ><i class='fas fa-trash-alt'></i></a> </td>"
                ).appendTo('#message_table');
            });
             //MEssage table delete icon click
             $(".delDataMessage").click(function() {
                var id = $(this).data('id');
                $('#messageDeleteId').html(id);
                $('#deleteModalMessage').modal('show');
            })
            $('#messageDataTable').DataTable({"order":false});
            $('.dataTables_length').addClass('bs-select');
        } else {
            $('#wrongDivMessage').removeClass('d-none');
            $('#loadDivMessage').addClass('d-none');
        }
    }).catch(function(error) {
        $('#wrongDivMessage').removeClass('d-none');
        $('#loadDivMessage').addClass('d-none');
    });
}
//  Message delete modal yes button
$('#confirmDeleteMessage').click(function() {
var id = $('#messageDeleteId').html();
//var id = $(this).data('id');
deleteContact(id);
})
//delete Message function
function deleteContact(id) {
$('#confirmDeleteMessage').html(
    "<div class='spinner-border spinner-border-sm text-primary' role='status'></div>"); //animation
axios.post('/deleteContactData', {
        id: id
    })
    .then(function(response) {
        $('#confirmDeleteMessage').html("Yes");
        if (response.status == 200) {
            if (response.data == 1) {
                $('#deleteModalMessage').modal('hide');
                toastr.error('Delete Success.');
                getContactData();
            } else {
                $('#deleteModalMessage').modal('hide');
                toastr.error('Delete Failed');
                getContactData();
            }
        } else {
            $('#deleteModalMessage').modal('hide');
            toastr.error('Something Went Wrong');
        }
    }).catch(function(error) {
        $('#deleteModalMessage').modal('hide');
        toastr.error('Something Went Wrong');
    });
}
    </script>

@endsection