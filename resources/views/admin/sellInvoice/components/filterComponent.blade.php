<div class="row">
    <div class="col-md-12">
    <form action="{{ route('sellInvoice.index') }}" method="GET">
        @php
        $input ="code";
        isset($filterData[$input]) ? $inputValue = $filterData[$input] : $inputValue = '';
        filterInputForm(['type' => 'text', 'class' => 'form-control','name' => $input ,'placeholder' => 'Code ( كود الفاتورة )', 'value' => $inputValue ] , 3 );
     
        $input ="date";
        isset($filterData[$input]) ? $inputValue = $filterData[$input] : $inputValue = '';
        filterInputForm(['type' => 'date', 'class' => 'form-control','name' => $input ,'placeholder' => 'Date ( تاريخ الفاتورة )', 'value' => $inputValue ] , 3 );
        
        $input = "supplier_id";
        isset($filterData[$input]) ? $inputValue = $filterData[$input] : $inputValue = '';
        filterSelectForm(['class' => 'form-control','name' => $input ] ,2,$databind['suppliers'],$inputValue)
     
        @endphp
        <div class='form-group'>
        <div class='col-sm-2'>
          <select class='form-control' name = "due"> 
            <option value=""> -- Select --</option>
            <option value="0" > فواتير مدفوعة </option> 
            <option value="1" > فواتير غير مدفوعة </option> 
          </select>
        </div>
      </div>
        <input type="hidden" name="invoice_type" value="1" />

        <button class="btn btn-sm btn-info btn-flat center"><i class="fa fa-search"></i> Search ( بحث ) </button>

    </form>
    </div>
</div>