<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Http\Controllers\Admin\BackEndController;
use App\models\Request;
use App\Http\Requests\BackEnd\Request\Store as RequestStore;

class Requests extends BackEndController
{
    public function __construct(Request $model){
        return Parent::__construct($model);
    }

    public function store(RequestStore $request)
    {
        $row = $this->model;
        $request->validate([
            'requests' => 'required|max:200'
        ]);

        if($row->create($request->toArray())){
            swal()->button('Close Me')->message('تم','تمت عملية الاضافة بنجاح','info');
        }else{
            swal()->button('Close Me')->message('Sorry !!','Your Process Not Completed !!','info');
        }
        return redirect()->back();
    }

    public function update(RequestStore $request,$id)
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
