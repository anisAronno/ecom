@extends('Layout.app')

@section('content')

<div id="mainDivProjects" class="container-fluid d-none">
    <div class="row">
        <div class="col-md-12 p-2">
            <button id="addbtnSlider" class="btn btn-sm btn-primary my-3">Add New</button>
            <table id="SliderDataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr style="text-align: center">
                        <th class="th-sm"> <h4>Sl.</h4></th>
                        <th class="th-sm"><h4>Image</h4></th>
                        <th class="th-sm"><h4>Name</h4></th>
                        <th class="th-sm"><h4>Description</h4></th>
                        <th colspan="2" class="th-sm"><h4>Action</h4></th>

                    </tr>
                </thead>
                <tbody id="Slider_table">


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
<div class="modal fade" id="addSliderModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title ml-5">Add New Slider</h5>
                <button type="button" class="close btn btn-primary" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body  text-center">
                <div class="container">
                    <div class="row">

                        <input id="SliderName" type="text" id="" class="form-control mb-3" placeholder="Slider Name">
                        <input id="SliderDes" type="text" id="" class="form-control mb-3" placeholder="Slider Description">
                        <input type="file" id="Sliderimg" class="form-control mb-3" name="text-input">
                        <img id="addimagepreview" style="height: 100px !important;" class="imgPreview mt-3 " src="{{ asset('images/default-image.png') }}" />


                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Cancel</button>
                <button id="SliderAddConfirmBtn" type="button" class="btn  btn-sm  btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>

<!-- Brnad add -->


<!-- Modal Brnad Delete -->
<div class="modal fade" id="deleteModalSlider" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-body p-3 text-center">
                <h5 class="mt-4">Do you want to Delete</h5>
                <h5 id="SliderDeleteId" class="mt-4 d-none "></h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">No</button>
                <button data-id="" id="confirmDeleteSlider" type="button" class="btn btn-sm btn-primary">Yes</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal Brnad Delete -->




<!-- Brnad update -->
<div class="modal fade" id="updateSliderModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Course</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body  text-center">
                <div id="SliderEditForm" class="container d-none text-center ">
                    <h5 id="SliderEditId" class="mt-4 d-none text-center"></h5>
                    <div class="row">
                        <div class="col-md-6">
                            <input id="SliderNameIdUpdate" type="text" id="" class="form-control mb-3" placeholder="Project Name">
                            <input id="SliderDesIdUpdate" type="text" id="" class="form-control mb-3" placeholder="Project Description">

                        </div>
                        <div class="col-md-6">

                            <input class="form-control" id="SliderimgUpdate" type="file">
                            <img id="imagepreview" style="height: 100px !important;" class="imgPreview mt-3 " src="" />
                        </div>
                    </div>
                </div>
                <img id="projectLoader" class="loding-icon m-5 d-none" src="{{ asset('loader.svg') }}" alt="">
                <h3 id="projectwrongLoader" class="d-none">Something Went Wrong!</h3>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Cancel</button>
                <button id="SliderupdateConfirmBtn" type="button" class="btn  btn-sm  btn-primary">Update</button>
            </div>
        </div>
    </div>
</div>


<!-- Brnad update -->



@endsection
@section('script')
<script type="text/javascript">
    getSliderdata();





    // for Slider table

    function getSliderdata() {


        axios.get('/getsliderdata')
            .then(function(response) {

                if (response.status = 200) {

                    $('#mainDivProjects').removeClass('d-none');
                    $('#loadDivProjects').addClass('d-none');

                    $('#SliderDataTable').DataTable().destroy();
                    $('#Slider_table').empty();
                    var count = 1;
                    var dataJSON = response.data;
                    console.log(dataJSON);
                    $.each(dataJSON, function(i, item) {
                        $('<tr>').html(
                            "<td style='text-align:center'>" + count++ + " </td>" +

                            "<td style='text-align:center'><img width='200px' height='80' class='table-img' src=" + dataJSON[i]
                            .image + "> </td>" +

                            "<td style='text-align:center'>" + dataJSON[i].title + " </td>" +

                            "<td style='text-align:center'>" + dataJSON[i].sub_title + " </td>" +

                            "<td style='text-align:center'><a class='SliderEditIcon' data-id=" + dataJSON[i].id +
                            "><button class='btn btn-success'><i class='fas fa-edit'></button></i></a> <a class='SliderDeleteIcon' data-id=" + dataJSON[i].id +
                            " ><button class='btn btn-danger'><i class='fas fa-trash-alt'></button></i></a></td>"
                        ).appendTo('#Slider_table');
                    });


                    //Projects click on delete icon

                    $(".SliderDeleteIcon").click(function() {

                        var id = $(this).data('id');
                        $('#SliderDeleteId').html(id);
                        $('#deleteModalSlider').modal('show');

                    })



                    //Project edit icon click

                    $(".SliderEditIcon").click(function() {

                        var id = $(this).data('id');
                        $('#SliderEditId').html(id);

                        $('#updateSliderModal').modal('show');
                        SliderUpdateDetails(id);

                    })




                    $('#SliderDataTable').DataTable({
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

    $('#addbtnSlider').click(function() {
        $('#addSliderModal').modal('show');
    });


    //Slider Add modal save button

    $('#SliderAddConfirmBtn').click(function() {


        var name = $('#SliderName').val();
        var des = $('#SliderDes').val();
        var img = $('#Sliderimg').prop('files')[0];




        ProductAdd(name, des, img);

    })




    $('#Sliderimg').change(function() {
        var reader = new FileReader();
        reader.readAsDataURL(this.files[0]);
        reader.onload = function(event) {
            var ImgSource = event.target.result;
            $('#addimagepreview').attr('src', ImgSource)
        }
    })

    //slider Add Method


    function ProductAdd(name, des, img) {



        if (name.length == 0) {

            toastr.error('Brnad name is empty!');

        } else if (des == 0) {

            toastr.error('Brnad description is empty!');
        } else {

            $('#SliderAddConfirmBtn').html(
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

            axios.post('/addslider', formData, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            }).then(function(response) {

                $('#SliderAddConfirmBtn').html("Save");

                if (response.status = 200) {
                    if (response.data == 1) {
                        $('#addSliderModal').modal('hide');
                        toastr.success('Add New Success .');
                        getSliderdata();
                    } else {
                        $('#addSliderModal').modal('hide');
                        toastr.error('Add New Failed');
                        getSliderdata();
                    }
                } else {
                    $('#addSliderModal').modal('hide');
                    toastr.error('Something Went Wrong');
                }


            }).catch(function(error) {

                $('#addSliderModal').modal('hide');
                toastr.error('Something Went Wrong');

            });

        }

    }



    //  slider delete modal yes button

    $('#confirmDeleteSlider').click(function() {
        var id = $('#SliderDeleteId').html();
        // var id = $(this).data('id');
        DeleteDataSlider(id);

    })


    //delete courses function

    function DeleteDataSlider(id) {
        $('#confirmDeleteSlider').html(
            "<div class='spinner-border spinner-border-sm text-primary' role='status'></div>"); //animation

        axios.post('/sliderdelete', {
                id: id
            })
            .then(function(response) {
                $('#confirmDeleteSlider').html("Yes");

                if (response.status == 200) {


                    if (response.data == 1) {
                        $('#deleteModalSlider').modal('hide');
                        toastr.error('Delete Success.');
                        getSliderdata();
                    } else {
                        $('#deleteModalSlider').modal('hide');
                        toastr.error('Delete Failed');
                        getSliderdata();
                    }

                } else {
                    $('#deleteModalSlider').modal('hide');
                    toastr.error('Something Went Wrong');
                }

            }).catch(function(error) {

                $('#deleteModalSlider').modal('hide');
                toastr.error('Something Went Wrong');

            });

    }


    //each courses  Details data show for edit

    function SliderUpdateDetails(id) {

        axios.post('/sliderdetails', {
                id: id
            })
            .then(function(response) {

                if (response.status == 200) {


                    $('#projectLoader').addClass('d-none');
                    $('#SliderEditForm').removeClass('d-none');
                    var jsonData = response.data;


                    $('#SliderNameIdUpdate').val(jsonData[0].title);
                    $('#SliderDesIdUpdate').val(jsonData[0].sub_title);
                    var ImgSource = (jsonData[0].image);
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


    $('#SliderimgUpdate').change(function() {
        var reader = new FileReader();
        reader.readAsDataURL(this.files[0]);
        reader.onload = function(event) {
            var ImgSource = event.target.result;
            $('#imagepreview').attr('src', ImgSource)
        }
    })






    //courses update modal save button

    $('#SliderupdateConfirmBtn').click(function() {


        var idUpdate = $('#SliderEditId').html();
        var nameUpdate = $('#SliderNameIdUpdate').val();
        var desUpdate = $('#SliderDesIdUpdate').val();
        var img = $('#SliderimgUpdate').prop('files')[0];


        SliderUpdate(idUpdate, nameUpdate, desUpdate, img);

    })





    //update project data using modal

    function SliderUpdate(idUpdate, nameUpdate, desUpdate, imgUpdate) {



        if (nameUpdate.length == 0) {

            toastr.error('Proejct name is empty!');

        } else if (desUpdate == 0) {

            toastr.error('Proejct description is empty!');

        } else {
            $('#SliderupdateConfirmBtn').html(
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


            axios.post('/sliderupdate', formData, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            }).then(function(response) {

                $('#SliderupdateConfirmBtn').html("Update");

                if (response.status = 200) {
                    if (response.data == 1) {
                        $('#updateSliderModal').modal('hide');
                        toastr.success('Update Success.');
                        getSliderdata();

                    } else {
                        $('#updateSliderModal').modal('hide');
                        toastr.error('Update Failed');
                        getSliderdata();

                    }
                } else {
                    $('#updateSliderModal').modal('hide');
                    toastr.error('Something Went Wrong');
                }


            }).catch(function(error) {

                $('#updateSliderModal').modal('hide');
                toastr.error('Something Went Wrong');

            });
        }
    }
</script>

@endsection
