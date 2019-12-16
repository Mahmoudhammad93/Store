
<!-- inputForm ($lable,$inputAttrArrayAsKeyAndValue,$errors) -->
<!-- selectform($lable,$inputAtrrs,$value,$databind,$errors) -->
<div class="box-body">
    <input type="hidden" id="itrator" value="0" name="itrator"/>
@php

$input = "patient_no";
inputFormIndex('Patient.No (رقم المريض)',['type' => 'number', 'class' => 'form-control','name' => $input ,'placeholder' => 'Enter '.$input ] , isset($errors->toArray()[$input]) ? $errors->toArray()[$input] : [] );

$input = "name";
inputFormIndex('Name (الاسم)',['type' => 'text', 'class' => 'form-control','name' => $input ,'placeholder' => 'Enter '.$input ] , isset($errors->toArray()[$input]) ? $errors->toArray()[$input] : [] );

$input = "address";
inputFormIndex('Address (العنوان)',['type' => 'text', 'class' => 'form-control','name' => $input ,'placeholder' => 'Enter '.$input ] , isset($errors->toArray()[$input]) ? $errors->toArray()[$input] : [] );

$input = "phone";
inputFormIndex('Phone (رقم الهاتف)',['type' => 'number', 'class' => 'form-control','name' => $input ,'placeholder' => 'Enter '.$input ] , isset($errors->toArray()[$input]) ? $errors->toArray()[$input] : [] );

$input = "date_of_birth";
inputFormIndex('Date of birth (تاريخ الميلاد)',['type' => 'date', 'class' => 'form-control','name' => $input ,'placeholder' => 'Enter '.$input ] , isset($errors->toArray()[$input]) ? $errors->toArray()[$input] : [] );

$input = "notes";
inputFormIndex('Notes (ملاحظات)',['type' => 'text', 'class' => 'form-control','name' => $input ,'placeholder' => 'Enter '.$input ] , isset($errors->toArray()[$input]) ? $errors->toArray()[$input] : [] );

@endphp

{{--{{dd($databind['clinics']->count())}}--}}
    <div class='form-group col-md-3'>
        <label class="col-sm-12  label-control text-center"> Gender ( الجنس ) </label>
        <div class='col-sm-12'>
            <select class='form-control' onchange="productsInfo(0,this.value)" name="gender" id="clinic">
                <option value="">-- Select Gender ( اختر الجنس )  --</option>
                <option value="Male ( ذكر )">Male ( ذكر )</option>
                <option value="Female ( أنثي )">Female ( أنثي )</option>
            </select>
        </div>
    </div>

    <div class='form-group col-md-3'>
        <label style="margin-left: 15px" class="col-sm-12 label-control text-center"> Clinic ( العيادة ) </label>
        <div class='col-sm-12'>
            <select class='form-control' onchange="productsInfo(0,this.value)" name="clinic" id="clinic">
                <option value="">-- Select Clinic ( اختر العيادة )  --</option>
                @for($i = 0; $i < $databind['clinics']->count(); $i++)
                    <option value="{{$databind['clinics'][$i]->c_name}}">{{$databind['clinics'][$i]->c_name}}</option>
                @endfor
            </select>
        </div>
    </div>

    <div class='form-group col-md-3'>
        <label style="margin-left: 15px" class="col-sm-12 label-control text-center"> Service ( الخدمة ) </label>
        <div class='col-sm-12'>
            <select class='form-control' onchange="productsInfo(0,this.value)" name="service" id="service">
                <option value="">-- Select Service ( اختر الخدمة )  --</option>
                @for($i = 0; $i < $databind['services']->count(); $i++)
                    <option value="{{$databind['services'][$i]->c_name}}">{{$databind['services'][$i]->c_name}}</option>
                @endfor
            </select>
        </div>
    </div>

    <div class='form-group col-md-3'>
        <label style="margin-left: 15px" class="col-sm-12 label-control text-center"> Doctor ( الطبيب ) </label>
        <div class='col-sm-12'>
            <select class='form-control' onchange="productsInfo(0,this.value)" name="doctor" id="doctor">
                <option value="">-- Select Doctor ( اختر الطبيب )  --</option>
                @for($i = 0; $i < $databind['doctors']->count(); $i++)
                    <option value="{{$databind['doctors'][$i]->name}}">{{$databind['doctors'][$i]->name}}</option>
                @endfor
            </select>
        </div>
    </div>


</div>
<!-- /.box-body -->
<div class="box-footer">
<input id="edit_id" type="submit" class="btn btn-success" value="Save ( حفظ )">
</div>

<script>
    function productsInfo(formProNum , ProId){

        var csrfToken = '{{csrf_token()}}';
        $.ajax({
            url      : "{{route('getProductInfo')}}",
            type     : 'POST',
            dataType : 'JSON',
            data     :  {_token: csrfToken, ProId: ProId},
            success: function (data) {
                if (data) {
                    var unitVal = data.get_unit.name;
                    $('#unitdetails'+formProNum).val(unitVal);
                    $('#payprice'+formProNum).val(data.sell_price);
                    $('#code'+formProNum).val(data.code);
                }
            }
        });
    }

    $(document).ready(function () {
        productsInfo();
    });
</script>

