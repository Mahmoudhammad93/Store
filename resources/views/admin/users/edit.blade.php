@if( is_permited('users','edit') == 1 ) 
@extends('admin.shared.master')
@section('content')
  <!-- Modal Edit -->
        <div class="modal-content">
            <div class="box box-info">
              <div class="box-header with-border">
                <h3 class="box-title">Edit {{ $buttonsRoutsname }} ( تعديل بيانات المستخدم ) </h3>
              </div>
              <form method="POST" action="{{route($buttonsRoutsname.'.update',$row->id)}}" class="form-horizontal" enctype="multipart/form-data">
              {{ csrf_field() }}
              {{ method_field('put') }}
              @include('admin.'.$buttonsRoutsname.'.components.formComponent')
              </form>  
                
                <!-- /.box-footer -->
              
            </div>
            <!-- /.box -->
        </div>
    <!-- End of Modal Edit -->
  @endsection

@else
{{ dd('not Permitied ( ليس لديك الصلاحيات لرؤية هذا المحتوي )') }}
@endif