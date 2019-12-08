<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\BackEndController;
use App\models\Category;
use App\Http\Requests\BackEnd\Category\Store as CategoryStore;
class Categories extends BackEndController
{
    public function __construct(Category $model){
       return Parent::__construct($model);
    }

    public function store(CategoryStore $request)
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


    public function update(CategoryStore $request,$id)
    {
        $row = $this->model->findOrFail($id);

        if($row->update($request->toArray())){
            swal()->button('Close Me')->message('تم','تمت عملية التعديل بنجاح','info'); 
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

