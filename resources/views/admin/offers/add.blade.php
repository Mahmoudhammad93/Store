@extends('admin.shared.master')
@section('content')

	    <div class="modal-content">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Add {{ $buttonsRoutsname }}</h3>
            </div>
            <form method="POST" action="{{route($buttonsRoutsname.'.store')}}" id="insertForm" class="form-horizontal" enctype="multipart/form-data">
            {{ csrf_field() }}
             @include('admin.'.$buttonsRoutsname.'.components.formComponent')
              <!-- /.box-footer -->
          </div>
          <!-- /.box -->
	    </div>
  @endsection
