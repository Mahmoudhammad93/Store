<form method="POST" action="{{route($buttonsRoutsname.'.destroy',$td->id)}}" style="display: inline;">
    {{ csrf_field() }}
    {{ method_field('delete') }}
    <button class="btn btn-sm btn-danger btn-flat center"><i class="fa fa-times"></i> Delete ( مسح ) </button>
</form>