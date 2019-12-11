<!-- inputForm ($lable,$inputAttrArrayAsKeyAndValue,$errors) -->
<!-- selectform($lable,$inputAtrrs,$value,$databind,$errors) -->
<div class="box-body">
@php

    $input = "name";
    inputFormIndex('Name (الاسم)',['type' => 'text', 'class' => 'form-control','name' => $input ,'placeholder' => 'Enter '.$input ,'value' => isset($row->$input) ? $row->$input : '' ] , isset($errors->toArray()[$input]) ? $errors->toArray()[$input] : [] );

    $input = "phone";
    inputFormIndex('Phone (رقم الهاتف)',['type' => 'number', 'class' => 'form-control','name' => $input ,'placeholder' => 'Enter '.$input ,'value' => isset($row->$input) ? $row->$input : '' ] , isset($errors->toArray()[$input]) ? $errors->toArray()[$input] : [] );

    $input = "email";
    inputFormIndex('Email (البريد الالكتروني)',['type' => 'email', 'class' => 'form-control','name' => $input ,'placeholder' => 'Enter '.$input ,'value' => isset($row->$input) ? $row->$input : ''] , isset($errors->toArray()[$input]) ? $errors->toArray()[$input] : [] );

    $input = "specialty";
    inputFormIndex('Specialty (التخصص)',['type' => 'text', 'class' => 'form-control','name' => $input ,'placeholder' => 'Enter '.$input ,'value' => isset($row->$input) ? $row->$input : ''] , isset($errors->toArray()[$input]) ? $errors->toArray()[$input] : [] );

    $input = "note";
    inputFormIndex('Notes (ملاحظات)',['type' => 'text', 'class' => 'form-control','name' => $input ,'placeholder' => 'Enter '.$input ,'value' => isset($row->$input) ? $row->$input : ''] , isset($errors->toArray()[$input]) ? $errors->toArray()[$input] : [] );



@endphp

</div>
<!-- /.box-body -->
<div class="box-footer">
    <input id="edit_id" type="submit" class="btn btn-success" value="Save ( حفظ )">
</div>
