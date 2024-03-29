
<!-- inputForm ($lable,$inputAttrArrayAsKeyAndValue,$errors) -->
<!-- selectform($lable,$inputAtrrs,$value,$databind,$errors) -->
<div class="box-body">
@php

$input = "c_name";
inputFormIndex('Clinic Name (أسم العيادة)',['type' => 'text', 'class' => 'form-control','name' => $input ,'placeholder' => 'Enter '.$input ] , isset($errors->toArray()[$input]) ? $errors->toArray()[$input] : [] );

@endphp

    <div class='form-group col-md-4'>
        <label style="margin-left: 15px" class="label-control"> Clinic Services (خدمات العيادة) </label>
        <div class='col-sm-12'>
            <select class='form-control' onchange="productsInfo(0,this.value)" name="c_services" id="services">
                <option value="">-- Select Service ( اختر الخدمة )  --</option>
                @for($i = 0; $i < $databind['services']->count(); $i++)
                    <option value="{{$databind['services'][$i]->c_name}}">{{$databind['services'][$i]->c_name}}</option>
                @endfor
            </select>
        </div>
    </div>

    <div class='form-group col-md-4'>
        <label style="margin-left: 15px" class="label-control"> Clinic Doctor (طبيب العيادة) </label>
        <div class='col-sm-12'>
            <select class='form-control' onchange="productsInfo(0,this.value)" name="c_doctor" id="doctor">
                <option value="">-- Select Doctor ( اختر الطبيب )  --</option>
                @for($i = 0; $i < $databind['doctors']->count(); $i++)
                    <option value="{{$databind['doctors'][$i]->name}}">{{$databind['doctors'][$i]->name}}</option>
                @endfor
            </select>
        </div>
    </div>

</div>
<div class="col-md-12">
    <!-- /.box-body -->
    <div class="box-footer">
        <input id="edit_id" type="submit" class="btn btn-success" value="Save ( حفظ )">
    </div>
</div>
