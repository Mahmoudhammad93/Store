<div class="row">
    <div class="col-md-12">
    <form action="{{ route($buttonsRoutsname.'.index') }}" method="GET">
        @php
        $input ="name";
        isset($filterData[$input]) ? $inputValue = $filterData[$input] : $inputValue = '';
        filterInputForm(['type' => 'text', 'class' => 'form-control','name' => $input ,'placeholder' => 'Name ( الاسم )' , 'value' => $inputValue ] , 3 );

        $input ="email";
        isset($filterData[$input]) ? $inputValue = $filterData[$input] : $inputValue = '';
        filterInputForm(['type' => 'email', 'class' => 'form-control','name' => $input ,'placeholder' => 'Email ( البريد الالكتروني )', 'value' => $inputValue ] , 3 );
   
   
        $input ="phone";
        isset($filterData[$input]) ? $inputValue = $filterData[$input] : $inputValue = '';
        filterInputForm(['type' => 'number', 'class' => 'form-control','name' => $input ,'placeholder' => 'Phone ( رقم الهاتف )' , 'value' => $inputValue ] , 3 );
   
        @endphp

        <button class="btn btn-sm btn-info btn-flat center"><i class="fa fa-search"></i> Search ( بحث ) </button>

    </form>
    </div>
</div>