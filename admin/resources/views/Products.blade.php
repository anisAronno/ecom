@extends('Layout.app')


@section('content')
    <div id="mainDivCourse" class="container-fluid d-none">
        <div class="row">
            <div class="col-md-12 p-3">
                <button id="addbtnproduct" class="btn btn-sm btn-primary my-3"><h6>Add New</h6></button>
                <table id="productDataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr style='text-align:center'>
                            <th class="th-sm"><h4>Title</h4></th>
                            <th class="th-sm"><h4>Description</h4></th>
                            <th class="th-sm"><h4>Price</h4></th>
                            <th class="th-sm"><h4>Offer</h4></th>
                            <th class="th-sm"><h4>Quantity</h4></th>
                            <th class="th-sm"><h4>Category</h4></th>
                            <th class="th-sm"><h4>Brand</h4></th>
                            <th class="th-sm"><h4>Image</th>
                            <th colspan="2" class="th-sm"><h4>Action</h4></th>

                        </tr>
                    </thead>
                    <tbody id="product_table">
                    </tbody>
                </table>

            </div>
        </div>
    </div>
    <div id="loadDivCourse" class="container">
        <div class="row">
            <div class="col-md-12 p-5 text-center">
                <img class="loding-icon m-5" src="{{ asset('loader.svg') }}" alt="">

            </div>
        </div>
    </div>
    <div id="wrongDivCourse" class="container d-none">
        <div class="row">
            <div class="col-md-12 p-5 text-center">
                <h3>Something Went Wrong!</h3>
            </div>
        </div>
    </div>

    <!-- course add -->
    <div class="modal fade" id="addProductModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Products</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body  text-center">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <input id="pdname" type="text" id="" class="form-control mb-3" placeholder="Product Name">
                                <textarea id="pddes" type="text" id="" class="form-control mb-3"
                                    placeholder="Product Description" cols="30" rows="10"></textarea>
                                <input id="pdprice" type="number" id="" class="form-control mb-3"
                                    placeholder="Product Price">
                                <input id="pdoffer" type="number" id="" class="form-control mb-3" placeholder="Offer Price">
                                <input id="pdquantity" type="number" id="" class="form-control mb-3"
                                    placeholder="Product Quantity">


                            </div>
                            <div class="col-md-6">
                                <input id="pdslug" type="text" id="" class="form-control mb-3" placeholder="Product slug">
                                <select id="pdfeature" style="margin-bottom: 10px;" class="browser-default custom-select">
                                    <option disabled selected>Select Product Feature</option>
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>

                                </select>
                                <select id="pdcategory" style="margin-bottom: 10px;" class="browser-default custom-select">


                                </select>
                                <select id="pdbrand" style="margin-bottom: 10px;" class="browser-default custom-select">


                                </select>

                                <select name="" id="pdstatus" class="form-control mb-3">
                                    <option value="1" selected>Publish</option>
                                    <option value="0">Pending</option>
                                </select>
                                <input type="file" name="pdimage" id="pdimage" class="form-control mb-3">
                                <img id="imginputshow" style="height: 100px !important;" class="imgPreview mt-3 "
                                    src="{{ asset('images/default-image.png') }}" />

                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Cancel</button>
                    <button id="productAddConfirmBtn" type="button" class="btn  btn-sm  btn-success">Save</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Course add -->




    <!-- Modal Delete -->
    <div class="modal fade" id="productModalCourse" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-body p-3 text-center">
                    <h5 class="mt-4">Do you want to Delete</h5>
                    <h5 id="productDeleteId" class="mt-4 d-none"></h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">No</button>
                    <button data-id="" id="confirmDeleteproduct" type="button" class="btn btn-sm btn-danger">Yes</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Delete -->



    <!-- Course update -->
    <div class="modal fade" id="updateProductModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Update Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body  text-center">
                    <div id="coursesEditForm" class="container d-none ">
                        <h5 id="productEditId" class="mt-4 d-none"></h5>
                        <div class="row">
                            <div class="col-md-6">
                                <input id="pdnameupdate" type="text" id="" class="form-control mb-3"
                                    placeholder="Product Name">
                                <textarea id="pddesupdate" type="text" id="" class="form-control mb-3"
                                    placeholder="Product Description" cols="30" rows="10"></textarea>
                                <input id="pdpriceupdate" type="number" id="" class="form-control mb-3"
                                    placeholder="Product Price">
                                <input id="pdofferupdate" type="number" id="" class="form-control mb-3"
                                    placeholder="Offer Price">
                                <input id="pdquantityupdate" type="number" id="" class="form-control mb-3"
                                    placeholder="Product Quantity">

                            </div>
                            <div class="col-md-6">
                                <input id="pdslugupdate" type="text" id="" class="form-control mb-3"
                                    placeholder="Product slug">
                                <select id="pdfeatureupdate" style="margin-bottom: 10px;"
                                    class="browser-default custom-select">
                                    <option disabled selected>Select Product Feature</option>
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>

                                </select>
                                <select id="pdcategoryupdate" style="margin-bottom: 10px;"
                                    class="browser-default custom-select">


                                </select>
                                <select id="pdbrandupdate" style="margin-bottom: 10px;"
                                    class="browser-default custom-select">


                                </select>

                                <select name="" id="pdstatusupdate" class="form-control mb-3">
                                    <option value="1" selected>Publish</option>
                                    <option value="0">Pending</option>
                                </select>

                                <input type="file" id="pdimageupdate" class="form-control mb-3">
                                <img id="imagepreviewproduct" style="height: 100px !important;" class="imgPreview mt-3 "
                                    src="" />

                            </div>
                        </div>
                    </div>
                    <img id="coursesLoader" class="loding-icon m-5" src="{{ asset('loader.svg') }}" alt="">
                    <h3 id="courseswrongLoader" class="d-none">Something Went Wrong!</h3>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Cancel</button>
                    <button id="ProductupdateConfirmBtn" type="button" class="btn  btn-sm  btn-danger">Update</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Course update -->

@endsection

@section('script')

    <script type="text/javascript">
        getCoursesdata();


        // for Courses table

        function getCoursesdata() {


            axios.get('/getproductsdata')
                .then(function(response) {

                    if (response.status = 200) {

                        $('#mainDivCourse').removeClass('d-none');
                        $('#loadDivCourse').addClass('d-none');

                        $('#productDataTable').DataTable().destroy();
                        $('#product_table').empty();
                        var dataJSON = response.data;
                        $.each(dataJSON, function(i, item) {
                            $('<tr>').html(

                                "<td style='text-align:center'>" + dataJSON[i].title + " </td>" +
                                "<td style='text-align:center'>" + dataJSON[i].description + " </td>" +
                                "<td style='text-align:center'>" + dataJSON[i].price + " </td>" +
                                "<td style='text-align:center'>" + dataJSON[i].offer + " </td>" +
                                "<td style='text-align:center'>" + dataJSON[i].quantity + " </td>" +
                                "<td style='text-align:center'>" + dataJSON[i].category_id + " </td>" +
                                "<td style='text-align:center'>" + dataJSON[i].brand_id + " </td>" +
                                "<td style='text-align:center'><img width='200px' height='80' class='table-img' src=" + dataJSON[i]
                                .images + "> </td>" +

                                "<td style='text-align:center'><a class='productEdit' data-id=" + dataJSON[i].id +
                                "><button class='btn btn-primary'><i class='fas fa-edit'></i></button></a> <a class='productDeleteIcon' data-id=" + dataJSON[i].id +
                                " > <button class='btn btn-danger'><i class='fas fa-trash-alt'></i></button></a> </td>"
                            ).appendTo('#product_table');
                        });

                        //courses click on delete icon

                        $(".productDeleteIcon").click(function() {

                            var id = $(this).data('id');
                            $('#productDeleteId').html(id);
                            $('#productModalCourse').modal('show');

                        })


                        //courses edit icon click

                        $(".productEdit").click(function() {

                            var id = $(this).data('id');
                            $('#productEditId').html(id);
                            $('#updateProductModal').modal('show');
                            ProductUpdateDetails(id);

                        })


                        $('#productDataTable').DataTable({
                            "order": false
                        });
                        $('.dataTables_length').addClass('bs-select');

                    } else {
                        $('#wrongDivCourse').removeClass('d-none');
                        $('#loadDivCourse').addClass('d-none');

                    }
                }).catch(function(error) {

                    $('#wrongDivCourse').removeClass('d-none');
                    $('#loadDivCourse').addClass('d-none');
                });


        }


        $('#addbtnproduct').click(function() {

            axios.get('/getcategory')
                .then(function(response) {
                    var dataJSON = response.data;

                    $('#pdcategory').empty();
                    $('#pdcategory').append(`<option disabled selected>Select Product Category</option>`);
                    $.each(dataJSON, function(i, item) {

                        $('#pdcategory').append(
                            `<option value="${dataJSON[i].id}"> ${dataJSON[i].category_name} </option>`
                            );

                    });

                }).catch(function(error) {

                    alert("There are no Category")

                });


            axios.get('/getbrand')
                .then(function(response) {
                    $('#pdbrand').empty();
                    var dataJSON = response.data;
                    $('#pdbrand').append(`<option disabled selected>Select Product Category</option>`);
                    $.each(dataJSON, function(i, item) {

                        $('#pdbrand').append(
                            `<option value="${dataJSON[i].id}"> ${dataJSON[i].brand_name} </option>`
                            );

                    });

                }).catch(function(error) {

                    alert("There are no Brand")

                });



            $('#addProductModal').modal('show');
        });

        //image show live for add product
        $('#pdimage').change(function() {
            var reader = new FileReader();
            reader.readAsDataURL(this.files[0]);
            reader.onload = function(event) {
                var ImgSource = event.target.result;
                $('#imginputshow').attr('src', ImgSource)
            }
        })


        // Material Select Initialization
        $(document).ready(function() {
            $('#pdstatus').material_select();
        });


        //Product Add modal save button

        //Products Add Method

        $('#productAddConfirmBtn').click(function() {



            var name = $('#pdname').val();
            var des = $('#pddes').val();
            var price = $('#pdprice').val();
            var offer = $('#pdoffer').val();
            var quantity = $('#pdquantity').val();
            var slug = $('#pdslug').val();
            var feature = $('#pdfeature').val();
            var cat_id = $('#pdcategory').val();
            var brand_id = $('#pdbrand').val();
            var status = $('#pdstatus').val();
            var img = $('#pdimage').prop('files')[0];




            if (name.length == 0) {

                toastr.error('Product name is empty!');

            } else if (des == 0) {

                toastr.error('Product description is empty!');

            } else if (price == 0) {

                toastr.error('Product price is empty!');

            } else if (quantity == 0) {

                toastr.error('Product quantity is empty!');

            } else if (slug == 0) {

                toastr.error('Product slug is empty!');

            } else if (feature == 0) {

                toastr.error('Product feature is empty!');

            } else if (cat_id == 0) {

                toastr.error('Product category is empty!');

            } else if (brand_id == 0) {

                toastr.error('Product brand is empty!');

            } else if (status == 0) {

                toastr.error('Product status is empty!');

            } else {

                $('#productAddConfirmBtn').html(
                    "<div class='spinner-border spinner-border-sm text-primary' role='status'></div>"); //animation

                products_data = [{
                        title: name,
                        description: des,
                        price: price,
                        offer: offer,
                        quantity: quantity,
                        slug: slug,
                        feature_product: feature,
                        cat_id: cat_id,
                        brand_id: brand_id,
                        status: status
                    }

                ];

                var formData = new FormData();
                formData.append('data', JSON.stringify(products_data));


                console.log(img);
                formData.append('image', img);



                axios.post('/addProducts', formData, {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        }
                    })
                    .then(function(response) {
                        console.log(response.data);
                        $('#productAddConfirmBtn').html("Save");

                        if (response.status = 200) {
                            if (response.data == 1) {
                                console.log(response.data);
                                $('#addProductModal').modal('hide');
                                toastr.success('Add New Success .');
                                getCoursesdata();
                            } else {
                                $('#addProductModal').modal('hide');
                                toastr.error('Add New Failed');
                                getCoursesdata();
                            }
                        } else {
                            $('#addProductModal').modal('hide');
                            toastr.error('Something Went Wrong');
                        }


                    }).catch(function(error) {

                        $('#addProductModal').modal('hide');
                        toastr.error('Something Went Wrong');

                    });

            }
        })





        //courses delete modal yes button
        $('#confirmDeleteproduct').click(function() {
            var id = $('#productDeleteId').html();
            // var id = $(this).data('id');
            DeleteDataProduct(id);

        })


        //delete product function

        function DeleteDataProduct(id) {
            $('#confirmDeleteproduct').html(
                "<div class='spinner-border spinner-border-sm text-primary' role='status'></div>"); //animation

            axios.post('/productdelete', {
                    id: id
                })
                .then(function(response) {
                    $('#confirmDeleteproduct').html("Yes");

                    if (response.status == 200) {


                        if (response.data == 1) {
                            $('#productModalCourse').modal('hide');
                            toastr.success('Delete Success.');
                            getCoursesdata();
                        } else {
                            $('#productModalCourse').modal('hide');
                            toastr.error('Delete Failed');
                            getCoursesdata();
                        }

                    } else {
                        $('#productModalCourse').modal('hide');
                        toastr.error('Something Went Wrong');
                    }

                }).catch(function(error) {

                    $('#productModalCourse').modal('hide');
                    toastr.error('Something Went Wrong');

                });

        }




        // Material Select Initialization
        $(document).ready(function() {
            $('#pdstatusupdate').material_select();
        });
        //each courses  Details data show for edit


        function ProductUpdateDetails(id) {


            axios.post('/productdetails', {
                    id: id
                })
                .then(function(response) {

                    if (response.status == 200) {


                        $('#coursesLoader').addClass('d-none');
                        $('#coursesEditForm').removeClass('d-none');


                        var jsonData = response.data;
                        console.log(jsonData);
                        $('#pdnameupdate').val(jsonData[0].title);
                        $('#pddesupdate').val(jsonData[0].description);
                        $('#pdpriceupdate').val(jsonData[0].price);
                        $('#pdofferupdate').val(jsonData[0].offer);
                        $('#pdquantityupdate').val(jsonData[0].quantity);
                        $('#pdslugupdate').val(jsonData[0].slug);
                        $('#pdfeatureupdate').val(jsonData[0].feature_product);


                        var brand_id = jsonData[0].brand_id;
                        var cat_id = jsonData[0].category_id;
                        getBrandName(brand_id);
                        getcategoryName(cat_id);
                        $('#pdstatusupdate').val(jsonData[0].status);
                        var ImgSource = (jsonData[0].images);
                        $('#imagepreviewproduct').attr('src', ImgSource)



                    } else {

                        $('#coursesLoader').addClass('d-none');
                        $('#courseswrongLoader').removeClass('d-none');
                    }

                }).catch(function(error) {

                    $('#coursesLoader').addClass('d-none');
                    $('#courseswrongLoader').removeClass('d-none');

                });

        }

        //image show live
        $('#pdimageupdate').change(function() {
            var reader = new FileReader();
            reader.readAsDataURL(this.files[0]);
            reader.onload = function(event) {
                var ImgSource = event.target.result;
                $('#imagepreviewproduct').attr('src', ImgSource)
            }
        })


        //get brandname
        function getBrandName(brand_id) {
            console.log(brand_id);
            axios.get('/getbrand')
                .then(function(response) {
                    var dataJSON = response.data;
                    $('#pdbrandupdate').empty();
                    $.each(dataJSON, function(i, item) {
                        if (brand_id == dataJSON[i].id) {
                            $('#pdbrandupdate').append(
                                `<option  selected value="${dataJSON[i].id}"> ${dataJSON[i].brand_name} </option>`
                                );
                        } else {
                            $('#pdbrandupdate').append(
                                `<option value="${dataJSON[i].id}"> ${dataJSON[i].brand_name} </option>`);
                        }


                    });

                }).catch(function(error) {

                    alert("There are no Category")

                });
        }

        //getcategoryname
        function getcategoryName(cat_id) {
            axios.get('/getcategory')
                .then(function(response) {
                    var dataJSON = response.data;
                    $('#pdcategoryupdate').empty();
                    $.each(dataJSON, function(i, item) {
                        if (cat_id == dataJSON[i].id) {
                            $('#pdcategoryupdate').append(
                                `<option  selected value="${dataJSON[i].id}"> ${dataJSON[i].category_name} </option>`
                                );
                        } else {
                            $('#pdcategoryupdate').append(
                                `<option value="${dataJSON[i].id}"> ${dataJSON[i].category_name} </option>`);
                        }
                    });

                }).catch(function(error) {

                    alert("There are no Category")

                });
        }






        //courses update modal save button
        //update service data axios

        $('#ProductupdateConfirmBtn').click(function() {

            var product_id = $('#productEditId').html();
            var nameupdate = $('#pdnameupdate').val();
            var desupdate = $('#pddesupdate').val();
            var priceupdate = $('#pdpriceupdate').val();
            var offerupdate = $('#pdofferupdate').val();
            var quantityupdate = $('#pdquantityupdate').val();
            var slugupdate = $('#pdslugupdate').val();
            var featureupdate = $('#pdfeatureupdate').val();
            var cat_idupdate = $('#pdcategoryupdate').val();
            var brand_idupdate = $('#pdbrandupdate').val();
            var statusupdate = $('#pdstatusupdate').val();
            var imgupdate = $('#pdimageupdate').prop('files')[0];




            if (nameupdate.length == 0) {

                toastr.error('Product name is empty!');

            } else if (desupdate == 0) {

                toastr.error('Product description is empty!');

            } else if (priceupdate == 0) {

                toastr.error('Product price is empty!');

            } else if (quantityupdate == 0) {

                toastr.error('Product quantity is empty!');

            } else if (slugupdate == 0) {

                toastr.error('Product slug is empty!');

            } else if (featureupdate == 0) {

                toastr.error('Product feature is empty!');

            } else if (cat_idupdate == 0) {

                toastr.error('Product category is empty!');

            } else if (brand_idupdate == 0) {

                toastr.error('Product brand is empty!');

            } else if (statusupdate == 0) {

                toastr.error('Product status is empty!');

            } else {

                $('#ProductupdateConfirmBtn').html(
                    "<div class='spinner-border spinner-border-sm text-primary' role='status'></div>"); //animation

                products_update_data = [{
                        id: product_id,
                        title: nameupdate,
                        description: desupdate,
                        price: priceupdate,
                        offer: offerupdate,
                        quantity: quantityupdate,
                        slug: slugupdate,
                        feature_product: featureupdate,
                        cat_id: cat_idupdate,
                        brand_id: brand_idupdate,
                        status: statusupdate
                    }

                ];

                var formData = new FormData();
                formData.append('data', JSON.stringify(products_update_data));


                console.log(imgupdate);
                formData.append('image', imgupdate);



                axios.post('/productupdate', formData, {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        }
                    })
                    .then(function(response) {

                        $('#ProductupdateConfirmBtn').html("Save");

                        if (response.status = 200) {
                            if (response.data == 1) {
                                console.log(response.data);
                                $('#updateProductModal').modal('hide');
                                toastr.success('Add New Success .');
                                getCoursesdata();
                            } else {
                                $('#updateProductModal').modal('hide');
                                toastr.error('Add New Failed');
                                getCoursesdata();
                            }
                        } else {
                            $('#updateProductModal').modal('hide');
                            toastr.error('Something Went Wrong');
                        }


                    }).catch(function(error) {

                        $('#updateProductModal').modal('hide');
                        toastr.error('Something Went Wrong');

                    });

            }




        })

    </script>

@endsection
