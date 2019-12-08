<div class="row">
    <div class="col-md-12">
    <form action="{{ route($buttonsRoutsname.'.index') }}" method="GET">
        @php

        $input ="code";
        isset($filterData[$input]) ? $inputValue = $filterData[$input] : $inputValue = '';
        filterInputForm(['type' => 'text', 'class' => 'form-control','name' => $input ,'placeholder' => 'Code ( كود ) ' , 'value' => $inputValue ] , 2 );
 
        $input ="name";
        isset($filterData[$input]) ? $inputValue = $filterData[$input] : $inputValue = '';
        filterInputForm(['type' => 'text', 'class' => 'form-control','name' => $input ,'placeholder' => 'Name ( اسم الصنف )' , 'value' => $inputValue ] , 2 );
 
        $input = "category_id";
        isset($filterData[$input]) ? $inputValue = $filterData[$input] : $inputValue = '';
        filterSelectForm(['class' => 'form-control','name' => $input ] ,2,$databind['categories'],$inputValue);
       
        $input = "unit_id";
        isset($filterData[$input]) ? $inputValue = $filterData[$input] : $inputValue = '';
        filterSelectForm(['class' => 'form-control','name' => $input ] ,2,$databind['units'],$inputValue);
       
       
        @endphp

        <button class="btn btn-sm btn-info btn-flat center"><i class="fa fa-search"></i> Search ( بحث ) </button>

    </form>
    </div>
</div>