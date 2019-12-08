        <!-- Modal Edit -->
        <div class="modal fade" id="edit{{$payment->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered" role="document">
	    <div class="modal-content">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Payment</h3>
            </div>
            <form method="POST" action="{{route('payment.update', $payment->id)}}" class="form-horizontal" enctype="multipart/form-data">
            {{ csrf_field() }}
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Full Name</label>
                  <div class="col-sm-10">
                    <input type="upstudent_fullname" class="form-control" id="upstudent_fullname" value="{{$payment->student}}" name="upstudent_fullname" required="">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Offer</label>

                  <div class="col-sm-10">
                    <input type="upoffer" class="form-control" id="upoffer" value="{{$payment->offer}}" name="upoffer" required="">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Amount</label>

                  <div class="col-sm-10">
                    <input type="upamount" class="form-control" value="{{$payment->amount}}" name="upamount" >
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-info pull-left">Add</button>
                </form>
                <a href="{{route('home.payment')}}" class="btn btn-default pull-right">Cancel</a>
              </div>
              <!-- /.box-footer -->
          </div>
          <!-- /.box -->
	    </div>
	  </div>
	</div>
	<!-- End Modal Edit -->