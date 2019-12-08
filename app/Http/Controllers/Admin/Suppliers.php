<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\BackEndController;
use App\models\Request;
use App\models\Supplier;
use App\models\Box;
use App\models\SupplierStartBalance;
use App\models\SupplierTypes;
use App\Http\Requests\BackEnd\Supplier\Store as SupplierStore;
use App\Http\Requests\BackEnd\Supplier\SupplierBalanceStore as SupplierBalanceStore;

class Suppliers extends BackEndController
{
    public function __construct(Supplier $model){
       return Parent::__construct($model);
    }

    public function store(SupplierStore $request)
    {
        $row = $this->model;

        if($row->create($request->toArray())){
            swal()->button('Close Me')->message('تم','تمت عملية الاضافة بنجاح','info');
         }else{
            swal()->button('Close Me')->message('Sorry !!','Your Process Faild !!','info');
         }
        return redirect()->back();

    }

    public function show($id)
    {
        //
    }


    public function update(SupplierStore $request,$id)
    {
        $row = $this->model->findOrFail($id);

        if($row->update($request->toArray())){
            swal()->button('Close Me')->message('تم','تمت عملية تعديل البيانات بنجاح','info');
         }else{
            swal()->button('Close Me')->message('Sorry !!','Your Process Faild !!','info');
         }
        return redirect()->back();
    }

    public function profile($id)
    {
        $supplier = Supplier::find($id);
        $request = Request::all();
        $PageTitle = "suppliers";
        $profile = 'Profile';
        $headerLevelProcessTitle1 = $PageTitle;
        $headerLevelProcessTitle2 = $supplier['name'];
        $buttonsRoutsname = $modelViewName = $PageTitle;

        return View('Admin.suppliers.profile',compact('supplier','request','PageTitle','profile','buttonsRoutsname','headerLevelProcessTitle1','headerLevelProcessTitle2'));
    }

    public function saveBalance(SupplierBalanceStore $request)
    {
        $row = new SupplierStartBalance() ;
        $latestAction = SupplierStartBalance::where('supplier_id',$request->supplier_id)->orderBy('id','desc')->first();

        $row->supplier_id = $request->supplier_id;
        $row->depet_value = $request->depet_value;
        $row->payment_type = $request->payment_type;
        $row->date = $request->date;
        $row->desc = $request->desc;

        $box = new Box();
        $boxTheLatest = Box::orderBy('id','desc')->first();

        $box->value         = $request->depet_value;
        $box->date          = $request->date;
        $box->desc          = $request->desc;

        if($request->payment_type == "1"){
            if(isset( $latestAction->total_balance ) ){
                 $row->total_balance = $latestAction->total_balance + $request->depet_value ;
               }else{
                 $row->total_balance = $request->depet_value ;
               }

            $box->type          = 1;
            if(isset( $boxTheLatest->totl_value ) ){
                $box->totl_value = $boxTheLatest->totl_value + $request->depet_value ;
                }else{
                $box->totl_value =  $request->depet_value ;
            }

            }
        if($request->payment_type == "0"){

            if(isset( $latestAction->total_balance ) ){
                $row->total_balance = $latestAction->total_balance - $request->depet_value ;
              }else{
                $row->total_balance = 0 - $request->depet_value ;
              }

              $box->type          = 0;
              if(isset( $boxTheLatest->totl_value ) ){
                  $box->totl_value = $boxTheLatest->totl_value - $request->depet_value ;
                  }else{
                  $box->totl_value = 0 - $request->depet_value ;
              }
        }

        if($row->save() && $box->save() ){
            swal()->button('Close Me')->message('تم','تمت عملية الاضافة بنجاح','info');
         }else{
            swal()->button('Close Me')->message('Sorry !!','Your Process Faild !!','info');
         }
        return redirect()->back();



    }

    function append(){
        $array = [
            'types' => SupplierTypes::all(),
        ];

        return $array;
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

