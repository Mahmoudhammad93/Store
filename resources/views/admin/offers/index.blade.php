@extends('admin.shared.master')
@section('content')

<!-- TABLE: LATEST ORDERS -->
  <div class="box box-info">
  <!-- /.box-body -->
    <div class="box-header clearfix">

      <a href="{{ route($buttonsRoutsname.'.create') }}" class="btn btn-sm btn-info btn-flat pull-right" style="margin-left: 5px;"><i class="fa fa-plus"></i> Add {{ $buttonsRoutsname }}</a>
      
      <form action="{{ route($buttonsRoutsname.'.print') }}" method="post" style="display: inline;">
        {{ csrf_field() }}
        @foreach($rows as $key => $value)
        <input name="{{$key}}" value="{{$value->id}}" style="display: none;"/>
        @endforeach
        <button class="btn btn-sm btn-primary btn-flat pull-right"><i class="fa fa-print"></i> Print</button>
      </form>

    </div>
    <!-- /.box-header -->
    
    <!-- /.box-footer -->
    <div class="box-body">
    
    <!-- include table response -->      
            <!-- filteration model -->
      @include("admin.".$buttonsRoutsname.".components.filterComponent",$filterData)
             <!-- filteration model -->

             <!-- /.table-responsive -->
      <div class="table-responsive">    
        @if($rows->count() > 0)

        @php
         $ths = ['Title' , 'Amount' , 'Level','Options'];
         $tds = $rows;
         $tdOnly = ['title','amount','level'];
         $Otipnsinputs  = ['admin.shared.buttons.delete','admin.shared.buttons.edit'];
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

