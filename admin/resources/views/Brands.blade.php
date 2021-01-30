@extends('Layout.app')

@section('content')

<div id="mainDivProjects" class="container-fluid d-none">
    <div class="row">
        <div class="col-md-12 p-2">
            <button id="addbtnbrand" class="btn btn-sm btn-primary my-3">Add New</button>
            <table id="brandDataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr style='text-align:center'>
                        <th class="th-sm"><h4>Sl.</h4></th>
                        <th class="th-sm"><h4>Image</h4></th>
                        <th class="th-sm"<h4>Name</h4></th>
                        <th class="th-sm"><h4>Description</h4></th>
                        <th colspan="2" class="th-sm"><h4>Action</h4></th>
                    </tr>
                </thead>
                <tbody id="brand_table">


                </tbody>
            </table>
        </div>
    </div>
</div>

<div id="loadDivProjects" class="container">
    <div class="row">
        <div class="col-md-12 p-5 text-center">
            <img class="loding-icon m-5" src="{{ asset('loader.svg') }}" alt="">

        </div>
    </div>
</div>
<div id="wrongDivProjects" class="container d-none">
    <div class="row">
        <div class="col-md-12 p-5 text-center">
            <h3>Something Went Wrong!</h3>
        </div>
    </div>
</div>



<!-- Brnad add -->
<div class="modal fade" id="addBrandModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title ml-5">Add New Brand</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body  text-center">
                <div class="container">
                    <div class="row">

                        <input id="brandName" type="text" id="" class="form-control mb-3" placeholder="Brand Name">
                        <input id="brandDes" type="text" id="" class="form-control mb-3" placeholder="Brand Description">
                        <input type="file" id="brandimg" class="form-control mb-3" name="text-input">


                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Cancel</button>
                <button id="brandAddConfirmBtn" type="button" class="btn  btn-sm  btn-danger">Save</button>
            </div>
        </div>
    </div>
</div>

<!-- Brnad add -->


<!-- Modal Brnad Delete -->
<div class="modal fade" id="deleteModalBrand" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-body p-3 text-center">
                <h5 class="mt-4">Do you want to Delete</h5>
                <h5 id="brandDeleteId" class="mt-4 d-none "></h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">No</button>
                <button data-id="" id="confirmDeleteBrand" type="button" class="btn btn-sm btn-danger">Yes</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal Brnad Delete -->




<!-- Brnad update -->
<div class="modal fade" id="updateBrandModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Course</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body  text-center">
                <div id="brandEditForm" class="container d-none ">
                    <h5 id="brandEditId" class="mt-4 d-none"></h5>
                    <div class="row">
                        <div class="col-md-6">
                            <input id="brandNameIdUpdate" type="text" id="" class="form-control mb-3" placeholder="Project Name">
                            <input id="brandDesIdUpdate" type="text" id="" class="form-control mb-3" placeholder="Project Description">

                        </div>
                        <div class="col-md-6">

                            <input class="form-control" id="brandimgUpdate" type="file">
                            <img id="imagepreview" style="height: 100px !important;" class="imgPreview mt-3 " src="" />
                        </div>
                    </div>
                </div>
                <img id="projectLoader" class="loding-icon m-5 d-none" src="{{ asset('loader.svg') }}" alt="">
                <h3 id="projectwrongLoader" class="d-none">Something Went Wrong!</h3>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Cancel</button>
                <button id="brandupdateConfirmBtn" type="button" class="btn  btn-sm  btn-danger">Update</button>
            </div>
        </div>
    </div>
</div>


<!-- Brnad update -->



@endsection
@section('script')
<script type="text/javascript">
    getBranddata();





    // for brand table

    function getBranddata() {


        axios.get('/getbranddata')
            .then(function(response) {

                if (response.status = 200) {

                    $('#mainDivProjects').removeClass('d-none');
                    $('#loadDivProjects').addClass('d-none');

                    $('#brandDataTable').DataTable().destroy();
                    $('#brand_table').empty();
                    var count = 1;
                    var dataJSON = response.data;
                    console.log(dataJSON);
                    $.each(dataJSON, function(i, item) {
                        $('<tr>').html(
                            "<td  style='text-align:center'>" + count++ + " </td>" +

                            "<td  style='text-align:center'><img width='200px' height='80' class='table-img' src=" + dataJSON[i]
                            .brand_img + "> </td>" +

                            "<td style='text-align:center'>" + dataJSON[i].brand_name + " </td>" +

                            "<td  style='text-align:center' >" + dataJSON[i].brand_des + " </td>" +

                            "<td   style='text-align:center' ><a class='brandEditIcon' data-id=" + dataJSON[i].id +
                            "><button class='btn btn-primary'><i class='fas fa-edit'></i></button></a><a class='brandDeleteIcon' data-id=" + dataJSON[i].id +
                            " ><button class='btn btn-danger'><i class='fas fa-trash-alt'></i></button></a> </td>"

                        ).appendTo('#brand_table');
                    });


                    //Projects click on delete icon

                    $(".brandDeleteIcon").click(function() {

                        var id = $(this).data('id');
                        $('#brandDeleteId').html(id);
                        $('#deleteModalBrand').modal('show');

                    })



                    //Project edit icon click

                    $(".brandEditIcon").click(function() {

                        var id = $(this).data('id');
                        $('#brandEditId').html(id);

                        $('#updateBrandModal').modal('show');
                        brandUpdateDetails(id);

                    })




                    $('#brandDataTable').DataTable({
                        "order": false
                    });
                    $('.dataTables_length').addClass('bs-select');


                } else {
                    $('#wrongDivProjects').removeClass('d-none');
                    $('#loadDivProjects').addClass('d-none');

                }
            }).catch(function(error) {

                $('#wrongDivProjects').removeClass('d-none');
                $('#loadDivProjects').addClass('d-none');
            });


    }




    //add button modal show for add new entity

    $('#addbtnbrand').click(function() {
        $('#addBrandModal').modal('show');
    });


    //brand Add modal save button

    $('#brandAddConfirmBtn').click(function() {


        var name = $('#brandName').val();
        var des = $('#brandDes').val();
        var img = $('#brandimg').prop('files')[0];




        ProductAdd(name, des, img);

    })

    //Courses Add Method


    function ProductAdd(name, des, img) {



        if (name.length == 0) {

            toastr.error('Brnad name is empty!');

        } else if (des == 0) {

            toastr.error('Brnad description is empty!');
        } else {

            $('#brandAddConfirmBtn').html(
                "<div class='spinner-border spinner-border-sm text-primary' role='status'></div>"); //animation



            my_data = [{
                    name: name,
                    description: des
                }

            ];
            var formData = new FormData();
            formData.append('data', JSON.stringify(my_data));
            console.log(img);
            formData.append('photo', img);

            axios.post('/addbrand', formData, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            }).then(function(response) {

                $('#brandAddConfirmBtn').html("Save");

                if (response.status = 200) {
                    if (response.data == 1) {
                        $('#addBrandModal').modal('hide');
                        toastr.success('Add New Success .');
                        getBranddata();
                    } else {
                        $('#addBrandModal').modal('hide');
                        toastr.error('Add New Failed');
                        getBranddata();
                    }
                } else {
                    $('#addBrandModal').modal('hide');
                    toastr.error('Something Went Wrong');
                }


            }).catch(function(error) {

                $('#addBrandModal').modal('hide');
                toastr.error('Something Went Wrong');

            });

        }

    }



    //  Projects delete modal yes button

    $('#confirmDeleteBrand').click(function() {
        var id = $('#brandDeleteId').html();
        // var id = $(this).data('id');
        DeleteDataBrand(id);

    })


    //delete courses function

    function DeleteDataBrand(id) {
        $('#confirmDeleteBrand').html(
            "<div class='spinner-border spinner-border-sm text-primary' role='status'></div>"); //animation

        axios.post('/branddelete', {
                id: id
            })
            .then(function(response) {
                $('#confirmDeleteBrand').html("Yes");

                if (response.status == 200) {


                    if (response.data == 1) {
                        $('#deleteModalBrand').modal('hide');
                        toastr.error('Delete Success.');
                        getBranddata();
                    } else {
                        $('#deleteModalBrand').modal('hide');
                        toastr.error('Delete Failed');
                        getBranddata();
                    }

                } else {
                    $('#deleteModalBrand').modal('hide');
                    toastr.error('Something Went Wrong');
                }

            }).catch(function(error) {

                $('#deleteModalBrand').modal('hide');
                toastr.error('Something Went Wrong');

            });

    }


    //each courses  Details data show for edit

    function brandUpdateDetails(id) {

        axios.post('/branddetails', {
                id: id
            })
            .then(function(response) {

                if (response.status == 200) {


                    $('#projectLoader').addClass('d-none');
                    $('#brandEditForm').removeClass('d-none');
                    var jsonData = response.data;


                    $('#brandNameIdUpdate').val(jsonData[0].brand_name);
                    $('#brandDesIdUpdate').val(jsonData[0].brand_des);
                    var ImgSource = (jsonData[0].brand_img);
                    $('#imagepreview').attr('src', ImgSource)
                } else {

                    $('#projectLoader').addClass('d-none');
                    $('#projectwrongLoader').removeClass('d-none');
                }

            }).catch(function(error) {

                $('#projectLoader').addClass('d-none');
                $('#projectwrongLoader').removeClass('d-none');

            });

    }


    $('#brandimgUpdate').change(function() {
        var reader = new FileReader();
        reader.readAsDataURL(this.files[0]);
        reader.onload = function(event) {
            var ImgSource = event.target.result;
            $('#imagepreview').attr('src', ImgSource)
        }
    })






    //courses update modal save button

    $('#brandupdateConfirmBtn').click(function() {


        var idUpdate = $('#brandEditId').html();
        var nameUpdate = $('#brandNameIdUpdate').val();
        var desUpdate = $('#brandDesIdUpdate').val();
        var img = $('#brandimgUpdate').prop('files')[0];


        brandUpdate(idUpdate, nameUpdate, desUpdate, img);

    })





    //update project data using modal

    function brandUpdate(idUpdate, nameUpdate, desUpdate, imgUpdate) {



        if (nameUpdate.length == 0) {

            toastr.error('Proejct name is empty!');

        } else if (desUpdate == 0) {

            toastr.error('Proejct description is empty!');

        } else {
            $('#brandupdateConfirmBtn').html(
                "<div class='spinner-border spinner-border-sm text-primary' role='status'></div>"); //animation

            updateData = [{
                    id: idUpdate,
                    name: nameUpdate,
                    description: desUpdate
                }

            ];
            var formData = new FormData();
            formData.append('data', JSON.stringify(updateData));
            formData.append('photo', imgUpdate);


            axios.post('/brandupdate', formData, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            }).then(function(response) {

                $('#brandupdateConfirmBtn').html("Update");

                if (response.status = 200) {
                    if (response.data == 1) {
                        $('#updateBrandModal').modal('hide');
                        toastr.success('Update Success.');
                        getBranddata();

                    } else {
                        $('#updateBrandModal').modal('hide');
                        toastr.error('Update Failed');
                        getBranddata();

                    }
                } else {
                    $('#updateBrandModal').modal('hide');
                    toastr.error('Something Went Wrong');
                }


            }).catch(function(error) {

                $('#updateBrandModal').modal('hide');
                toastr.error('Something Went Wrong');

            });
        }
    }
</script>

@endsection
