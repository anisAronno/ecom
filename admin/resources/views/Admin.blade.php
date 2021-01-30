@extends('Layout.app')

@section('content')

<div id="mainDivAdmin" class="container-fluid d-none">
    <div class="row">
        <div class="col-md-12 p-2">
            <button id="addbtnAdmin" class="btn btn-sm btn-primary my-3">Add New</button>
            <table id="AdminDataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr style='text-align:center'>
                        <th class="th-sm">Sl.</th>
                        <th class="th-sm">Name</th>
                        <th class="th-sm">Eamil</th>
                        <th class="th-sm">User Name</th>
                        <th class="th-sm">Password</th>
                        <th colspan="2" class="th-sm">Action</th>
                    </tr>
                </thead>
                <tbody id="Admin_table">


                </tbody>
            </table>
        </div>
    </div>
</div>

<div id="loadDivAdmin" class="container">
    <div class="row">
        <div class="col-md-12 p-5 text-center">
            <img class="loding-icon m-5" src="{{ asset('loader.svg') }}" alt="">

        </div>
    </div>
</div>
<div id="wrongDivAdmin" class="container d-none">
    <div class="row">
        <div class="col-md-12 p-5 text-center">
            <h3>Something Went Wrong!</h3>
        </div>
    </div>
</div>



<!-- Brnad add -->
<div class="modal fade" id="addAdminModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title ml-5">Add New Admin</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body  text-center">
                <div class="container">
                    <div class="row">

                        <input id="AdminName" type="text" id="" class="form-control mb-3" placeholder="Admin Name">
                        <input id="AdminEmail" type="text" id="" class="form-control mb-3" placeholder="Admin Eamil">
                        <input id="AdminUsername" type="text" id="" class="form-control mb-3" placeholder="Admin User Name">
                        <input id="AdminPassword" type="text" id="" class="form-control mb-3" placeholder="Admin Password">



                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Cancel</button>
                <button id="AdminAddConfirmBtn" type="button" class="btn  btn-sm  btn-danger">Save</button>
            </div>
        </div>
    </div>
</div>

<!-- Brnad add -->


<!-- Modal Brnad Delete -->
<div class="modal fade" id="deleteModalAdmin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-body p-3 text-center">
                <h5 class="mt-4">Do you want to Delete</h5>
                <h5 id="AdminDeleteId" class="mt-4 d-none "></h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">No</button>
                <button data-id="" id="confirmDeleteAdmin" type="button" class="btn btn-sm btn-danger">Yes</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal Brnad Delete -->




<!-- Brnad update -->
<div class="modal fade" id="updateAdminModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Course</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body  text-center">
                <div id="AdminEditForm" class="container d-none ">
                    <h5 id="AdminEditId" class="mt-4 d-none"></h5>
                    <div class="row">
                        <div class="col-md-12">
                            <input id="AdminNameIdUpdate" type="text" id="" class="form-control mb-3" placeholder="Admin Name">
                            <input id="AdminEmailIdUpdate" type="text" id="" class="form-control mb-3" placeholder="Admin Email">
                            <input id="AdminUsernameIdUpdate" type="text" id="" class="form-control mb-3" placeholder="Admin User Name">
                            <input id="AdminPasswordIdUpdate" type="text" id="" class="form-control mb-3" placeholder="Admin Password">

                        </div>

                    </div>
                </div>
                <img id="AdminLoader" class="loding-icon m-5 d-none" src="{{ asset('loader.svg') }}" alt="">
                <h3 id="AdminwrongLoader" class="d-none">Something Went Wrong!</h3>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Cancel</button>
                <button id="AdminupdateConfirmBtn" type="button" class="btn  btn-sm  btn-danger">Update</button>
            </div>
        </div>
    </div>
</div>


<!-- Brnad update -->



@endsection
@section('script')
<script type="text/javascript">
    getAdmindata();





    // for Admin table

    function getAdmindata() {


        axios.get('/getAdmindata')
            .then(function(response) {

                if (response.status = 200) {

                    $('#mainDivAdmin').removeClass('d-none');
                    $('#loadDivAdmin').addClass('d-none');

                    $('#AdminDataTable').DataTable().destroy();
                    $('#Admin_table').empty();
                    var count = 1;
                    var dataJSON = response.data;
                    console.log(dataJSON);
                    $.each(dataJSON, function(i, item) {
                        $('<tr>').html(
                            "<td style='text-align:center'>" + count++ + " </td>" +

                            "<td style='text-align:center'>" + dataJSON[i].name + " </td>" +

                            "<td style='text-align:center'>" + dataJSON[i].email + " </td>" +

                            "<td style='text-align:center'>" + dataJSON[i].username + " </td>" +

                            "<td style='text-align:center'>" + dataJSON[i].password + " </td>" +

                            "<td style='text-align:center'><a class='AdminEditIcon' data-id=" + dataJSON[i].id +
                            "> <button class='btn btn-primary'><i class='fas fa-edit'></i></button></a> <a class='AdminDeleteIcon' data-id=" + dataJSON[i].id +
                            " > <button class='btn btn-danger'><i class='fas fa-trash-alt'></button></i></a>  </td>" +

                            "<td></td>"
                        ).appendTo('#Admin_table');
                    });


                    //Admin click on delete icon

                    $(".AdminDeleteIcon").click(function() {

                        var id = $(this).data('id');
                        $('#AdminDeleteId').html(id);
                        $('#deleteModalAdmin').modal('show');

                    })



                    //Admin edit icon click

                    $(".AdminEditIcon").click(function() {

                        var id = $(this).data('id');
                        $('#AdminEditId').html(id);

                        $('#updateAdminModal').modal('show');
                        AdminUpdateDetails(id);

                    })




                    $('#AdminDataTable').DataTable({
                        "order": false
                    });
                    $('.dataTables_length').addClass('bs-select');


                } else {
                    $('#wrongDivAdmin').removeClass('d-none');
                    $('#loadDivAdmin').addClass('d-none');

                }
            }).catch(function(error) {

                $('#wrongDivAdmin').removeClass('d-none');
                $('#loadDivAdmin').addClass('d-none');
            });


    }




    //add button modal show for add new entity

    $('#addbtnAdmin').click(function() {
        $('#addAdminModal').modal('show');
    });


    //Admin Add modal save button

    $('#AdminAddConfirmBtn').click(function() {


        var name = $('#AdminName').val();
        var email = $('#AdminEmail').val();
        var username = $('#AdminUsername').val();
        var password = $('#AdminPassword').val();




        ProductAdd(name, email, username, password);

    })

    //Courses Add Method


    function ProductAdd(name, email, username, password) {



        if (name.length == 0) {

            toastr.error('Admin name is empty!');

        } else if (email == 0) {

            toastr.error('Admin Email is empty!');
        }else if (username == 0) {

            toastr.error('Admin User Name is empty!');
        }else if (password == 0) {

            toastr.error('Admin Password is empty!');
        } else {

            $('#AdminAddConfirmBtn').html(
                "<div class='spinner-border spinner-border-sm text-primary' role='status'></div>"); //animation

            axios.post('/addAdmin',
                   { name: name,
                    email: email,
                    username: username,
                    password: password}
            ).then(function(response) {

                $('#AdminAddConfirmBtn').html("Save");

                if (response.status = 200) {
                    if (response.data == 1) {
                        $('#addAdminModal').modal('hide');
                        toastr.success('Add New Success .');
                        getAdmindata();
                    } else {
                        $('#addAdminModal').modal('hide');
                        toastr.error('Add New Failed');
                        getAdmindata();
                    }
                } else {
                    $('#addAdminModal').modal('hide');
                    toastr.error('Something Went Wrong');
                }


            }).catch(function(error) {

                $('#addAdminModal').modal('hide');
                toastr.error('Something Went Wrong');

            });

        }

    }



    //  Admin delete modal yes button

    $('#confirmDeleteAdmin').click(function() {
        var id = $('#AdminDeleteId').html();
        // var id = $(this).data('id');
        DeleteDataAdmin(id);

    })


    //delete courses function

    function DeleteDataAdmin(id) {
        $('#confirmDeleteAdmin').html(
            "<div class='spinner-border spinner-border-sm text-primary' role='status'></div>"); //animation

        axios.post('/Admindelete', {
                id: id
            })
            .then(function(response) {
                $('#confirmDeleteAdmin').html("Yes");

                if (response.status == 200) {


                    if (response.data == 1) {
                        $('#deleteModalAdmin').modal('hide');
                        toastr.error('Delete Success.');
                        getAdmindata();
                    } else {
                        $('#deleteModalAdmin').modal('hide');
                        toastr.error('Delete Failed');
                        getAdmindata();
                    }

                } else {
                    $('#deleteModalAdmin').modal('hide');
                    toastr.error('Something Went Wrong');
                }

            }).catch(function(error) {

                $('#deleteModalAdmin').modal('hide');
                toastr.error('Something Went Wrong');

            });

    }


    //Admin Details data show for edit

    function AdminUpdateDetails(id) {

        axios.post('/Admindetails', {
                id: id
            })
            .then(function(response) {

                if (response.status == 200) {
                    $('#AdminLoader').addClass('d-none');
                    $('#AdminEditForm').removeClass('d-none');
                    var jsonData = response.data;
                    $('#AdminNameIdUpdate').val(jsonData[0].name);
                    $('#AdminEmailIdUpdate').val(jsonData[0].email);
                    $('#AdminUsernameIdUpdate').val(jsonData[0].username);
                    $('#AdminPasswordIdUpdate').val(jsonData[0].password);

                } else {

                    $('#AdminLoader').addClass('d-none');
                    $('#AdminwrongLoader').removeClass('d-none');
                }

            }).catch(function(error) {

                $('#AdminLoader').addClass('d-none');
                $('#AdminwrongLoader').removeClass('d-none');

            });

    }







    //courses update modal save button

    $('#AdminupdateConfirmBtn').click(function() {


        var idUpdate = $('#AdminEditId').html();
        var nameUpdate = $('#AdminNameIdUpdate').val();
        var emailUpdate = $('#AdminEmailIdUpdate').val();
        var UsernameUpdate = $('#AdminUsernameIdUpdate').val();
        var PasswordUpdate = $('#AdminPasswordIdUpdate').val();



        AdminUpdate(idUpdate, nameUpdate, emailUpdate, UsernameUpdate,PasswordUpdate);

    })





    //update Admin data using modal

    function AdminUpdate(idUpdate, nameUpdate, emailUpdate, UsernameUpdate,PasswordUpdate) {



        if (UsernameUpdate.length == 0) {

            toastr.error('ProeUser Name is empty!');

        } else if (PasswordUpdate == 0) {

            toastr.error('Password description is empty!');

        } else {
            $('#AdminupdateConfirmBtn').html(
                "<div class='spinner-border spinner-border-sm text-primary' role='status'></div>"); //animation


            axios.post('/Adminupdate', {
                    id: idUpdate,
                    name: nameUpdate,
                    email: emailUpdate,
                    username: UsernameUpdate,
                    password: PasswordUpdate
            }).then(function(response) {

                $('#AdminupdateConfirmBtn').html("Update");

                if (response.status = 200) {
                    if (response.data == 1) {
                        $('#updateAdminModal').modal('hide');
                        toastr.success('Update Success.');
                        getAdmindata();

                    } else {
                        $('#updateAdminModal').modal('hide');
                        toastr.error('Update Failed');
                        getAdmindata();

                    }
                } else {
                    $('#updateAdminModal').modal('hide');
                    toastr.error('Something Went Wrong');
                }


            }).catch(function(error) {

                $('#updateAdminModal').modal('hide');
                toastr.error('Something Went Wrong');

            });
        }
    }
</script>

@endsection
