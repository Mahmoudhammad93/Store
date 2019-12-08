
<!-- inputForm ($lable,$inputAttrArrayAsKeyAndValue,$errors) -->
<!-- selectform($lable,$inputAtrrs,$value,$databind,$errors) -->
<div class="box-body">
@php

$input = "name";
inputForm('Unit ( الوحدة  )',['type' => 'text', 'class' => 'form-control','name' => $input ,'placeholder' => 'Enter '.$input ,'value' => isset($row->$input) ? $row->$input : ''] , isset($errors->toArray()[$input]) ? $errors->toArray()[$input] : [] );

@endphp

</div>
<!-- /.box-body -->
<div class="box-footer">
<input id="edit_id" type="submit" class="btn btn-success" value="Save">
</div>