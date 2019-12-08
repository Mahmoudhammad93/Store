<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\BackEndController;
use App\models\Box;
use App\Http\Requests\BackEnd\Box\Store as BoxStore;
class Boxs extends BackEndController
{
    public function __construct(Box $model){
       return Parent::__construct($model);
    }

    public function store(BoxStore $request)
    {
        $row = $this->model;
        $latestAction = Box::orderBy('id','desc')->first();

        if($request->type == "1"){
            if(isset( $latestAction->totl_value ) ){
                 $request['totl_value'] = $latestAction->totl_value + $request->value ;
               }else{
                $request['totl_value'] = $request->value ;
            }
        }

        if($request->type == "0"){
            if(isset( $latestAction->totl_value ) ){
                 $request['totl_value'] = $latestAction->totl_value - $request->value ;
               }else{
                $request['totl_value'] = 0 - $request->value ;
               }
            }

             
        
        if($row->create($request->toArray())){
            swal()->button('Close Me')->message('تم','تمت الاضافة بنجاح','info'); 
         }else{
            swal()->button('Close Me')->message('Sorry !!','Your Process Faild !!','info'); 
         }
        return redirect()->back();
       
    }

    public function show($id)
    {
        //
    }


    public function update(BoxStore $request,$id)
    {
        $row = $this->model->findOrFail($id);

        if($row->update($request->toArray())){
            swal()->button('Close Me')->message('تم','تمت عملية تعديل البيانات بنجاح','info'); 
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

