<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\BackEndController;
use App\models\Product;
use App\models\Category;
use App\models\Unit;
use App\Http\Requests\BackEnd\Product\Store as ProductStore;
class Products extends BackEndController
{
    public function __construct(Product $model){
       return Parent::__construct($model);
    }

    public function store(ProductStore $request)
    {
        $row = $this->model;
        if($request['code'] == ""){
            $request['code'] = rand();
        }
                
        if($row->create($request->toArray())){
            swal()->button('Close Me')->message('تم','تم اضافة المنتج بنجاح','info'); 
         }else{
            swal()->button('Close Me')->message('Sorry !!','Your Process Faild !!','info'); 
         }
        return redirect()->back();
       
    }

    public function show($id)
    {
        //
    }

    function append(){
        $array = [
            'categories' => Category::all(),
            'units' => Unit::all(),
        ];

        return $array;
    }


    public function update(ProductStore $request,$id)
    {
        $row = $this->model->findOrFail($id);
        if($request['code'] == ""){
            $request['code'] = rand();
            
        }
        if($row->update($request->toArray())){
            swal()->button('Close Me')->message('تم','تم تعديل المنتج بنجاح','info'); 
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