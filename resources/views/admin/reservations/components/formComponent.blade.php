
<!-- inputForm ($lable,$inputAttrArrayAsKeyAndValue,$errors) -->
<!-- selectform($lable,$inputAtrrs,$value,$databind,$errors) -->
<div class="box-body">
@php

$input = "patient_no";
inputFormIndex('Patient.No ( رقم المريض )',['type' => 'number', 'class' => 'form-control','name' => $input ,'placeholder' => 'Enter '.$input ] , isset($errors->toArray()[$input]) ? $errors->toArray()[$input] : [] );

$input = "name";
inputFormIndex('Name ( الاسم )',['type' => 'text', 'class' => 'form-control','name' => $input ,'placeholder' => 'Enter '.$input ] , isset($errors->toArray()[$input]) ? $errors->toArray()[$input] : [] );

@endphp
    <div class='form-group col-md-3'>
        <label class="col-sm-12  label-control text-center"> Gender ( الجنس ) </label>
        <div class='col-sm-12'>
            <select class='form-control' onchange="productsInfo(0,this.value)" name="gender" id="reservation">
                <option value="">-- Select Gender ( اختر الجنس )  --</option>
                <option value="Male ( ذكر )">Male ( ذكر )</option>
                <option value="Female ( أنثي )">Female ( أنثي )</option>
            </select>
        </div>
    </div>
@php

$input = "address";
inputFormIndex('Address ( العنوان )',['type' => 'text', 'class' => 'form-control','name' => $input ,'placeholder' => 'Enter '.$input ] , isset($errors->toArray()[$input]) ? $errors->toArray()[$input] : [] );

$input = "phone";
inputFormIndex('Phone ( رقم الهاتف )',['type' => 'number', 'class' => 'form-control','name' => $input ,'placeholder' => 'Enter '.$input ] , isset($errors->toArray()[$input]) ? $errors->toArray()[$input] : [] );

$input = "date_of_birth";
inputFormIndex('Date of birth ( تاريخ الميلاد )',['type' => 'date', 'class' => 'form-control','name' => $input ,'placeholder' => 'Enter '.$input ] , isset($errors->toArray()[$input]) ? $errors->toArray()[$input] : [] );

$input = "res_expire_date";
inputFormIndex('Expire Date ( تاريخ انتهاء الحجز )',['type' => 'date', 'class' => 'form-control','name' => $input ,'placeholder' => 'Enter '.$input ] , isset($errors->toArray()[$input]) ? $errors->toArray()[$input] : [] );

$input = "notes";
inputFormIndex('Notes ( ملاحظات )',['type' => 'text', 'class' => 'form-control','name' => $input ,'placeholder' => 'Enter '.$input ] , isset($errors->toArray()[$input]) ? $errors->toArray()[$input] : [] );



@endphp

</div>
<!-- /.box-body -->
<div class="box-footer">
<input id="edit_id" type="submit" class="btn btn-success" value="Save ( حفظ )">
</div>
