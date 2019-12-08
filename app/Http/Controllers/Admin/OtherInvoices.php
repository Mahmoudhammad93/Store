<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\BackEndController;
use App\models\OtherInvoice;
use App\models\Box;
use App\Http\Requests\BackEnd\OtherInvoice\Store as OtherInvoiceStore;
class OtherInvoices extends BackEndController
{
    public function __construct(OtherInvoice $model){
       return Parent::__construct($model);
    }

    public function store(OtherInvoiceStore $request)
    {
        $row = $this->model;
        
        if( $latestInvoiceId = $row->create($request->toArray()) ){

            $box = new Box();
            $boxTheLatest = Box::orderBy('id','desc')->first();
            
            $box->type          = 0;
            $box->value         = $request->value;
            $box->date          = $request->date;
            $box->desc          = $request->desc;
            $box->invoiceType   = 2;
            $box->invoice_id    = $latestInvoiceId->id;

            if(isset( $boxTheLatest->totl_value ) ){
                $box->totl_value = $boxTheLatest->totl_value - $request->value ;
              }else{
                $box->totl_value = 0 - $request->value ;
           }

           if($box->save()){
            swal()->button('Close Me')->message('تم','تم خصم المصروف من الخازنة','info'); 
           }
            
         }else{
            swal()->button('Close Me')->message('Sorry !!','Your Process Faild !!','info'); 
         }
        return redirect()->back();
       
    }

    public function show($id)
    {
        //
    }


    public function update(OtherInvoiceStore $request,$id)
    {
        $row = $this->model->findOrFail($id);

        if($row->update($request->toArray())){

          $box = Box::where('invoiceType','=',2)->where('invoice_id','=',$id)->first();
          $boxTheLatest = Box::orderBy('id','desc')->first();
          
          $box->type          = 0;
          $box->date          = $request->date;
          $box->desc          = $request->desc;
          $box->invoiceType   = 2;
          $box->invoice_id    = $id;
          $box->totl_value    = $box->totl_value - ($request->value - $box->value); 
          $boxTheLatest->totl_value = $boxTheLatest->totl_value - ($request->value - $box->value);
          $box->value         = $request->value;

         if($box->save() && $boxTheLatest->save()){
          swal()->button('Close Me')->message('تم','تم تعديل المصروف بنجاح','info'); 
         }
            
         }else{
            swal()->button('Close Me')->message('Sorry !!','Your Process Faild !!','info'); 
         }
        return redirect()->back();
    }


    public function destroy($id)
    {
        $row = $this->model->find($id);
        
        $box = Box::where('invoiceType','=',2)->where('invoice_id','=',$id)->first();
        $boxTheLatest = Box::orderBy('id','desc')->first();
        $boxTheLatest->totl_value = $boxTheLatest->totl_value + $row->value;


        if($row->delete() && $boxTheLatest->save() && $box->delete()){
         
            swal()->button('Close Me')->message('تم','تم مسح المصروف واضافة قيمته الي اجمالي الصندوق','info'); 
         }else{
            swal()->button('Close Me')->message('Sorry !!','Your Process Faild !!','info'); 
         }
        return redirect()->back();
    }

    protected function filter($rows,$filterData){
        foreach($filterData as $key => $value){
          if($value !=""){
            $rows = $rows->where($key,'=',$value);
          }
        }
        return $rows;
    }

}