@if( is_permited('groups','add') == 1 ) 
@extends('admin.shared.master')
@section('content')

	    <div class="modal-content">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Add {{ $buttonsRoutsname }} ( اضافة مجموعة )</h3>
            </div>
            <form method="POST" action="{{route($buttonsRoutsname.'.store')}}" id="insertForm" class="form-horizontal" enctype="multipart/form-data">
            {{ csrf_field() }}
             @include('admin.'.$buttonsRoutsname.'.components.formComponent')
              <!-- /.box-footer -->
          </div>
          <!-- /.box -->
	    </div>
@endsection
@else
{{ dd('not Permitied ( ليس لديك الصلاحيات لرؤية هذا المحتوي )') }}
@endif
