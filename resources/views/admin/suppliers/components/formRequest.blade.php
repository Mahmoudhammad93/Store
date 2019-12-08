@php
    $input = "phone";
    inputFormPopup('Phone ( رقم التليفون )',['type' => 'text', 'class' => 'form-control','name' => $input ,'placeholder' => 'Enter '.$input, 'value' => $supplier->phone ] , isset($errors->toArray()[$input]) ? $errors->toArray()[$input] : [] );

    $input = "request";
    inputFormPopup('Request ( الطلب )',['type' => 'text', 'class' => 'form-control','name' => $input ,'placeholder' => 'Enter '.$input ] , isset($errors->toArray()[$input]) ? $errors->toArray()[$input] : [] );

@endphp
<div class="form-group">
    <input type="submit" class="btn btn-primary" value="Send Request">
</div><?php
