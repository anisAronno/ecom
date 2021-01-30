@extends('Layout.app')
@section('title', 'Photo Gallery')
@section('content')

    <div class="container-fluid m-0 ">
        <div class="row">
            <div class="col-md-12">
                <button data-toggle="modal" data-target="#PhotoModal" id="addNewPhotoBtnId"
                    class="btn my-3 btn-sm btn-danger">Add New </button>
            </div>
        </div>
        <div id="photogallery" class="row photoRow">

        </div>
    </div>



    <!-- Modal -->
    <div class="modal fade" id="PhotoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Photo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <input class="form-control" id="imgInput" type="file">
                    <img class="imgPreview mt-3 " id="imgPreview" src="{{ asset('images/default-image.png') }}">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>
                    <button id="SavePhoto" type="button" class="btn btn-sm btn-success">Save</button>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('script')
    <script type="text/javascript">
        LoadPhoto();


        $('#imgInput').change(function() {
            var reader = new FileReader();
            reader.readAsDataURL(this.files[0]);
            reader.onload = function(event) {
                var ImgSource = event.target.result;
                console.log(ImgSource);
                $('#imgPreview').attr('src', ImgSource)
            }
        })

        $('#SavePhoto').on('click', function() {
            $('#SavePhoto').html("<div class='spinner-border spinner-border-sm' role='status'></div>")
            var PhotoFile = $('#imgInput').prop('files')[0];
            var formData = new FormData();
            formData.append('photo', PhotoFile);


            axios.post("/imageup", formData).then(function(response) {

                if (response.status == 200 && response.data == 1) {

                    $('#PhotoModal').modal('hide');
                    $('#SavePhoto').html('Save');
                    LoadPhoto();
                    toastr.success('Photo Upload Success');
                } else {
                    $('#PhotoModal').modal('hide');
                    toastr.error('Photo Upload Fail!');
                }
            }).catch(function(error) {
                $('#PhotoModal').modal('hide');
                toastr.error('Photo Upload Fail!!!');
                $('#SavePhoto').html('Save');
            })

        });



        function LoadPhoto() {
            axios.get('/PhotoJSON').then(function(response) {
                $('#photogallery').empty();
                $.each(response.data, function(i, item) {
                    $("<div class='col-md-3 p-1'>").html(
                        "<img class='imgOnRow' src=" + item['location'] + ">"
                    ).appendTo('.photoRow');
                });

            }).catch(function(error) {

            })
        }

    </script>
@endsection
