<div class="row">
    <div class="col-md-12">
    <form action="{{ route($buttonsRoutsname.'.index') }}" method="GET">
        @php
        $input ="desc";
        isset($filterData[$input]) ? $inputValue = $filterData[$input] : $inputValue = '';
        filterInputForm(['type' => 'text', 'class' => 'form-control','name' => $input ,'placeholder' => 'Description ( التفاصيل )' , 'value' => $inputValue ] , 3 );
     
        $input ="value";
        isset($filterData[$input]) ? $inputValue = $filterData[$input] : $inputValue = '';
        filterInputForm(['type' => 'number', 'step'=>'any' ,'class' => 'form-control','name' => $input ,'placeholder' => 'Value ( القيمة )'.$input , 'value' => $inputValue ] , 3 );
   
        $input ="date";
        isset($filterData[$input]) ? $inputValue = $filterData[$input] : $inputValue = '';
        filterInputForm(['type' => 'date', 'class' => 'form-control','name' => $input ,'placeholder' => 'Enter '.$input , 'value' => $inputValue ] , 3 );
   
        @endphp

        <button class="btn btn-sm btn-info btn-flat center"><i class="fa fa-search"></i> Search ( بحث ) </button>

    </form>
    </div>
</div>