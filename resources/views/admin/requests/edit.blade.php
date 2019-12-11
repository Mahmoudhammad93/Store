@if( !is_permited('Request','edit') == 1 )
    @extends('admin.shared.master')
@section('content')
    <!-- Modal Edit -->
    <div class="modal-content">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Edit {{ $buttonsRoutsname }} ( تعديل الطلب )</h3>
            </div>
            <form method="POST" action="{{route($buttonsRoutsname.'.update',$row->id)}}" enctype="multipart/form-data" id="UpdateForm" style="padding: 2rem;">
            {{ csrf_field() }}
            @include('admin.'.$buttonsRoutsname.'.components.formEditRequest')
            </form>
        </div>
        <!-- /.box -->
    </div>
    <!-- End of Modal Edit -->
@endsection

@else
    {{ dd('not Permitied ( ليس لديك الصلاحيات لرؤية هذا المحتوي )') }}
@endif
