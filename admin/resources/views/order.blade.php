@extends('Layout.app')


@section('content')
   <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>DataTables</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"> Customers Order Table</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table  class="table table-bordered table-striped">
                  <thead>
                  <tr style="text-align: center;">
                    <th><h5>SL No</h5></th>
                    <th><h5>Customer Name</h5></th>
                    <th>Contact Number</th>
                    <th>Total taka</th>
                    <th>Order Status</th>
                    <th>Details</th>
                  </tr>
                  </thead>
                  <tbody id="dataRender">

                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>

<div class="modal fade" id="oderModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <input type="hidden" id="orderidvalue">
        <table class="table table-border">
            <thead>
                <tr style="text-align: center;">
                  <th> <h5><h4>SL No</h4></h5></th>
                  <th> <h5><h4>Order ID</h4></h5></th>
                  <th> <h4>Customer Name</h4></th>
                  <th> <h4>Contact Numbe</h4>r</th>
                  <th> <h4>Product Name</h4></th>
                  <th> h4>Product Amount</h4></th>
                  <th> <h4>Unit Price</h4></th>
                  <th> <h4>Total Price</h4></th>
                </tr>
                </thead>
                <tbody id="result">

                 </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="button" onclick="shippingConf();" class="btn btn-primary">Confirm For Shipping</button>
      </div>
    </div>
  </div>
</div>
    @endsection
    @section('script')

    <script type="text/javascript">


       $(function(){OrderSuccess();});

       function OrderSuccess() {

            axios.get("{{route('orderSuccess')}}")
            .then(function(response) {

                console.log(response.data);

                var datas=response.data;

                if (response.status == 200) {



                    var html="";
                    for (let i = 0; i < datas.length; i++) {
                        const element = datas[i];
                        var status="";

                            if(element.status == 0){
                                status="<button class='btn btn-danger'>pending </button>";
                            }else if (element.status == 1) {
                                status="<button class='btn btn-primary'>On Prosess</button>";
                            }else if (element.status == 2) {
                                status="<button class='btn btn-success'>Completed </button>";
                            }

                        html+='<tr>';
                        html+='<td class="text-center">'+i+'</td>';
                        html+='<td class="text-center">'+element.customer_name+'</td>';
                        html+='<td class="text-center">'+element.contact_no+'</td>';
                        html+='<td class="text-center">'+element.total+'</td>';
                        html+='<td class="text-center">'+status+'</td>';
                        html+='<td class="text-center"><button onclick="loadOrder('+element.id+');" class="btn btn-primary"><i class="fas fa-eye"></i></button></td>';
                        html+='</tr>';

                    }

                    $('#dataRender').html(html);
                    $('table').DataTable();



                } else {

                    toastr.error('Something Went Wrong');
                }

            }).catch(function(error) {

                console.log(error);

            });
            }




       function loadOrder(id) {

           $('#oderModal').modal('show');
           $('#orderidvalue').val(id);
           axios.post('/order_details/', {
                id: id
            })
            .then(function(response) {

                console.log(response.data);

                var datas=response.data;

                if (response.status == 200) {


                    var html="";
                    for (let i = 0; i < datas.length; i++) {
                        const element = datas[i];

                        html+='<tr>';
                        html+='<td>'+i+'</td>';
                        html+='<td>'+element.order_id+'</td>';
                        html+='<td>'+element.customer_name+'</td>';
                        html+='<td>'+element.contact_no+'</td>';
                        html+='<td>'+element.product_name+'</td>';
                        html+='<td>'+element.product_amount+'</td>';
                        html+='<td>'+element.unit_price+'</td>';
                        html+='<td>'+element.total_price+'</td>';
                        html+='</tr>';

                    }

                    $('#result').html(html);



                } else {

                    toastr.error('Something Went Wrong');
                }

            }).catch(function(error) {

               console.log(error);

            });
       }

    function shippingConf(id){

        var orderIdForShipping=$('#orderidvalue').val();


        axios.post("{{route('shippingConfirm')}}", {
                id: orderIdForShipping
            })
            .then(function(response) {

                console.log(response.data);

                var datas=response.data;

                if (response.status == 200) {


                    $('#oderModal').modal('hide');
                    OrderSuccess();

                } else {

                    toastr.error('Something Went Wrong');
                }

            }).catch(function(error) {

               console.log(error);

            });
       }

    </script>

@endsection
