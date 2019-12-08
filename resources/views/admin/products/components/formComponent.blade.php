<!-- inputForm ($lable,$inputAttrArrayAsKeyAndValue,$errors) -->
<!-- selectform($lable,$inputAtrrs,$value,$databind,$errors) -->
<div class="box-body">
@php
$input = "code";
inputForm('Code ( كود )',['type' => 'text', 'class' => 'form-control','name' => $input ,'placeholder' => 'Enter '.$input ,'value' => isset($row->$input) ? $row->$input : ''] , isset($errors->toArray()[$input]) ? $errors->toArray()[$input] : [] );

$input = "name";
inputForm('Name ( اسم الصنف )',['type' => 'text', 'class' => 'form-control','name' => $input ,'placeholder' => 'Enter '.$input ,'value' => isset($row->$input) ? $row->$input : ''] , isset($errors->toArray()[$input]) ? $errors->toArray()[$input] : [] );

$input = "category_id";
selectform("Category ( القسم )",[ 'class' => 'form-control','name' => $input ],isset($row->$input) ? $row->$input : '',$databind['categories'], isset($errors->toArray()[$input]) ? $errors->toArray()[$input] : []);

$input = "unit_id";
selectform("Unit ( الوحدة )",[ 'class' => 'form-control','name' => $input ],isset($row->$input) ? $row->$input : '',$databind['units'], isset($errors->toArray()[$input]) ? $errors->toArray()[$input] : []);

$input = "desc";
inputForm('Description ( التفاصيل ) ',['type' => 'text' , 'class' => 'form-control','name' => $input ,'placeholder' => 'Enter '.$input ,'value' => isset($row->$input) ? $row->$input : ''] , isset($errors->toArray()[$input]) ? $errors->toArray()[$input] : [] );

$input = "sell_price";
inputForm('Sell Price ( سعر الشراء  )',['type' => 'number','step' => 'any' ,'class' => 'form-control','name' => $input ,'placeholder' => 'Enter '.$input ,'value' => isset($row->$input) ? $row->$input : ''] , isset($errors->toArray()[$input]) ? $errors->toArray()[$input] : [] );

$input = "pay_price";
inputForm('Pay Price ( سعر البيع  )',['type' => 'number','step' => 'any' ,'class' => 'form-control','name' => $input ,'placeholder' => 'Enter '.$input ,'value' => isset($row->$input) ? $row->$input : ''] , isset($errors->toArray()[$input]) ? $errors->toArray()[$input] : [] );

$input = "quantity";
inputForm('Quantity ( الكمية )',['type' => 'number', 'step' => 'any' ,'class' => 'form-control','name' => $input ,'placeholder' => 'Enter '.$input ,'value' => isset($row->$input) ? $row->$input : ''] , isset($errors->toArray()[$input]) ? $errors->toArray()[$input] : [] );

$input = "alert_quantity";
inputForm('Alert Quantity ( كمية التنبيه ) ',['type' => 'number', 'step' => 'any' ,'class' => 'form-control','name' => $input ,'placeholder' => 'Enter '.$input ,'value' => isset($row->$input) ? $row->$input : ''] , isset($errors->toArray()[$input]) ? $errors->toArray()[$input] : [] );

$input = "expire_date";
$date = date('Y-m-d');
inputForm('',['type' => 'hidden', 'class' => 'form-control','name' => $input ,'placeholder' => 'Enter '.$input ,'value' => $date] , isset($errors->toArray()[$input]) ? $errors->toArray()[$input] : [] );

@endphp

</div>
<!-- /.box-body -->
<div class="box-footer">
<input id="edit_id" type="submit" class="btn btn-success" value="Save ( حفظ )">
</div>