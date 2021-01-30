@extends('Layout.app')
@section('title', 'Home Setting')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 offset-md-1 mt-5" >


<table class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th class="th-sm">Name</th>
                        <th class="th-sm">Input URL</th>
                        <th class="th-sm">Action</th>
                    </tr>
                </thead>
                <tbody>
                       
                        <tr>
                            <td>
                                <div class="form-group mb-2">
                                    <h3>Facebook:</h3>
                                </div>
                            </td>
                            <td>
                                <div class="form-group mx-sm-3 mb-2">
                                    <label for="facebook" class="sr-only">facebook</label>
                                    <input  id="addfacebook" required type="text" class="form-control " id="facebook" value="<?php if ($results) {echo $results->facebook;}?>">

                                </div>
                              </td>
                            <td>
                            <button id="submitFB" type="submit" class="btn btn-primary mb-2">Update</button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                            <div class="form-group mb-2">
                                <h3>Twitter:</h3>
                            </div>
                            </td>
                            <td>
                                <div class="form-group mx-sm-3 mb-2">
                                    <label for="facebook" class="sr-only">Twitter: </label>
                                    <input  id="addTwitter" required type="text" class="form-control " id="facebook" value="<?php if ($results) {echo $results->twitter;}?>">

                                </div>
                              </td>
                            <td>
                            <button id="submitTwitter" type="submit" class="btn btn-primary mb-2">Update</button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                            <div class="form-group mb-2">
                                <h3>Youtube:</h3>
                            </div>
                            </td>
                            <td>
                            <div class="form-group mx-sm-3 mb-2">
                                <label for="facebook" class="sr-only">Youtube: </label>
                                <input  id="addYoutube" required type="text" class="form-control " id="facebook" value="<?php if ($results) {echo $results->youtube;}?>">

                            </div>


                              </td>
                            <td>
                            <button id="submitYoutube" type="submit" class="btn btn-primary mb-2">Update</button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                            <div class="form-group mb-2">
                                <h3>Instagram:</h3>
                            </div>
                            </td>
                            <td>
                            <div class="form-group mx-sm-3 mb-2">
                                <label for="facebook" class="sr-only">Instagram: </label>
                                <input  id="addInstagram" required type="text" class="form-control " id="facebook" value="<?php if ($results) {echo $results->instragram;}?>">

                            </div>


                              </td>
                            <td>
                            <button id="submitInstagram" type="submit" class="btn btn-primary mb-2">Update</button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                            <div class="form-group mb-2">
                                <h3>Google:</h3>
                            </div>
                            </td>
                            <td>
                            <div class="form-group mx-sm-3 mb-2">
                                <label for="facebook" class="sr-only">Google Plus: </label>
                                <input  id="addGoogle" required type="text" class="form-control " id="facebook" value="<?php if ($results) {echo $results->google;}?>">

                            </div>
                              </td>
                            <td>
                            <button id="submitGoogle" type="submit" class="btn btn-primary mb-2">Update</button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                            <div class="form-group mb-2">
                                <h3>Link In:</h3>
                            </div>
                            </td>
                            <td>
                            <div class="form-group mx-sm-3 mb-2">
                                <label for="facebook" class="sr-only">Google Plus: </label>
                                <input  id="addLinkin" required type="text" class="form-control " id="facebook" value="<?php if ($results) {echo $results->linkin;}?>">

                            </div>
                              </td>
                            <td>
                            <button id="submitLinkin" type="submit" class="btn btn-primary mb-2">Update</button>
                            </td>
                        </tr>

                </tbody>
            </table>





            </div>
    </div>
</div>








@endsection

@section('script')
<script>

//Facebook Add

$('#submitFB').click(function () {
var facebook = $('#addfacebook').val();
addFacebook(facebook);
})

function addFacebook(facebook) {
if (facebook.length == 0) {
    toastr.error('Facebook url is empty!');

}  else {
    $('#submitFB').html(
        "<div class='spinner-border spinner-border-sm text-primary' role='status'></div>"); //animation
    axios.post('/facebook', {
        facebook: facebook
    })
        .then(function (response) {
            $('#submitFB').html("Update");
            if (response.status = 200) {
                if (response.data == 1) {
                    toastr.success('Updated Success .');


                } else {
                    toastr.error('Updated Failed');
                }
            } else {
                toastr.error('Something Went Wrong');
            }
        }).catch(function (error) {
            toastr.error('Something Went Wrong');
        });
    }
}










// Twitter Add


$('#submitTwitter').click(function () {
var twitter = $('#addTwitter').val();
addTwitter(twitter);
})

function addTwitter(twitter) {
if (twitter.length == 0) {
    toastr.error('Twitter url is empty!');

}  else {
    $('#submitTwitter').html(
        "<div class='spinner-border spinner-border-sm text-primary' role='status'></div>"); //animation
    axios.post('/twitter', {
        twitter: twitter
    })
        .then(function (response) {
            $('#submitTwitter').html("Update");
            if (response.status = 200) {
                if (response.data == 1) {
                    toastr.success('Updated Success .');


                } else {
                    toastr.error('Updated Failed');
                }
            } else {
                toastr.error('Something Went Wrong');
            }
        }).catch(function (error) {
            toastr.error('Something Went Wrong');
        });
    }
}








// Youtube Add


$('#submitYoutube').click(function () {
var youtube = $('#addYoutube').val();
addYoutube(youtube);
})

function addYoutube(youtube) {
if (youtube.length == 0) {
    toastr.error('Youtube url is empty!');

}  else {
    $('#submitYoutube').html(
        "<div class='spinner-border spinner-border-sm text-primary' role='status'></div>"); //animation
    axios.post('/youtube', {
        youtube: youtube
    })
        .then(function (response) {
            $('#submitYoutube').html("Update");
            if (response.status = 200) {
                if (response.data == 1) {
                    toastr.success('Updated Success .');


                } else {
                    toastr.error('Updated Failed');
                }
            } else {
                toastr.error('Something Went Wrong');
            }
        }).catch(function (error) {
            toastr.error('Something Went Wrong');
        });
    }
}




// Youtube Add


$('#submitInstagram').click(function () {
var instragram = $('#addInstagram').val();
addInstagram(instragram);
})

function addInstagram(instragram) {
if (instragram.length == 0) {
    toastr.error('Instagram url is empty!');

}  else {
    $('#submitInstagram').html(
        "<div class='spinner-border spinner-border-sm text-primary' role='status'></div>"); //animation
    axios.post('/instragram', {
        instragram: instragram
    })
        .then(function (response) {
            $('#submitInstagram').html("Update");
            if (response.status = 200) {
                if (response.data == 1) {
                    toastr.success('Updated Success .');


                } else {
                    toastr.error('Updated Failed');
                }
            } else {
                toastr.error('Something Went Wrong');
            }
        }).catch(function (error) {
            toastr.error('Something Went Wrong');
        });
    }
}





// Link In Add


$('#submitLinkin').click(function () {
var linkin = $('#addLinkin').val();
addLinkin(linkin);
})

function addLinkin(linkin) {
if (linkin.length == 0) {
    toastr.error('Link In url is empty!');

}  else {
    $('#submitLinkin').html(
        "<div class='spinner-border spinner-border-sm text-primary' role='status'></div>"); //animation
    axios.post('/linkin', {
        linkin: linkin
    })
        .then(function (response) {
            $('#submitLinkin').html("Update");
            if (response.status = 200) {
                if (response.data == 1) {
                    toastr.success('Updated Success .');


                } else {
                    toastr.error('Updated Failed');
                }
            } else {
                toastr.error('Something Went Wrong');
            }
        }).catch(function (error) {
            toastr.error('Something Went Wrong');
        });
    }
}




// Google Plus Add


$('#submitGoogle').click(function () {
var google = $('#addGoogle').val();
addGoogle(google);
})

function addGoogle(google) {
if (google.length == 0) {
    toastr.error('Google url is empty!');

}  else {
    $('#submitGoogle').html(
        "<div class='spinner-border spinner-border-sm text-primary' role='status'></div>"); //animation
    axios.post('/google', {
        google: google
    })
        .then(function (response) {
            $('#submitGoogle').html("Update");
            if (response.status = 200) {
                if (response.data == 1) {
                    toastr.success('Updated Success .');


                } else {
                    toastr.error('Updated Failed');
                }
            } else {
                toastr.error('Something Went Wrong');
            }
        }).catch(function (error) {
            toastr.error('Something Went Wrong');
        });
    }
}






</script>
@endsection