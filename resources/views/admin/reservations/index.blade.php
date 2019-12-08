@if(!is_permited('reservation','view') == 1 )
  @extends('admin.shared.master')
  @section('content')

{{--      {{ dd($user) }}--}}
  <!-- TABLE: LATEST ORDERS -->
    <div class="box box-info">
    <!-- /.box-body -->
    <div class="modal-content">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Add {{ $buttonsRoutsname }} ( اضافة مريض )</h3>
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
      <div class="box-body">
          @if( !is_permited('reservation','print') == 1 )
              <form action="{{ route('reservations.print') }}" method="post" style="display: inline;">
                  {{ csrf_field() }}
                  @foreach($rows as $key => $value)
                      <input name="{{$key}}" value="{{$value->id}}" style="display: none;"/>
                  @endforeach
                  <button class="btn btn-sm btn-primary btn-flat pull-right"><i class="fa fa-print"></i> Print (طباعة) </button>
              </form>
      @endif
        <!-- include table response -->
        <!-- filteration model -->
        @if( !is_permited('reservation','search') == 1 )
          @include("admin.".$buttonsRoutsname.".components.filterComponent",$filterData)
        @endif
        <!-- filteration model -->
        <!-- /.table-responsive -->
        <div class="row" style="margin-top: 20px">
          <div class="col-md-12">
            <div class="table-responsive">
            @if($rows->count() > 0)

              @php


              $ths = ['Patient.No ( رقم المريض )' ,'Name ( الاسم )' , 'Gender ( الجنس )', 'Phone ( رقم الهاتف )','Patient Date of birth (تاريخ ميلاد المريض)', 'Date of reservation ( تاريخ الحجز )', 'Res Expire Date ( تاريخ انتهاء الحجز )','Notes ( ملاحظات )','Options ( الخيارات )'];
              $tds = $rows;
              $tdOnly = ['patient_no','name','gender','phone','date_of_birth','res_expire_date','created_at','notes'];
              @endphp

              @php
              $Otipnsinputs  = [
                !is_permited('reservation','edit') == 1 ? 'admin.shared.buttons.edit' : '',
                !is_permited('reservation','delete') == 1 ? 'admin.shared.buttons.delete' : '',
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
