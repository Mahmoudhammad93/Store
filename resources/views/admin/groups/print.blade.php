@if( is_permited('groups','print') == 1 ) 
@extends('admin.shared.master')
@section('content')
<!-- TABLE: LATEST ORDERS -->
  <div class="box box-info" >
  <!-- /.box-body -->
    <!-- /.box-footer -->
    <div class="box-body">
    
             <!-- /.table-responsive -->
      <div class="table-responsive">
        @if($rows->count() > 0)

        @php
          $ths = ['Name ( اسم المجموعة )' , 'Description ( التفاصيل )'];
          $tds = $rows;
          $tdOnly = ['name','desc'];
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