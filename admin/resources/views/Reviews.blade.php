@extends('Layout.app')


@section('content')
<div id="mainDivReview" class="container-fluid d-none ">
    <div class="row">
        <div class="col-md-12 p-5">


            <button id="addbtnReview" class="btn btn-sm btn-danger my-3">Add New</button>

            <table id="revieweDataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th class="th-sm">Image</th>
                        <th class="th-sm">Name</th>
                        <th class="th-sm">Description</th>
                        <th class="th-sm">Edit</th>
                        <th class="th-sm">Delete</th>
                    </tr>
                </thead>
                <tbody id="review_table">


                </tbody>
            </table>

        </div>
    </div>
</div>

<div id="loadDivReview" class="container">
    <div class="row">
        <div class="col-md-12 p-5 text-center">
            <img class="loding-icon m-5" src="{{ asset('loader.svg') }}" alt="">

        </div>
    </div>
</div>
<div id="wrongDivReview" class="container d-none">
    <div class="row">
        <div class="col-md-12 p-5 text-center">
            <h3>Something Went Wrong!</h3>
        </div>
    </div>
</div>

 <!-- Modal add new Review -->
 <div class="modal fade" id="addModalReview" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
 aria-hidden="true">
 <div class="modal-dialog" role="document">
     <div class="modal-content">

         <div class="modal-body p-5 text-center">
             <h5 class="mb-4">ADD New Review</h5>

             <div id="ReviewAddForm" class="w-100">

                 <input type="text" id="reviewnameadd" class="form-control mb-4" placeholder="Review Name">
                 <input type="text" id="reviewdesadd" class="form-control mb-4" placeholder="Review Description">
                 <input type="text" id="reviewimgadd" class="form-control mb-4" placeholder="Review Link">
             </div>
         </div>
         <div class="modal-footer">
             <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Cancel</button>
             <button id="addReviewBtn" type="button" class="btn btn-sm btn-danger">Save</button>
         </div>
     </div>
 </div>
</div>

<!-- Modal add new -->

 <!-- Modal Delete -->
 <div class="modal fade" id="deleteModalReview" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
 aria-hidden="true">
 <div class="modal-dialog" role="document">
     <div class="modal-content">

         <div class="modal-body p-3 text-center">
             <h5 class="mt-4">Do you want to Delete</h5>
             <h5 id="reviewDeleteId" class="mt-4 "></h5>
         </div>
         <div class="modal-footer">
             <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">No</button>
             <button data-id="" id="confirmDeleteReview" type="button" class="btn btn-sm btn-danger">Yes</button>
         </div>
     </div>
 </div>
</div>
<!-- Modal Delete -->


 <!--Review Modal update -->
 <div class="modal fade" id="editModalReview" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
 aria-hidden="true">
 <div class="modal-dialog" role="document">
     <div class="modal-content">

         <div class="modal-body p-5 text-center">
             <h5>Edit your Review Details</h5>

             <div id="reviewEditForm" class="d-none w-100">
                 <h5 id="reviewEditId" class="mt-4 "></h5>
                 <input type="text" id="reviewname" class="form-control mb-4" placeholder="Review Name">
                 <textarea id="reviewdes" class="form-control mb-4" rows="4" cols="50">
                 </textarea>
                 {{-- <input type="text" id="reviewdes" class="form-control mb-4" placeholder="Review Description"> --}}
                 <input type="text" id="reviewimg" class="form-control mb-4" placeholder="Review Image Link">
             </div>

             <img id="reviewLoader" class="loding-icon m-5" src="{{ asset('loader.svg') }}" alt="">


             <h3 id="wrongLoaderreview" class="d-none">Something Went Wrong!</h3>

         </div>
         <div class="modal-footer">
             <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Cancel</button>
             <button id="confirmUpdateReview" type="button" class="btn btn-sm btn-danger">Update</button>
         </div>
     </div>
 </div>
</div>
<!--Review Modal update -->


@endsection


@section('script')

    <script type="text/javascript">

        getReviewdata(); //when page will load this method also will run





// for Review table

function getReviewdata() {


axios.get('/getReviewtdata')
    .then(function (response) {

        if (response.status = 200) {

            $('#mainDivReview').removeClass('d-none');
            $('#loadDivReview').addClass('d-none');


            $('#revieweDataTable').DataTable().destroy();
            $('#review_table').empty();


            var dataJSON = response.data;
            $.each(dataJSON, function (i, item) {
                $('<tr>').html(

                    "<td><img width='200px' height='80' class='table-img' src=" + dataJSON[i].img + "> </td>" +
                    "<td>" + dataJSON[i].name + " </td>" +
                    "<td>" + dataJSON[i].des + " </td>" +
                    "<td><a class='editDataReview' data-id=" + dataJSON[i].id +
                    "><i class='fas fa-edit'></i></a> </td>" +
                    "<td><a class='delDataReview' data-id=" + dataJSON[i].id +
                    " ><i class='fas fa-trash-alt'></i></a> </td>"
                ).appendTo('#review_table');
            });



            //Review table delete icon click
            $(".delDataReview").click(function () {

                var id = $(this).data('id');
                $('#reviewDeleteId').html(id);
                $('#deleteModalReview').modal('show');

            })



            //edit data using modal for Review

            $(".editDataReview").click(function () {

                var id = $(this).data('id');
                reviewUpdateDetails(id);
                $('#reviewEditId').html(id);
                $('#editModalReview').modal('show');

            })




            $('#revieweDataTable').DataTable({ "order": false });
            $('.dataTables_length').addClass('bs-select');


        } else {
            $('#wrongDivReview').removeClass('d-none');
            $('#loadDivReview').addClass('d-none');

        }


    }).catch(function (error) {

        $('#wrongDivReview').removeClass('d-none');
        $('#loadDivReview').addClass('d-none');

    });


}



//Add New Review all are here
//Review add new button click


$('#addbtnReview').click(function () {

$('#addModalReview').modal('show');
})


//Review  modal save button

$('#addReviewBtn').click(function () {



var name = $('#reviewnameadd').val();
var des = $('#reviewdesadd').val();
var img = $('#reviewimgadd').val();


reviewadd(name, des, img);

})






//Review Add Method


function reviewadd(name, des, img) {



if (name.length == 0) {

    toastr.error('Review name is empty!');

} else if (des == 0) {

    toastr.error('Review description is empty!');

} else if (img == 0) {

    toastr.error('Review image is empty!');

} else {
    $('#addReviewBtn').html(
        "<div class='spinner-border spinner-border-sm text-primary' role='status'></div>"); //animation


    axios.post('/addReview', {
        name: name,
        des: des,
        img: img

    })
        .then(function (response) {

            $('#addReviewBtn').html("Save");

            if (response.status = 200) {
                if (response.data == 1) {
                    $('#addModalReview').modal('hide');
                    toastr.success('Add New Success .');
                    getReviewdata();
                } else {
                    $('#addModalReview').modal('hide');
                    toastr.error('Add New Failed');
                    getReviewdata();
                }
            } else {
                $('#addModalReview').modal('hide');
                toastr.error('Something Went Wrong');
            }


        }).catch(function (error) {

            $('#addModalReview').modal('hide');
            toastr.error('Something Went Wrong');

        });

}

}


//Review delete modal yes button

$('#confirmDeleteReview').click(function () {
var id = $('#reviewDeleteId').html();
// var id = $(this).data('id');
DeleteDataReview(id);

})


//Review delete data function

function DeleteDataReview(id) {
$('#confirmDeleteReview').html(
    "<div class='spinner-border spinner-border-sm text-primary' role='status'></div>"); //animation

axios.post('/Reviewtdelete', {
    id: id
})
    .then(function (response) {
        $('#confirmDeleteReview').html("Yes");

        if (response.status == 200) {


            if (response.data == 1) {
                $('#deleteModalReview').modal('hide');
                toastr.success('Delete Success.');
                getReviewdata();
            } else {
                $('#deleteModalReview').modal('hide');
                toastr.error('Delete Failed');
                getReviewdata();
            }

        } else {
            $('#deleteModalReview').modal('hide');
            toastr.error('Something Went Wrong');
        }

    }).catch(function (error) {

        $('#deleteModalReview').modal('hide');
        toastr.error('Something Went Wrong');

    });

}




//each Review  Details data axios

function  reviewUpdateDetails(id) {


axios.post('/Reviewtdetails', {
        id: id
    })
    .then(function(response) {

        if (response.status == 200) {


            $('#reviewLoader').addClass('d-none');
            $('#reviewEditForm').removeClass('d-none');



            var jsonData = response.data;
            $('#reviewname').val(jsonData[0].name);
            $('#reviewdes').val(jsonData[0].des);
            $('#reviewimg').val(jsonData[0].img);
        } else {

            $('#reviewLoader').addClass('d-none');
            $('#wrongLoaderreview').removeClass('d-none');
        }

    }).catch(function(error) {

        $('#reviewLoader').addClass('d-none');
        $('#wrongLoaderreview').removeClass('d-none');

    });

}




//Revview update modal save button

$('#confirmUpdateReview').click(function() {


var id = $('#reviewEditId').html();
var name = $('#reviewname').val();
var des = $('#reviewdes').val();
var img = $('#reviewimg').val();


reviewUpdate(id, name, des, img);

})





//Revview service data axios

function  reviewUpdate(updateid, updatename, updatedes, updateimg) {



if (updatename.length == 0) {

    toastr.error('service name is empty!');

} else if (updatedes == 0) {

    toastr.error('service description is empty!');

} else if (updateimg == 0) {

    toastr.error('service image is empty!');

} else {
    $('#confirmUpdateReview').html(
        "<div class='spinner-border spinner-border-sm text-primary' role='status'></div>"); //animation

        axios.post('/Reviewtupdate', {
            id: updateid,
            name: updatename,
            des: updatedes,
            img: updateimg

        })
        .then(function(response) {

            $('#confirmUpdateReview').html("Update");

            if (response.status = 200) {
                if (response.data == 1) {
                    $('#editModalReview').modal('hide');
                    toastr.success('Update Success.');
                    getReviewdata();
                } else {
                    $('#editModalReview').modal('hide');
                    toastr.error('Update Failed');
                    getReviewdata();
                }
            } else {
                $('#editModalReview').modal('hide');
                toastr.error('Something Went Wrong');
            }


        }).catch(function(error) {

            $('#editModalReview').modal('hide');
            toastr.error('Something Went Wrong');

        });

}


}



    </script>
@endsection
