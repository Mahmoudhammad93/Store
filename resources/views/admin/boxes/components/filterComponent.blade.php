<div class="row">
    <div class="col-md-12">
    <form action="{{ route($buttonsRoutsname.'.index') }}" method="GET">
        @php
        $input ="date";
        isset($filterData[$input]) ? $inputValue = $filterData[$input] : $inputValue = '';
        filterInputForm(['type' => 'date', 'class' => 'form-control','name' => $input ,'placeholder' => 'Date  ( التاريخ )' , 'value' => $inputValue ] , 3 );
     
        $input ="value";
        isset($filterData[$input]) ? $inputValue = $filterData[$input] : $inputValue = '';
        filterInputForm(['type' => 'text', 'class' => 'form-control','name' => $input ,'placeholder' => 'Value ( القيمه ) ' , 'value' => $inputValue ] , 3 );
   
        @endphp

      <div class='form-group'>
        <div class='col-sm-3'>
          <select class='form-control' name = "type">
              @if( ( isset($filterData['type']) ) && ( $filterData['type'] == 0 ) )
                  @php
                    $selected0 = "selected";
                    $selected1 = "";
                  @endphp              
              @else

              @php
                    $selected1 = "selected";
                    $selected0 = "";
                  @endphp
              @endif
            <option {{ $selected0 }} value="0" > Depit ( سحب ) </option> 
            <option {{$selected1}}  value="1"> Credit ( ايداع ) </option> 
          </select>
        </div>
      </div>
        <button class="btn btn-sm btn-info btn-flat center"><i class="fa fa-search"></i> Search </button>

    </form>
    </div>
</div>