@if( is_permited('boxes','view') == 1 ) 
@extends('admin.shared.master')
@section('content')

<!-- TABLE: LATEST ORDERS -->
  <div class="box box-info">
  <!-- /.box-body -->
    <div class="box-header clearfix">
      
      <a class="btn btn-lg btn-danger btn-flat pull-left" style="margin-left: 5px;"> <span style="font-size: 15px;"> Total : </span> {{ round($rows->first()['totl_value'],5) }} LE </a>

      @if( is_permited('boxes','add') == 1 ) 
      <a href="{{ route($buttonsRoutsname.'.create') }}" class="btn btn-sm btn-info btn-flat pull-right" style="margin-left: 5px;"><i class="fa fa-plus"></i> Add {{ $buttonsRoutsname }}</a>
      @endif

      @if( is_permited('boxes','print') == 1 ) 
      <form action="{{ route($buttonsRoutsname.'.print') }}" method="post" style="display: inline;">
        {{ csrf_field() }}
        @foreach($rows as $key => $value)
        <input name="{{$key}}" value="{{$value->id}}" style="display: none;"/>
        @endforeach
        <button class="btn btn-sm btn-primary btn-flat pull-right"><i class="fa fa-print"></i> Print</button>
      </form>
     @endif
    </div>
    <!-- /.box-header -->
    
    <!-- /.box-footer -->
    <div class="box-body">
    
    <!-- include table response -->      
            <!-- filteration model -->
      @if( is_permited('boxes','search') == 1 ) 
      @include("admin.".$buttonsRoutsname.".components.filterComponent",$filterData)
      @endif 
             <!-- filteration model -->

             <!-- /.table-responsive -->
      <div class="table-responsive">    
        @if($rows->count() > 0)

        @php
         $ths = ['Date ( التاريخ )','Type ( نوع العمالة )','Value ( القيمة )','Total Value ( اجمالي الصندوق )', 'Invoice Type ( نوع الفاتورة )' ,'Description ( البيان )'];
         $tds = $rows;
         $tdOnly = ['date','type','value','totl_value','invoiceType','desc'];
         $Otipnsinputs  = [];
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