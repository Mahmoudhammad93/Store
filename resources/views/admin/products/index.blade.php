@if( is_permited('products','view') == 1 )  
@extends('admin.shared.master')
@section('content')

<!-- TABLE: LATEST ORDERS -->
  <div class="box box-info">
  <!-- /.box-body -->
    <div class="box-header clearfix">
      @if( is_permited('products','add') == 1 )                            
      <a href="{{ route($buttonsRoutsname.'.create') }}" class="btn btn-sm btn-info btn-flat pull-right" style="margin-left: 5px;"><i class="fa fa-plus"></i> Add {{ $buttonsRoutsname }} ( اضافة ) </a>
      @endif

      @if( is_permited('products','print') == 1 )                            
      <form action="{{ route($buttonsRoutsname.'.print') }}" method="post" style="display: inline;">
        {{ csrf_field() }}
        @foreach($rows as $key => $value)
        <input name="{{$key}}" value="{{$value->id}}" style="display: none;"/>
        @endforeach
        <button class="btn btn-sm btn-primary btn-flat pull-right"><i class="fa fa-print"></i> Print (طباعة) </button>
      </form>
      @endif

      @if($rows->count() > 0)
      @php
       $totalcostprice = 0;
      @endphp
      @foreach($rows as $rowforcontallcost)
      @php 
       $totalcostprice = $totalcostprice + ($rowforcontallcost->sell_price * $rowforcontallcost->quantity) ;
      @endphp
      @endforeach
      @endif
      <button type="button" class="btn btn-sm btn-success btn-flat pull-left"> Total  : <span style="font-size: 15px;"> {{ $rows->count() }} </span> ( صنف ) </button>
      <button type="button" class="btn btn-sm btn-danger btn-flat pull-left" style="margin-left: 5px;"> Total Price : <span style="font-size: 15px;"> {{ isset( $totalcostprice ) ? round($totalcostprice,5) : 0}} </span> ( جنيه ) </button>

    </div>
    <!-- /.box-header -->
    
    <!-- /.box-footer -->
    <div class="box-body">
    
    <!-- include table response -->
     
      <!-- filteration model -->
      @if( is_permited('products','search') == 1 )       
      @include("admin.".$buttonsRoutsname.".components.filterComponent",$filterData)
      @endif
      <!-- filteration model -->


             <!-- /.table-responsive -->
      <div class="table-responsive">
        @if($rows->count() > 0)
        @php
          $ths = ['Code ( الكود )' , 'Name ( اسم الصنف )' ,' Category ( القسم )', 'Quantity ( الكمية المتاحة )' , 'Unit ( الوحدة )' ,'Purchase Price ( السعر التجاري )' , 'Sell Price ( سعر البيع )' ,'Options ( خيارات )'];
          $tds = $rows;
          $tdOnly = ['code','name','category_id','quantity','unit_id','sell_price','pay_price'];
        @endphp 

        @php
         $Otipnsinputs  = [
          is_permited('products','edit') == 1 ? 'admin.shared.buttons.edit' : '',
          is_permited('products','delete') == 1 ? 'admin.shared.buttons.delete' : '',
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