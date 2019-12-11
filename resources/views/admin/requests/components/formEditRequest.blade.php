<input type="hidden" name="supId" value="{{ isset($row->supId) ? $row->supId : '' }}">
@php
    $input = "phone";
    inputFormPopup('Phone ( رقم التليفون )',['type' => 'text', 'class' => 'form-control ph-req','name' => $input ,'placeholder' => 'Enter '.$input, 'readonly'=>'readonly' ,'value' => isset($row->$input) ? $row->$input : '' ] , isset($errors->toArray()[$input]) ? $errors->toArray()[$input] : [] );

    $input = "request";
    inputFormPopup('Request ( الطلب )',['type' => 'text', 'class' => 'form-control','maxlength'=>'200','name' => $input ,'placeholder' => 'Enter '.$input,'value' => isset($row->$input) ? $row->$input : ''] , isset($errors->toArray()[$input]) ? $errors->toArray()[$input] : [] );

@endphp
<div class="form-group">
    <input type="submit" class="btn btn-primary" value="Save Request">
</div>
