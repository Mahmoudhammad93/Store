@if( is_permited('sellInvoice','view') == 1 )
@extends('admin.shared.master')
@section('content')

<!-- TABLE: LATEST ORDERS -->
  <div class="box box-info">
  <!-- /.box-body -->
    <div class="box-header clearfix">
     @if( is_permited('sellInvoice','add') == 1 )
      <a href="{{ route('sellInvoice.create') }}" class="btn btn-sm btn-info btn-flat pull-right" style="margin-left: 5px;"><i class="fa fa-plus"></i> Add {{ $buttonsRoutsname }} ( اضافة ) </a>
     @endif
     @if( is_permited('sellInvoice','print') == 1 )
      <form action="{{ route('sellInvoice.print') }}" method="post" style="display: inline;">
        {{ csrf_field() }}
        @foreach($rows as $key => $value)
        <input name="{{$key}}" value="{{$value->id}}" style="display: none;"/>
        @endforeach
        <button class="btn btn-sm btn-primary btn-flat pull-right"><i class="fa fa-print"></i> Print (طباعة) </button>
      </form>
      @endif

    </div>
    <!-- /.box-header -->

    <!-- /.box-footer -->
    <div class="box-body">

    <!-- include table response -->
            <!-- filteration model -->
      @if( is_permited('sellInvoice','search') == 1 )
      @include("admin.".$buttonsRoutsname.".components.filterComponent",$filterData)
      @endif
             <!-- filteration model -->

             <!-- /.table-responsive -->
      <div class="table-responsive">
        @if($rows->count() > 0)

        @php
         $ths = ['Code ( كود الفاتورة )' , 'Date ( تاريخ )','Customer ( اسم الذبون )' ,'Total Price ( سعر الفاتورة )','Total Gain ( صافي الربح )' ,'Options ( الخيارات )'];
         $tds = $rows;
         $tdOnly = ['code','date','supplier_id','total_value','total_gain'];
        @endphp

        @php
         $Otipnsinputs  = [
          is_permited('sellInvoice','edit') == 1 ? 'admin.shared.buttons.edit' : '',
          is_permited('sellInvoice','delete') == 1 ? 'admin.shared.buttons.delete' : '',
         ];
        @endphp

        <table class="table table-hover no-margin">
          @include("admin.".$buttonsRoutsname.".components.tableComponent",[$ths,$tds,$tdOnly,$Otipnsinputs])
        </table>
           {{ $tds->links() }}
        @else
        <h3 class="text-center" style="color: red; margin-top: 50px; margin-bottom: 50px;"> No Data Found </h3>
        @endif
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
