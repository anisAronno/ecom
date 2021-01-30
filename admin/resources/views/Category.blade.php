@extends('Layout.app')


@section('content')

<div id="mainDiv" class="container-fluid d-none">
    <h5>Add New Category</h5>
    <div class="row">
        <div class="col-md-12 p-2">


            <button id="addbtn" class="btn btn-sm btn-primary my-3">Add New</button>

            <table id="categoryDataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr style='text-align:center'>
                        <th class="th-sm"><h4>SL.</h4></th>
                        <th class="th-sm"><h4>Name</h4></th>
                        <th class="th-sm"><h4>Description</h4></th>
                        <th class="th-sm"><h4>Image</h4></th>
                        <th colspan="2" class="th-sm"><h4>Action</h4></th>
                    </tr>
                </thead>
                <tbody id="category_table">


                </tbody>
            </table>

        </div>
    </div>
</div>


<div id="loadDiv" class="container">
    <div class="row">
        <div class="col-md-12 p-5 text-center">
            <img class="loding-icon m-5" src="{{ asset('loader.svg') }}" alt="">

        </div>
    </div>
</div>
<div id="wrongDiv" class="container d-none">
    <div class="row">
        <div class="col-md-12 p-5 text-center">
            <h3>Something Went Wrong!</h3>
        </div>
    </div>
</div>

<!-- Modal Delete -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-body p-3 text-center">
                <h5 class="mt-4">Do you want to Delete</h5>
                <h5 id="categoryDeleteId" class="mt-4 d-none"></h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">No</button>
                <button data-id="" id="confirmDelete" type="button" class="btn btn-sm btn-danger">Yes</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal Delete -->


<!-- Modal update -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-body p-5 text-center">
                <h5>Edit your Category Details</h5>

                <div id="categoryEditForm" class="d-none w-100">

                    <h5 id="categoryEditId" class="mt-4 d-none"></h5>
                    <input type="text" value="" id="categoryname" class="form-control mb-4">
                    <input type="text" value="" id="categorydes" class="form-control mb-4">
                    <input class="form-control" id="categoryimgUpdate" type="file">
                    <img id="imagepreview" style="height: 100px !important;" class="imgPreview mt-3 " src="" />

                </div>

                <img id="serviceLoader" class="loding-icon m-5" src="{{ asset('loader.svg') }}" alt="">


                <h3 id="wrongLoader" class="d-none">Something Went Wrong!</h3>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Cancel</button>
                <button id="confirmUpdate" type="button" class="btn btn-sm btn-danger">Update</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal update -->





<!-- Modal add new -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-body p-5 text-center">
                <h5 class="mb-4">Add New Category</h5>

                <div id="categoryAddForm" class="w-100">

                    <input type="text" id="categorynameadd" class="form-control mb-4" placeholder="Category Name">
                    <input type="text" id="categorydesadd" class="form-control mb-4" placeholder="Category Description">
                    <!-- <input type="text" id="serviceimgadd" class="form-control mb-4" placeholder="Image Link"> -->
                    <input type="file" id="categoryImageadd" name="text-input">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Cancel</button>
                <button id="addcategoryeBtn" type="button" class="btn btn-sm btn-danger">Save</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal add new -->


@endsection


@section('script')

<script type="text/javascript">



    getCategotyData(); //when page will load this method also will run

    // for category table

    function getCategotyData() {

console.log("aaaaaaaaaaaa");
        axios.get('/getCategoryData')
            .then(function(response) {

                if (response.status = 200) {

                    $('#mainDiv').removeClass('d-none');
                    $('#loadDiv').addClass('d-none');


                    $('#categoryDataTable').DataTable().destroy();
                    $('#category_table').empty();
                    console.log(response.data);


                    var dataJSON = response.data;
                    var count=1;
                    $.each(dataJSON, function(i, item) {
                        $('<tr>').html(

                            "<td style='text-align:center'>" + count++ + " </td>" +
                            "<td style='text-align:center'>" + dataJSON[i].category_name + " </td>" +
                            "<td style='text-align:center'>" + dataJSON[i].category_des + " </td>" +
                            "<td style='text-align:center'><img width='200px' height='80' class='table-img' src=" + dataJSON[i].category_img + "> </td>" +
                            "<td style='text-align:center'><a class='editData' data-id=" + dataJSON[i].id +
                            "><button class='btn btn-primary'><i class='fas fa-edit'></i></a> <a class='delData' data-id=" + dataJSON[i].id +
                            " ><button class='btn btn-danger'><i class='fas fa-trash-alt'></i></a> </td>"

                        ).appendTo('#category_table');
                    });



                    //service table delete icon click
                    $(".delData").click(function() {
                        var id = $(this).data('id');

                        $('#categoryDeleteId').html(id);
                        // $('#confirmDelete').attr('data-id', id);
                        $('#deleteModal').modal('show');

                    })


                    //edit data using modal

                    $(".editData").click(function() {

                        var id = $(this).data('id');
                        CategoryUpdateDetails(id);
                        $('#categoryEditId').html(id);
                        $('#editModal').modal('show');

                    })

                    $('#categoryDataTable').DataTable({
                        "order": false
                    });
                    $('.dataTables_length').addClass('bs-select');


                } else {
                    $('#wrongDiv').removeClass('d-none');
                    $('#loadDiv').addClass('d-none');

                }


            }).catch(function(error) {

                $('#wrongDiv').removeClass('d-none');
                $('#loadDiv').addClass('d-none');

            });


    }



    //service delete modal yes button

    $('#confirmDelete').click(function() {
        var id = $('#categoryDeleteId').html();
        DeleteData(id);

    })


    //delete data function

    function DeleteData(id) {
        $('#confirmDelete').html(
            "<div class='spinner-border spinner-border-sm text-primary' role='status'></div>"); //animation
        console.log(id);

        axios.post('/categoryDelete', {
                id: id
            })
            .then(function(response) {
                $('#confirmDelete').html("Yes");

                if (response.status == 200) {


                    if (response.data == 1) {
                        $('#deleteModal').modal('hide');
                        toastr.success('Delete Success.');
                        getCategotyData();
                    } else {
                        $('#deleteModal').modal('hide');
                        toastr.error('Delete Failed');
                        getCategotyData();
                    }

                } else {
                    $('#deleteModal').modal('hide');
                    toastr.error('Something Went Wrong');
                }

            }).catch(function(error) {

                $('#deleteModal').modal('hide');
                toastr.error('Something Went Wrong');

            });

    }




    //each service  Details data axios

    function CategoryUpdateDetails(detailsData) {


        axios.post('/servicedetails', {
                id: detailsData
            })
            .then(function(response) {

                if (response.status == 200) {


                    $('#serviceLoader').addClass('d-none');
                    $('#categoryEditForm').removeClass('d-none');
                    var jsonData = response.data;

                    $('#categoryname').val(jsonData[0].category_name);
                    $('#categorydes').val(jsonData[0].category_des);
                    var ImgSource = (jsonData[0].category_img);
                    $('#imagepreview').attr('src', ImgSource)



                } else {

                    $('#serviceLoader').addClass('d-none');
                    $('#wrongLoader').removeClass('d-none');
                }

            }).catch(function(error) {

                $('#serviceLoader').addClass('d-none');
                $('#wrongLoader').removeClass('d-none');

            });

    }

    $('#categoryimgUpdate').change(function() {
        var reader = new FileReader();
        reader.readAsDataURL(this.files[0]);
        reader.onload = function(event) {
            var ImgSource = event.target.result;
            $('#imagepreview').attr('src', ImgSource)
        }
    })



    //service update modal save button

    $('#confirmUpdate').click(function() {


        var id = $('#categoryEditId').html();
        var name = $('#categoryname').val();
        var des = $('#categorydes').val();
        var img = $('#categoryimgUpdate').prop('files')[0];

        categoryUpdate(id, name, des, img);

    })


    //update service data axios

    function categoryUpdate(updateid, updatename, updatedes, updateimg) {



        if (updatename.length == 0) {

            toastr.error('service name is empty!');

        } else if (updatedes == 0) {

            toastr.error('service description is empty!');

        } else {
            $('#confirmUpdate').html(
                "<div class='spinner-border spinner-border-sm text-primary' role='status'></div>"); //animation


            updateData = [{
                    id: updateid,
                    name: updatename,
                    description: updatedes
                }

            ];
            var formData = new FormData();
            formData.append('data', JSON.stringify(updateData));
            formData.append('photo', updateimg);


            axios.post('/categoryUpdate', formData, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            }).then(function(response) {

                $('#confirmUpdate').html("Update");

                if (response.status = 200) {
                    if (response.data == 1) {
                        $('#editModal').modal('hide');
                        toastr.success('Update Success.');
                        getCategotyData();
                    } else {
                        $('#editModal').modal('hide');
                        toastr.error('Update Failed');
                        getCategotyData();
                    }
                } else {
                    $('#editModal').modal('hide');
                    toastr.error('Something Went Wrong');
                }


            }).catch(function(error) {

                $('#editModal').modal('hide');
                toastr.error('Something Went Wrong');

            });

        }


    }







    //Add New Service all are here
    //Service add new button click


    $('#addbtn').click(function() {

        $('#addModal').modal('show');
    })


    //service update modal save button

    $('#addcategoryeBtn').click(function() {



        var name = $('#categorynameadd').val();
        var des = $('#categorydesadd').val();
        var img = $('#categoryImageadd').prop('files')[0];


        categoryAdd(name, des, img);

    })






    //Service Add Method


    function categoryAdd(name, des, img) {






        if (name.length == 0) {

            toastr.error('Category name is empty!');

        } else if (des == 0) {

            toastr.error('Category description is empty!');

        } else {
            $('#addcategoryeBtn').html(
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

            axios.post('/addCategory', formData, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            }).then(function(response) {

                $('#addcategoryeBtn').html("Save");

                if (response.status = 200) {
                    if (response.data == 1) {
                        $('#addModal').modal('hide');
                        toastr.success('Add New Success .');
                        getCategotyData();
                    } else {
                        $('#addModal').modal('hide');
                        toastr.error('Add New Failed');
                        getCategotyData();
                    }
                } else {
                    $('#addModal').modal('hide');
                    toastr.error('Something Went Wrong');
                }


            }).catch(function(error) {

                $('#addModal').modal('hide');
                toastr.error('Something Went Wrong');

            });

        }
    }
</script>

@endsection
