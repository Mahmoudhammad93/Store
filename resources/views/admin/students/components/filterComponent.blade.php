<div class="row">
    <div class="col-md-12">
    <form action="{{ route($buttonsRoutsname.'.index') }}" method="GET">
        @php

        $input ="fullname";
        isset($filterData[$input]) ? $inputValue = $filterData[$input] : $inputValue = '';
        filterInputForm(['type' => 'text', 'class' => 'form-control','name' => $input ,'placeholder' => 'Enter '.$input , 'value' => $inputValue ] , 2 );
     

        $input ="email";
        isset($filterData[$input]) ? $inputValue = $filterData[$input] : $inputValue = '';
        filterInputForm(['type' => 'email', 'class' => 'form-control','name' => $input ,'placeholder' => 'Enter '.$input , 'value' => $inputValue ] , 2 );
     
     
        $input ="mobile";
        isset($filterData[$input]) ? $inputValue = $filterData[$input] : $inputValue = '';
        filterInputForm(['type' => 'number', 'class' => 'form-control','name' => $input ,'placeholder' => 'Enter '.$input , 'value' => $inputValue ] , 2 );
     
        $input = "branch";
        isset($filterData[$input]) ? $inputValue = $filterData[$input] : $inputValue = '';
        filterSelectForm(['class' => 'form-control','name' => $input ] ,2,$databind['branches'],$inputValue)
        @endphp

        <button class="btn btn-sm btn-info btn-flat center"><i class="fa fa-search"></i> Search </button>

    </form>
    </div>
</div>