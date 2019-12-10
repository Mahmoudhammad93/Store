<input type="hidden" name="supId" value="{{ $supplier->id }}">
@php
    $input = "phone";
    inputFormPopup('Phone ( رقم التليفون )',['type' => 'text', 'class' => 'form-control ph-req','name' => $input ,'placeholder' => 'Enter '.$input, 'readonly'=>'readonly' ,'value' => $supplier->phone ] , isset($errors->toArray()[$input]) ? $errors->toArray()[$input] : [] );

    $input = "requests";
    inputFormPopup('Request ( الطلب )',['type' => 'text', 'class' => 'form-control','maxlength'=>'200','name' => $input ,'placeholder' => 'Enter '.$input,'value' => $request] , isset($errors->toArray()[$input]) ? $errors->toArray()[$input] : [] );

@endphp
<div class="form-group">
    <input type="submit" class="btn btn-primary" value="Send Request">
</div><?php
