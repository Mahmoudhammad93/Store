
<!-- inputForm ($lable,$inputAttrArrayAsKeyAndValue,$errors) -->
<!-- selectform($lable,$inputAtrrs,$value,$databind,$errors) -->
<div class="box-body">
@php

$input = "value";
inputForm('Value ( المبلغ )',['type' => 'number','step' => 'any', 'class' => 'form-control','name' => $input ,'placeholder' => 'Enter '.$input ,'value' => isset($row->$input) ? $row->$input : ''] , isset($errors->toArray()[$input]) ? $errors->toArray()[$input] : [] );

$input = "date";
inputForm('Date ( التاريخ )',['type' => 'date', 'class' => 'form-control','name' => $input ,'placeholder' => 'Enter '.$input ,'value' => isset($row->$input) ? $row->$input : ''] , isset($errors->toArray()[$input]) ? $errors->toArray()[$input] : [] );

$input = "desc";
inputForm('Description ( التفاصيل )',['type' => 'text', 'class' => 'form-control','name' => $input ,'placeholder' => 'Enter '.$input ,'value' => isset($row->$input) ? $row->$input : ''] , isset($errors->toArray()[$input]) ? $errors->toArray()[$input] : [] );

@endphp

<div class='form-group'>
        <label class='col-sm-2 control-label'>Type ( النوع ) </label>
        
        <div class='col-sm-10'>
          <select class='form-control'name = "type">

            @if( ( isset($row['type']) ) && ( $row['type'] == 0 ) )
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

</div>
<!-- /.box-body -->
<div class="box-footer">
<input id="edit_id" type="submit" class="btn btn-success" value="Save ( حفظ )">
</div>