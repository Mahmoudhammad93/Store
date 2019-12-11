<!-- inputForm ($lable,$inputAttrArrayAsKeyAndValue,$errors) -->
<!-- selectform($lable,$inputAtrrs,$value,$databind,$errors) -->
<div class="box-body">
    @php

        $input = "c_name";
        inputFormIndex('Clinic Name (أسم العيادة)',['type' => 'text', 'class' => 'form-control','name' => $input ,'placeholder' => 'Enter '.$input,'value' => isset($row->$input) ? $row->$input : ''] , isset($errors->toArray()[$input]) ? $errors->toArray()[$input] : [] );

        $input = "c_services";
        inputFormIndex('Clinic Services (خدمات العيادة)',['type' => 'text', 'class' => 'form-control','name' => $input ,'placeholder' => 'Enter '.$input,'value' => isset($row->$input) ? $row->$input : ''] , isset($errors->toArray()[$input]) ? $errors->toArray()[$input] : [] );

        $input = "c_doctor";
        inputFormIndex('Clinic Doctor (طبيب العيادة)',['type' => 'text', 'class' => 'form-control','name' => $input ,'placeholder' => 'Enter '.$input,'value' => isset($row->$input) ? $row->$input : ''] , isset($errors->toArray()[$input]) ? $errors->toArray()[$input] : [] );

    @endphp

</div>
<!-- /.box-body -->
<div class="box-footer">
    <input id="edit_id" type="submit" class="btn btn-success" value="Save ( حفظ )">
</div>

