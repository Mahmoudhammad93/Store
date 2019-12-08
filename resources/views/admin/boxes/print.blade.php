@if( is_permited('boxes','print') == 1 ) 
@extends('admin.shared.master')
@section('content')
<!-- TABLE: LATEST ORDERS -->
  <div class="box box-info" >
 
    <div class="box-header clearfix">
      <a class="btn btn-lg btn-danger btn-flat pull-left" style="margin-left: 5px;"> <span style="font-size: 15px;"> Total : </span> {{ $rows->first()['totl_value'] }} LE </a>
    </div>

    <div class="box-body">
  
             <!-- /.table-responsive -->
      <div class="table-responsive">
        @if($rows->count() > 0)

        @php
          $ths = ['Date','Type','Value','Total Value','Description'];
          $tds = $rows;
          $tdOnly = ['date','type','value','totl_value','desc'];
          $Otipnsinputs  = [];
        @endphp  

        <table class="table table-hover no-margin">
          @include("admin.".$buttonsRoutsname.".components.tableComponent",[$ths,$tds,$tdOnly,$Otipnsinputs])
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