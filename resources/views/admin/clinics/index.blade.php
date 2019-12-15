@if(is_permited('clinics','view') == 1 )
  @extends('admin.shared.master')
  @section('content')
  <!-- TABLE: LATEST ORDERS -->
    <div class="box box-info">
    <!-- /.box-body -->
    <div class="modal-content">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Add {{ $buttonsRoutsname }} ( اضافة عيادة )</h3>
            </div>

            <form method="POST" action="{{route($buttonsRoutsname.'.store')}}" id="insertForm" class="form-horizontal" enctype="multipart/form-data">
                {{ csrf_field() }}
                @include('admin.'.$buttonsRoutsname.'.components.formComponent')
                <!-- /.box-footer -->
            </form>
        </div>
        <!-- /.box -->
    </div>
      <!-- /.box-header -->

      <!-- /.box-footer -->
      <div class="box-body"><div class="col-md-12">
              @if( is_permited('patient','print') == 1 )
                  <form action="{{ route('patients.print') }}" method="post" style="display: inline;">
                      {{ csrf_field() }}
                      @foreach($rows as $key => $value)
                          <input name="{{$key}}" value="{{$value->id}}" style="display: none;"/>
                      @endforeach
                      <button class="btn btn-sm btn-primary btn-flat pull-right"><i class="fa fa-print"></i> Print (طباعة) </button>
                  </form>
              @endif
          </div>

        <!-- include table response -->
        <!-- filteration model -->
        @if( is_permited('patient','search') == 1 )
          @include("admin.".$buttonsRoutsname.".components.filterComponent",$filterData)
        @endif
        <!-- filteration model -->
        <!-- /.table-responsive -->
        <div class="row" style="margin-top: 20px">
          <div class="col-md-12">
            <div class="table-responsive">
            @if($rows->count() > 0)
              @php
              $ths = ['Clinic Name ( اسم العيادة )' ,'Clinic Services ( خدمات العيادة )' , 'Clinic Doctor ( طبيب العيادة )','Options ( الخيارات )'];
              $tds = $rows;
              $tdOnly = ['c_name','c_services','c_doctor'];
              @endphp
              @php
              $Otipnsinputs  = [
                is_permited('patient','edit') == 1 ? 'admin.shared.buttons.edit' : '',
                is_permited('patient','delete') == 1 ? 'admin.shared.buttons.delete' : '',
              ];
              @endphp
            <table class="table table-hover no-margin table-bordered dataTable">
              @include("admin.".$buttonsRoutsname.".components.tableComponent",[$ths,$tds,$tdOnly,$Otipnsinputs])
            </table>
              {{ $tds->links() }}
            @else
            <div class="alert alert-danger" style=" margin-top: 50px; margin-bottom: 50px; font-size: 25px;"> <strong style="color: #dd4b39;">Oops! </strong> No {{ $PageTitle }} Found </div>
            @endif
          </div>
          </div>
        </div>
        <!-- /.table-responsive -->
        <!-- include table response -->
      </div>
    </div>
    <!-- /.box -->
  @stop
@else
  {{ dd('not Permitied ( ليس لديك الصلاحيات لرؤية هذا المحتوي )') }}
@endif
