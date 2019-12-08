@if( is_permited('totalgainindex','view') == 1 )                            
@extends('admin.shared.master')
@section('content')

<!-- TABLE: LATEST ORDERS -->
  <div class="box box-info">
  <!-- /.box-body -->
    <div class="box-header clearfix">
      @php
       $totalgaainofper = 0;
       foreach($rows as $rowfoto){
        $totalgaainofper = $totalgaainofper +  $rowfoto->total_gain;
       }
      @endphp
      <button type="button" class="btn btn-sm btn-danger btn-flat pull-left" style="margin-left: 5px; font-size: 15px;"> Total  : {{ round($totalgaainofper,5)}} LE </button>
    </div>
    <!-- /.box-header -->
    
    <!-- /.box-footer -->
    <div class="box-body">
    
    <!-- include table response -->      
            <!-- filteration model -->
             
<div class="row">
    <div class="col-md-12">
      <h3 class="col-md-3"> From ( من ) </h3>
      <h3 class="col-md-3"> To ( الي ) </h3>
      <h3 class="col-md-3"> </h3>
      <h3 class="col-md-3"> </h3>
    </div>

    <div class="col-md-12">
    <form action="{{ route('totalgainindex.index') }}" method="GET">

        @php
        $input ="datefrom";
        isset($filterData[$input]) ? $inputValue = $filterData[$input] : $inputValue = '';
        filterInputForm(['type' => 'date', 'class' => 'form-control','name' => $input ,'placeholder' => '', 'value' => $inputValue ] , 3 );
        @endphp
        
        @php     
        $input ="dateto";
        isset($filterData[$input]) ? $inputValue = $filterData[$input] : $inputValue = '';
        filterInputForm(['type' => 'date', 'class' => 'form-control','name' => $input ,'placeholder' => '', 'value' => $inputValue ] , 3 );
        @endphp
        
        <input type="hidden" name="invoice_type" value="1" />

        <button class="btn btn-sm btn-info btn-flat center"><i class="fa fa-search"></i> Search ( بحث ) </button>

    </form>
    </div>
</div>
             
             <!-- filteration model -->

             <!-- /.table-responsive -->
      <div class="table-responsive">    
        @if($rows->count() > 0)

        @php
         $ths = ['Code ( كود الفاتورة )' , 'Date ( تاريخ )','Supplier ( اسم المورد )' ,'Total Price ( سعر الفاتورة )','Total Gain ( صافي الربح )'];
         $tds = $rows;
         $tdOnly = ['code','date','supplier_id','total_value','total_gain'];
         $Otipnsinputs  = [];
        @endphp

        <table class="table table-hover no-margin">
          @include("admin.sellInvoice.components.tableComponent",[$ths,$tds,$tdOnly,$Otipnsinputs])
        </table>
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